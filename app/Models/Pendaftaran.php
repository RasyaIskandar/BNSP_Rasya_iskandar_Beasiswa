<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
     protected $table = 'pendaftarans';

    protected $fillable = [
        'mahasiswa_id',
        'beasiswa_id',
        'berkas_path',
        'berkas',
        'status',
        'catatan'
    ];

      public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }
}
