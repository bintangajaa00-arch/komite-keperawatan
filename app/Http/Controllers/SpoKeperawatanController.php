<?php

namespace App\Http\Controllers;

use App\Models\SpoKeperawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'required|url:http,https|max:2048',
        ]);

        SpoKeperawatan::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'link' => $validated['link'],
            'file_pdf' => null,
        ]);

        return redirect()
            ->route('spo.index')
            ->with('success', 'SPO berhasil ditambahkan.');
    }

    public function edit(SpoKeperawatan $spo)
    {
        return view('spo.edit', compact('spo'));
    }

    public function update(Request $request, SpoKeperawatan $spo)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url:http,https|max:2048',
        ]);

        $spo->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'link' => $validated['link'] ?? null,
        ]);

        return redirect()
            ->route('spo.index')
            ->with('success', 'SPO berhasil diperbarui.');
    }

    public function destroy(SpoKeperawatan $spo)
    {
        // Hapus file hanya jika record lama memang memiliki file PDF.
        if ($spo->file_pdf) {
            Storage::disk('public')->delete($spo->file_pdf);
        }

        $spo->delete();

        return redirect()
            ->route('spo.index')
            ->with('success', 'SPO berhasil dihapus.');
    }
}
