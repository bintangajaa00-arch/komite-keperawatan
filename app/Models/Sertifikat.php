<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $fillable = [
        'data_personal_id',
        'nama_sertifikat',
        'file_sertifikat',
    ];

    public function dataPersonal()
    {
        return $this->belongsTo(DataPersonal::class);
    }
}