<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Oppe extends Model
{
    protected $fillable = [
        'data_personal_id',
        'nama_oppe',
        'file_oppe',
        'link_oppe',
    ];

    public function dataPersonal(): BelongsTo
    {
        return $this->belongsTo(DataPersonal::class);
    }
}
