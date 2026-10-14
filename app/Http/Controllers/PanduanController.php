<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function index()
    {
        $panduans = Panduan::latest()->get();

        return view('panduan.index', compact('panduans'));
    }

    public function create()
    {
        return view('panduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('file_pdf');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('panduan', $namaFile, 'public');

        Panduan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_pdf' => 'panduan/' . $namaFile,
        ]);

        return redirect()
            ->route('panduan.index')
            ->with('success', 'Dokumen panduan berhasil ditambahkan.');
    }

    public function edit(Panduan $panduan)
    {
        return view('panduan.edit', compact('panduan'));
    }

    public function update(Request $request, Panduan $panduan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('panduan', $namaFile, 'public');

            $data['file_pdf'] = 'panduan/' . $namaFile;
        }

        $panduan->update($data);

        return redirect()
            ->route('panduan.index')
            ->with('success', 'Dokumen panduan berhasil diperbarui.');
    }

    public function destroy(Panduan $panduan)
    {
        $panduan->delete();

        return redirect()
            ->route('panduan.index')
            ->with('success', 'Dokumen panduan berhasil dihapus.');
    }
}