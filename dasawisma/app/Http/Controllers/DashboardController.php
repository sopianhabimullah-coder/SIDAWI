<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;
use App\Models\ProfilDasawisma;


class DashboardController extends Controller
{
    public function index()
    {
        $profil = ProfilDasawisma::first();
        $jumlahKK                = Keluarga::count();
        $totalBalita             = Keluarga::sum('balita');
        $totalLansia             = Keluarga::sum('lansia');
        $totalIbuHamil           = Keluarga::sum('ibu_hamil');
        $totalIbuMenyusui        = Keluarga::sum('ibu_menyusui');
        $totalPus                = Keluarga::sum('pus');
        $totalWus                = Keluarga::sum('wus');
        $totalTigaButa           = Keluarga::sum('tiga_buta');
        $totalBerkebutuhanKhusus = Keluarga::sum('berkebutuhan_khusus');
        $totalLakiLaki           = Keluarga::sum('jml_laki');
        $totalPerempuan          = Keluarga::sum('jml_perempuan');
        $totalPdam               = Keluarga::sum('pdam');
        $totalSumur              = Keluarga::sum('sumur');
        $totalDllAir             = Keluarga::sum('dll_air');
        $totalBeras              = Keluarga::sum('beras');
        $totalNonBeras           = Keluarga::sum('non_beras');
        $totalUp2k               = Keluarga::sum('up2k');
        $totalPekarangan         = Keluarga::sum('pekarangan');
        $totalIndustriRT         = Keluarga::sum('industri_rumah_tangga');
        $totalKerjaBakti         = Keluarga::sum('kerja_bakti');
        $totalSehatLayakHuni     = Keluarga::where('sehat_layak_huni', true)->count();
        $totalTidakLayakHuni     = Keluarga::where('tidak_layak_huni', true)->count();
        $totalTempatSampah       = Keluarga::where('tempat_sampah', true)->count();
        $totalSpal               = Keluarga::where('spal', true)->count();
        $totalJamban             = Keluarga::where('jamban', true)->count();
        $totalStikerP4k          = Keluarga::where('stiker_p4k', true)->count();

    return view('dashboard', compact(
    'profil',    
    'jumlahKK',
    'totalBalita',
    'totalLansia',
    'totalIbuHamil',
    'totalIbuMenyusui',
    'totalPus',
    'totalWus',
    'totalTigaButa',
    'totalBerkebutuhanKhusus',
    'totalLakiLaki',
    'totalPerempuan',
    'totalSehatLayakHuni',
    'totalTidakLayakHuni',
    'totalTempatSampah',
    'totalSpal',
    'totalJamban',
    'totalStikerP4k',
    'totalPdam',
    'totalSumur',
    'totalDllAir',
    'totalBeras',
    'totalNonBeras',
    'totalUp2k',
    'totalPekarangan',
    'totalIndustriRT',
    'totalKerjaBakti'
        ));
    }
}
