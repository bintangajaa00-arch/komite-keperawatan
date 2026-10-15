<?php

namespace App\Http\Controllers;

use App\Models\DataPersonal;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SertifikatController extends Controller
{
    public function create(DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        return view('sertifikat.create', compact('dataPersonal'));
    }

    public function store(Request $request, DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        $validated = $request->validate([
            'nama_sertifikat' => 'required|string|max:255',
            'file_sertifikat' => 'required|mimes:pdf|max:10240',
        ]);

        $path = $request->file('file_sertifikat')
            ->store('sertifikat', 'local');

        Sertifikat::create([
            'data_personal_id' => $dataPersonal->id,
            'nama_sertifikat' => $validated['nama_sertifikat'],
            'file_sertifikat' => $path,
        ]);

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function showFile(Sertifikat $sertifikat)
    {
        $dataPersonal = $sertifikat->dataPersonal;

        if (!$dataPersonal) {
            abort(404);
        }

        $this->authorizeDataPersonal($dataPersonal);

        $path = $sertifikat->file_sertifikat;

        if (empty($path)) {
            abort(404);
        }

        // Periksa penyimpanan private terlebih dahulu.
        if (Storage::disk('local')->exists($path)) {
            $disk = Storage::disk('local');
        } elseif (Storage::disk('public')->exists($path)) {
            $disk = Storage::disk('public');
        } else {
            abort(404, 'File sertifikat tidak ditemukan.');
        }

        return response()->file(
            $disk->path($path),
            [
                'Content-Type' => 'application/pdf',
                'X-Content-Type-Options' => 'nosniff',
                'Content-Disposition' => 'inline; filename="sertifikat.pdf"',
                'Cache-Control' => 'private, no-store, no-cache, must-revalidate',
            ]
        );
    }

    public function destroy(Sertifikat $sertifikat)
    {
        $dataPersonal = $sertifikat->dataPersonal;

        if (!$dataPersonal) {
            abort(404);
        }

        $this->authorizeDataPersonal($dataPersonal);

        $path = $sertifikat->file_sertifikat;

        if (!empty($path)) {
            Storage::disk('local')->delete($path);
            Storage::disk('public')->delete($path);
        }

        $sertifikat->delete();

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }

    private function authorizeDataPersonal(DataPersonal $dataPersonal): void
    {
        $user = Auth::user();

        if (!$user) {
            abort(403);
        }

        if (
            $user->role !== 'admin' &&
            (int) $dataPersonal->user_id !== (int) $user->id
        ) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}