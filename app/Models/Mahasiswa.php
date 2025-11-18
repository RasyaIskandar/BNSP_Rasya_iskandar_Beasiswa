<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',      
        'email',     
        'no_hp',     
        'semester',  
        'ipk'        
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'mahasiswa_id');
    }
}
