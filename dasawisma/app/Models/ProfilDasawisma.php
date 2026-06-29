<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDasawisma extends Model
{
    protected $table = 'profil_dasawisma';

    protected $fillable = [
        'nama_dasawisma',
        'nama_ketua',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'tahun',
    ];
}
