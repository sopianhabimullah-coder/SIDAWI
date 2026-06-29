<?php

namespace App\Http\Controllers;

use App\Models\ProfilDasawisma;
use Illuminate\Http\Request;

class ProfilDasawismaController extends Controller
{
    public function edit()
    {
        $profil = ProfilDasawisma::first() ?? new ProfilDasawisma();
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilDasawisma::first();

        if ($profil) {
            $profil->update($request->all());
        } else {
            ProfilDasawisma::create($request->all());
        }

        return redirect()->route('profil.edit')->with('success', 'Profil berhasil diupdate!');
    }
}
