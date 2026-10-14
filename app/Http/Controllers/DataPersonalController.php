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

        $query = DataPersonal::with('sertifikats');

        // User hanya bisa melihat data miliknya sendiri
        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        // Search berdasarkan nama
        if ($request->filled('search')) {
            $query->where(
                'nama',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter berdasarkan unit kerja / ruangan
        if ($request->filled('unit_kerja')) {
            $query->where(
                'unit_kerja',
                $request->unit_kerja
            );
        }

        $dataPersonals = $query
            ->latest()
            ->get();

        return view(
            'data_personal.index',
            compact('dataPersonals')
        );
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


        // Upload Ijazah
        if ($request->hasFile('ijazah')) {
            $data['ijazah'] = $request->file('ijazah')
                ->store(
                    'data_personal/ijazah',
                    'public'
                );
        }


        // Upload STR
        if ($request->hasFile('str')) {
            $data['str'] = $request->file('str')
                ->store(
                    'data_personal/str',
                    'public'
                );
        }


        // Upload SIPP / SIPB
        if ($request->hasFile('sipp_sipb')) {
            $data['sipp_sipb'] = $request->file('sipp_sipb')
                ->store(
                    'data_personal/sipp_sipb',
                    'public'
                );
        }


        // Upload SPK / RKK
        if ($request->hasFile('spk_rkk')) {
            $data['spk_rkk'] = $request->file('spk_rkk')
                ->store(
                    'data_personal/spk_rkk',
                    'public'
                );
        }


        // Upload Proses Kredensial
        if ($request->hasFile('proses_kredensial')) {
            $data['proses_kredensial'] = $request->file('proses_kredensial')
                ->store(
                    'data_personal/kredensial',
                    'public'
                );
        }


        // Upload SK Penempatan Kerja
        if ($request->hasFile('sk_penempatan_kerja')) {
            $data['sk_penempatan_kerja'] = $request->file('sk_penempatan_kerja')
                ->store(
                    'data_personal/sk_penempatan_kerja',
                    'public'
                );
        }


        // Upload Uraian Tugas
        if ($request->hasFile('uraian_tugas')) {
            $data['uraian_tugas'] = $request->file('uraian_tugas')
                ->store(
                    'data_personal/uraian_tugas',
                    'public'
                );
        }

        if ($request->hasFile('oppe')) {
            $data['oppe'] = $request->file('oppe')
                ->store('data_personal/oppe', 'public');
        }

        DataPersonal::create($data);

        return redirect()
            ->route('data-personal.index')
            ->with(
                'success',
                'Data personal berhasil ditambahkan.'
            );
    }


    public function edit(DataPersonal $dataPersonal)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $dataPersonal->user_id !== Auth::id()
        ) {
            abort(403);
        }

        return view(
            'data_personal.edit',
            compact('dataPersonal')
        );
    }


    public function update(
        Request $request,
        DataPersonal $dataPersonal
    ) {
        if (
            Auth::user()->role !== 'admin' &&
            $dataPersonal->user_id !== Auth::id()
        ) {
            abort(403);
        }

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
        ]);


        $dataPersonal->nama = $request->nama;
        $dataPersonal->nip = $request->nip;
        $dataPersonal->unit_kerja = $request->unit_kerja;
        $dataPersonal->jabatan = $request->jabatan;


        // Ganti Ijazah
        if ($request->hasFile('ijazah')) {

            if ($dataPersonal->ijazah) {
                Storage::disk('public')
                    ->delete($dataPersonal->ijazah);
            }

            $dataPersonal->ijazah = $request->file('ijazah')
                ->store(
                    'data_personal/ijazah',
                    'public'
                );
        }


        // Ganti STR
        if ($request->hasFile('str')) {

            if ($dataPersonal->str) {
                Storage::disk('public')
                    ->delete($dataPersonal->str);
            }

            $dataPersonal->str = $request->file('str')
                ->store(
                    'data_personal/str',
                    'public'
                );
        }


        // Ganti SIPP / SIPB
        if ($request->hasFile('sipp_sipb')) {

            if ($dataPersonal->sipp_sipb) {
                Storage::disk('public')
                    ->delete($dataPersonal->sipp_sipb);
            }

            $dataPersonal->sipp_sipb = $request->file('sipp_sipb')
                ->store(
                    'data_personal/sipp_sipb',
                    'public'
                );
        }


        // Ganti SPK / RKK
        if ($request->hasFile('spk_rkk')) {

            if ($dataPersonal->spk_rkk) {
                Storage::disk('public')
                    ->delete($dataPersonal->spk_rkk);
            }

            $dataPersonal->spk_rkk = $request->file('spk_rkk')
                ->store(
                    'data_personal/spk_rkk',
                    'public'
                );
        }


        // Ganti Proses Kredensial
        if ($request->hasFile('proses_kredensial')) {

            if ($dataPersonal->proses_kredensial) {
                Storage::disk('public')
                    ->delete($dataPersonal->proses_kredensial);
            }

            $dataPersonal->proses_kredensial = $request->file('proses_kredensial')
                ->store(
                    'data_personal/kredensial',
                    'public'
                );
        }


        // Ganti SK Penempatan Kerja
        if ($request->hasFile('sk_penempatan_kerja')) {

            if ($dataPersonal->sk_penempatan_kerja) {
                Storage::disk('public')
                    ->delete($dataPersonal->sk_penempatan_kerja);
            }

            $dataPersonal->sk_penempatan_kerja = $request->file('sk_penempatan_kerja')
                ->store(
                    'data_personal/sk_penempatan_kerja',
                    'public'
                );
        }


        // Ganti Uraian Tugas
        if ($request->hasFile('uraian_tugas')) {

            if ($dataPersonal->uraian_tugas) {
                Storage::disk('public')
                    ->delete($dataPersonal->uraian_tugas);
            }

            $dataPersonal->uraian_tugas = $request->file('uraian_tugas')
                ->store(
                    'data_personal/uraian_tugas',
                    'public'
                );
        }

        if ($request->hasFile('oppe')) {
            if ($dataPersonal->oppe) {
                Storage::disk('public')->delete($dataPersonal->oppe);
            }

            $dataPersonal->oppe = $request->file('oppe')
                ->store('data_personal/oppe', 'public');
        }

        $dataPersonal->save();

        return redirect()
            ->route('data-personal.index')
            ->with(
                'success',
                'Data personal berhasil diperbarui.'
            );
    }


    public function destroy(DataPersonal $dataPersonal)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $dataPersonal->user_id !== Auth::id()
        ) {
            abort(403);
        }


        // Hapus file Ijazah
        if ($dataPersonal->ijazah) {
            Storage::disk('public')
                ->delete($dataPersonal->ijazah);
        }


        // Hapus file STR
        if ($dataPersonal->str) {
            Storage::disk('public')
                ->delete($dataPersonal->str);
        }


        // Hapus file SIPP / SIPB
        if ($dataPersonal->sipp_sipb) {
            Storage::disk('public')
                ->delete($dataPersonal->sipp_sipb);
        }


        // Hapus file SPK / RKK
        if ($dataPersonal->spk_rkk) {
            Storage::disk('public')
                ->delete($dataPersonal->spk_rkk);
        }


        // Hapus file Proses Kredensial
        if ($dataPersonal->proses_kredensial) {
            Storage::disk('public')
                ->delete($dataPersonal->proses_kredensial);
        }


        // Hapus file SK Penempatan Kerja
        if ($dataPersonal->sk_penempatan_kerja) {
            Storage::disk('public')
                ->delete($dataPersonal->sk_penempatan_kerja);
        }


        // Hapus file Uraian Tugas
        if ($dataPersonal->uraian_tugas) {
            Storage::disk('public')
                ->delete($dataPersonal->uraian_tugas);
        }


        // Hapus file sertifikat
        foreach ($dataPersonal->sertifikats as $sertifikat) {

            if ($sertifikat->file_sertifikat) {
                Storage::disk('public')
                    ->delete($sertifikat->file_sertifikat);
            }
        }


        // Hapus data personal
        // Sertifikat di database ikut terhapus
        // karena foreign key menggunakan cascade
        $dataPersonal->delete();


        return redirect()
            ->route('data-personal.index')
            ->with(
                'success',
                'Data personal berhasil dihapus.'
            );
    }
}