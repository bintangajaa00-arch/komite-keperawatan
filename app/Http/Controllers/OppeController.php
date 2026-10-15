<?php

namespace App\Http\Controllers;

use App\Models\DataPersonal;
use App\Models\Oppe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OppeController extends Controller
{
    public function create(DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        return view('oppe.create', compact('dataPersonal'));
    }

    public function store(Request $request, DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        $validated = $request->validate([
            'nama_oppe' => 'required|string|max:255',
            'file_oppe' => 'required|file|mimes:pdf|max:10240',
        ]);

        $path = $request->file('file_oppe')->store('oppe', 'local');

        $dataPersonal->oppes()->create([
            'nama_oppe' => $validated['nama_oppe'],
            'file_oppe' => $path,
        ]);

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Dokumen OPPE berhasil ditambahkan.');
    }

    public function showFile(Oppe $oppe)
    {
        $dataPersonal = $oppe->dataPersonal;

        if (!$dataPersonal) {
            abort(404);
        }

        $this->authorizeDataPersonal($dataPersonal);

        $path = $oppe->file_oppe;

        if (empty($path)) {
            abort(404, 'File OPPE tidak ditemukan.');
        }

        if (Storage::disk('local')->exists($path)) {
            $disk = Storage::disk('local');
        } elseif (Storage::disk('public')->exists($path)) {
            $disk = Storage::disk('public');
        } else {
            abort(404, 'File OPPE tidak ditemukan.');
        }

        return response()->file($disk->path($path), [
            'Content-Type' => 'application/pdf',
            'X-Content-Type-Options' => 'nosniff',
            'Content-Disposition' => 'inline; filename="oppe.pdf"',
            'Cache-Control' => 'private, no-store, no-cache, must-revalidate',
        ]);
    }

    public function destroy(Oppe $oppe)
    {
        $dataPersonal = $oppe->dataPersonal;

        if (!$dataPersonal) {
            abort(404);
        }

        $this->authorizeDataPersonal($dataPersonal);

        $path = $oppe->file_oppe;

        if (!empty($path)) {
            Storage::disk('local')->delete($path);
            Storage::disk('public')->delete($path);
        }

        $oppe->delete();

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Dokumen OPPE berhasil dihapus.');
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
