<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpoKeperawatan extends Model
{
    protected $fillable = [
        'judul',
        'file_pdf',
        'deskripsi',
    ];
}