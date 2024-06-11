<?php

namespace App\Http\Controllers;

use App\Models\DaftarBuku;
use App\Models\DaftarUser;
use Illuminate\Http\Request;
use App\Models\Rfid;

class RfidController extends Controller
{
    // public function store(Request $request){
        
    //     $tag = new Rfid();
    //     $tag->encoded_id = $request->encoded_id;
    //     $tag->save();

    //     return response()->json(['message' => 'Tag saved successfully'], 201);
    // }

    public function scanRfid(Request $request)
    {
        $idTags = $request->encoded_id;

        // Cari di daftar buku
        $book = DaftarBuku::where('id_buku', $idTags)->first();

        // Cari di daftar user
        $user = DaftarUser::where('id_user', $idTags)->first();

        $status = '';
        $keterangan = '';

        if ($book) {
            $status = '      Buku      ';
            $keterangan = $book->nama_buku;
        } elseif ($user) {
            $status = '      User      ';
            $keterangan = $user->nama;
        } else {
            $status = 'Tidak Terdaftar';
            $keterangan = '';
        }

        // Simpan ke history
        Rfid::create([
            'encoded_id' => $idTags,
            'status' => $status,
            'keterangan' => $keterangan
        ]);

        return response()->json([
            'status' => $status,
            'keterangan' => $keterangan
        ]);
    }
}