<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use Illuminate\Http\Request;

class RtController extends Controller
{
    public function index()
    {
        $rts = Rt::all();
        return view('rts.index', compact('rts'));
    }

    public function create()
    {
        return view('rts.create');
    }

    public function store(Request $request)
    {
    Rt::create($request->all());
    return redirect()->route('rts.index')
    ->with('success', 'Data RT berhasil ditambahkan!');
    }

    public function edit(String $id)
    {
    $rt = Rt::findOrFail($id);
    return view('rts.edit', compact('rt'));
    }
    
    public function update(Request $request, String $id)
    {
    $rt = Rt::findOrFail($id);
    $rt->update($request->all());
    return redirect()->route('rts.index')
    ->with('success', 'Data RT berhasil diubah!');
    }
    public function destroy(String $id)
    {
    Rt::findOrFail($id)->delete();
    return redirect()->route('rts.index')
    ->with('danger', 'Data RT berhasil dihapus!');
    }
}