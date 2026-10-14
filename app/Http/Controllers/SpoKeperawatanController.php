<?php

namespace App\Http\Controllers;

use App\Models\SpoKeperawatan;
use Illuminate\Http\Request;

class SpoKeperawatanController extends Controller
{
    public function index()
    {
        $spos = SpoKeperawatan::latest()->get();

        return view('spo.index', compact('spos'));
    }

    public function create()
    {
        return view('spo.create');
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

        $file->storeAs('spo', $namaFile, 'public');

        SpoKeperawatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_pdf' => 'spo/' . $namaFile,
        ]);

        return redirect()
            ->route('spo.index')
            ->with('success', 'Dokumen SPO berhasil ditambahkan.');
    }

    public function edit(SpoKeperawatan $spo)
    {
        return view('spo.edit', compact('spo'));
    }

    public function update(Request $request, SpoKeperawatan $spo)
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

            $file->storeAs('spo', $namaFile, 'public');

            $data['file_pdf'] = 'spo/' . $namaFile;
        }

        $spo->update($data);

        return redirect()
            ->route('spo.index')
            ->with('success', 'Dokumen SPO berhasil diperbarui.');
    }

    public function destroy(SpoKeperawatan $spo)
    {
        $spo->delete();

        return redirect()
            ->route('spo.index')
            ->with('success', 'Dokumen SPO berhasil dihapus.');
    }
}