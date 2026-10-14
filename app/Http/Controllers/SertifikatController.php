<?php

namespace App\Http\Controllers;

use App\Models\DataPersonal;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    public function create(DataPersonal $dataPersonal)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $dataPersonal->user_id !== Auth::id()
        ) {
            abort(403);
        }

        return view('sertifikat.create', compact('dataPersonal'));
    }

    public function store(Request $request, DataPersonal $dataPersonal)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $dataPersonal->user_id !== Auth::id()
        ) {
            abort(403);
        }

        $request->validate([
            'nama_sertifikat' => 'required|string|max:255',
            'file_sertifikat' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('file_sertifikat');

        $path = $file->store('sertifikat', 'public');

        Sertifikat::create([
            'data_personal_id' => $dataPersonal->id,
            'nama_sertifikat' => $request->nama_sertifikat,
            'file_sertifikat' => $path,
        ]);

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function destroy(Sertifikat $sertifikat)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $sertifikat->dataPersonal->user_id !== Auth::id()
        ) {
            abort(403);
        }

        Storage::disk('public')->delete($sertifikat->file_sertifikat);

        $sertifikat->delete();

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}