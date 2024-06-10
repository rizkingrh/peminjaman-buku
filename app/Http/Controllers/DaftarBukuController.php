<?php

namespace App\Http\Controllers;

use App\Models\DaftarBuku;
use Illuminate\Http\Request;

class DaftarBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarBuku::all();
        return view('daftarBuku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'id_buku' => 'required',
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'jenis' => 'required',
            'status' => 'required',
        ]);

        // Simpan data ke database
        DaftarBuku::create($validatedData);
        
        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('daftar-buku')->with('success', 'Buku baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarBuku $daftarBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarBuku $daftarBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'jenis' => 'required',
            'status' => 'required',
        ]);

        // Simpan data ke database
        DaftarBuku::where('id',$id)->update($validatedData);
        
        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('daftar-buku')->with('success', 'Buku berhasil di perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DaftarBuku::where('id', $id)->delete();
        return redirect('daftar-buku')->with('success', 'Data buku berhasil di hapus!');
    }
}
