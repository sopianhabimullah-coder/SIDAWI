<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('rt')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $rts = Rt::all();
        return view('users.create', compact('rts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'rt_id'    => $request->rt_id,
        ]);

        return redirect()->route('users.index')
        ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(String $id)
{
    $user = User::findOrFail($id);
    $rts = Rt::all();
    return view('users.edit', compact('user', 'rts'));
}

public function update(Request $request, String $id)
{
    $user = User::findOrFail($id);

    $data = [
        'name'  => $request->name,
        'email' => $request->email,
        'role'  => $request->role,
        'rt_id' => $request->rt_id,
    ];

    // Update password hanya kalau diisi
    if ($request->password) {
        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
    }

    return redirect()->route('users.index')
    ->with('success', 'User berhasil diubah!');
}

    public function destroy(String $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')
        ->with('danger', 'User berhasil dihapus!');
    }
}
