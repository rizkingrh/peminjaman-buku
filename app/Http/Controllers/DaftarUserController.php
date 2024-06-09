<?php

namespace App\Http\Controllers;

use App\Models\DaftarUser;
use Illuminate\Http\Request;

class DaftarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarUser::all();
        return view('daftarUser.index', compact('data'));
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
            'id_user' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
        ]);

        // Simpan data ke database
        DaftarUser::create($validatedData);
        
        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('daftar-user')->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarUser $daftarUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarUser $daftarUser)
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
            'nama' => 'required',
            'no_telp' => 'required',
        ]);

        // Simpan data ke database
        DaftarUser::where('id', $id)->update($validatedData);
        
        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('daftar-user')->with('success', 'User berhasil di perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DaftarUser::where('id', $id)->delete();
        return redirect('daftar-user')->with('success', 'User berhasil di hapus!');
    }
}
