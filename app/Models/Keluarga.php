<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $fillable = [
    
    'rt_id',

    'nama_kepala_keluarga',
    'jumlah_kk',

    'jml_laki',
    'jml_perempuan',

    'balita',
    'balita_p',

    'pus',
    'wus',

    'ibu_hamil',
    'ibu_menyusui',

    'lansia',

    'tiga_buta',
    'berkebutuhan_khusus',

    'sehat_layak_huni',
    'tidak_layak_huni',

    'tempat_sampah',
    'spal',
    'jamban',
    'stiker_p4k',

    'pdam',
    'sumur',
    'dll_air',

    'beras',
    'non_beras',

    'up2k',
    'pekarangan',
    'industri_rumah_tangga',
    'kerja_bakti',

    'keterangan'
];

    public function rt()
    {
    return $this->belongsTo(Rt::class);
    }
}
