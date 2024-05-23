<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('id', 'desc')->get();
        return view('backend.v_user.index', [
            'judul' => 'Data User',
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_user.create', [
            'judul' => 'Tambah User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'nama_user' => 'required',
        ]);
        User::create($validatedData);
        return redirect('/user');
    }

    /**
 * Display the specified resource.
 */
public function show(string $id)
{
    $user = User::findOrFail($id);
    return view('backend.v_user.show', [
        'judul' => 'Detail User',
        'user' => $user
    ]);
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
    {
        $user = User::find($id);
        return view('.backend.v_user.edit', [
            'judul' => 'ubah User',
            'edit' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $rules = [
        'nama_user' => 'required|max:100',
       ];
       $validateData = $request->validate($rules);
       User::where('id',$id)->update($validateData);
       return redirect('/user');
    }

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();
    
    return redirect('/user')->with('success', 'User berhasil dihapus');
}
}