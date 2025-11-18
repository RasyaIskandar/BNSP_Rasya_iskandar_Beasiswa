<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswa'; 

    protected $fillable = [
        'nama',       
        'deskripsi',  
        'ipk',        
        'photo'       
    ];

    public function pendaftaran()
    {
        // relasi 1 beasiswa bisa dipake banyak mahasiswa
        return $this->hasMany(Pendaftaran::class, 'beasiswa_id');
    }
}
