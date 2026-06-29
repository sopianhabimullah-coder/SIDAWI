<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $fillable = ['nomor_rt', 'nomor_rw', 'nama_ketua'];

    public function keluargas()
    {
        return $this->hasMany(Keluarga::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}