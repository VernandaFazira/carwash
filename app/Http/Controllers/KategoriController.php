<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('backend.v_kategori.index', [
            'judul' => 'Data Kategori',
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_kategori.create', [
            'judul' => 'Tambah Kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);
        $foto = $request->file('foto');
    $nama_foto = time().'.'.$foto->getClientOriginalExtension();
    $foto->move(public_path('path/to/foto/'), $nama_foto);
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->foto = $nama_foto; // Simpan nama file
        $kategori->save();

    return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
 * Display the specified resource.
 */
public function show(string $id)
{
    $kategori = Kategori::findOrFail($id);
    return view('backend.v_kategori.show', [
        'judul' => 'Detail Kategori',
        'kategori' => $kategori
    ]);
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('.backend.v_kategori.edit', [
            'judul' => 'ubah Kategori',
            'edit' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $rules = [
        'nama_kategori' => 'required|max:100',
       ];
       $validateData = $request->validate($rules);
       Kategori::where('id',$id)->update($validateData);
       return redirect('/kategori');
    }

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();
    
    return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
}
}