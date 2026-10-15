<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataPersonal extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'unit_kerja',
        'jabatan',
        'ijazah',
        'str',
        'sipp_sipb',
        'spk_rkk',
        'proses_kredensial',
        'sk_penempatan_kerja',
        'uraian_tugas',
        'oppe',
        'sertifikat',
    ];

    public function sertifikats(): HasMany
    {
        return $this->hasMany(Sertifikat::class);
    }

    public function oppes(): HasMany
    {
        return $this->hasMany(Oppe::class);
    }
}