<?php

namespace App\Http\Controllers;

use App\Models\DataPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataPersonalController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = DataPersonal::with(['sertifikats', 'oppes']);

        // Pengguna biasa hanya dapat melihat data miliknya.
        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        if ($request->filled('search')) {
            $query->where(
                'nama',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->filled('unit_kerja')) {
            $query->where('unit_kerja', $request->unit_kerja);
        }

        $dataPersonals = $query->latest()->get();

        return view('data_personal.index', compact('dataPersonals'));
    }

    public function create()
    {
        return view('data_personal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'unit_kerja' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'ijazah' => 'nullable|mimes:pdf|max:10240',
            'str' => 'nullable|mimes:pdf|max:10240',
            'sipp_sipb' => 'nullable|mimes:pdf|max:10240',
            'spk_rkk' => 'nullable|mimes:pdf|max:10240',
            'proses_kredensial' => 'nullable|mimes:pdf|max:10240',
            'sk_penempatan_kerja' => 'nullable|mimes:pdf|max:10240',
            'uraian_tugas' => 'nullable|mimes:pdf|max:10240',
            'oppe' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'nip' => $request->nip,
            'unit_kerja' => $request->unit_kerja,
            'jabatan' => $request->jabatan,
        ];

        $folders = [
            'ijazah' => 'data_personal/ijazah',
            'str' => 'data_personal/str',
            'sipp_sipb' => 'data_personal/sipp_sipb',
            'spk_rkk' => 'data_personal/spk_rkk',
            'proses_kredensial' => 'data_personal/kredensial',
            'sk_penempatan_kerja' => 'data_personal/sk_penempatan_kerja',
            'uraian_tugas' => 'data_personal/uraian_tugas',
            'oppe' => 'data_personal/oppe',
        ];

        foreach ($folders as $field => $folder) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store($folder, 'local');
            }
        }

        DataPersonal::create($data);

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Data personal berhasil ditambahkan.');
    }

    public function edit(DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        return view('data_personal.edit', compact('dataPersonal'));
    }

    public function update(Request $request, DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'ijazah' => 'nullable|mimes:pdf|max:10240',
            'str' => 'nullable|mimes:pdf|max:10240',
            'sipp_sipb' => 'nullable|mimes:pdf|max:10240',
            'spk_rkk' => 'nullable|mimes:pdf|max:10240',
            'proses_kredensial' => 'nullable|mimes:pdf|max:10240',
            'sk_penempatan_kerja' => 'nullable|mimes:pdf|max:10240',
            'uraian_tugas' => 'nullable|mimes:pdf|max:10240',
            'oppe' => 'nullable|mimes:pdf|max:10240',
        ]);

        $dataPersonal->nama = $request->nama;
        $dataPersonal->nip = $request->nip;
        $dataPersonal->unit_kerja = $request->unit_kerja;
        $dataPersonal->jabatan = $request->jabatan;

        $folders = [
            'ijazah' => 'data_personal/ijazah',
            'str' => 'data_personal/str',
            'sipp_sipb' => 'data_personal/sipp_sipb',
            'spk_rkk' => 'data_personal/spk_rkk',
            'proses_kredensial' => 'data_personal/kredensial',
            'sk_penempatan_kerja' => 'data_personal/sk_penempatan_kerja',
            'uraian_tugas' => 'data_personal/uraian_tugas',
            'oppe' => 'data_personal/oppe',
        ];

        foreach ($folders as $field => $folder) {
            if ($request->hasFile($field)) {
                $oldPath = $dataPersonal->{$field};

                if ($oldPath) {
                    $this->deleteStoredDocument($oldPath);
                }

                $dataPersonal->{$field} = $request->file($field)->store($folder, 'local');
            }
        }

        $dataPersonal->save();

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Data personal berhasil diperbarui.');
    }

    public function destroy(DataPersonal $dataPersonal)
    {
        $this->authorizeDataPersonal($dataPersonal);

        $fields = [
            'ijazah',
            'str',
            'sipp_sipb',
            'spk_rkk',
            'proses_kredensial',
            'sk_penempatan_kerja',
            'uraian_tugas',
            'oppe',
        ];

        foreach ($fields as $field) {
            if ($dataPersonal->{$field}) {
                $this->deleteStoredDocument($dataPersonal->{$field});
            }
        }

        // Hapus file sertifikat terkait
        foreach ($dataPersonal->sertifikats as $sertifikat) {
            if ($sertifikat->file_sertifikat) {
                $this->deleteStoredDocument($sertifikat->file_sertifikat);
            }
        }

        // Hapus file OPPE baru terkait
        foreach ($dataPersonal->oppes as $oppe) {
            if ($oppe->file_oppe) {
                $this->deleteStoredDocument($oppe->file_oppe);
            }
        }

        $dataPersonal->delete();

        return redirect()
            ->route('data-personal.index')
            ->with('success', 'Data personal berhasil dihapus.');
    }

    /**
     * Membuka PDF setelah memeriksa hak akses.
     */
    public function showDocument(DataPersonal $dataPersonal, string $jenis)
    {
        $this->authorizeDataPersonal($dataPersonal);

        $dokumen = [
            'ijazah' => $dataPersonal->ijazah,
            'str' => $dataPersonal->str,
            'sipp_sipb' => $dataPersonal->sipp_sipb,
            'spk_rkk' => $dataPersonal->spk_rkk,
            'proses_kredensial' => $dataPersonal->proses_kredensial,
            'sk_penempatan_kerja' => $dataPersonal->sk_penempatan_kerja,
            'uraian_tugas' => $dataPersonal->uraian_tugas,
            'oppe' => $dataPersonal->oppe,
        ];

        abort_unless(
            array_key_exists($jenis, $dokumen) && $dokumen[$jenis],
            404
        );

        $path = $dokumen[$jenis];
        $disk = $this->findDocumentDisk($path);

        abort_unless($disk !== null, 404, 'Dokumen tidak ditemukan.');

        return Storage::disk($disk)->response(
            $path,
            basename($path),
            ['Content-Type' => 'application/pdf']
        );
    }

    /**
     * Memastikan pengguna adalah admin atau pemilik data.
     */
    private function authorizeDataPersonal(DataPersonal $dataPersonal): void
    {
        if (
            Auth::user()->role !== 'admin' &&
            (int) $dataPersonal->user_id !== (int) Auth::id()
        ) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }

    /**
     * Mencari dokumen di disk private atau public.
     */
    private function findDocumentDisk(string $path): ?string
    {
        if (Storage::disk('local')->exists($path)) {
            return 'local';
        }

        if (Storage::disk('public')->exists($path)) {
            return 'public';
        }

        return null;
    }

    /**
     * Menghapus dokumen dari disk tempat file tersimpan.
     */
    private function deleteStoredDocument(string $path): void
    {
        $disk = $this->findDocumentDisk($path);

        if ($disk !== null) {
            Storage::disk($disk)->delete($path);
        }
    }
}
