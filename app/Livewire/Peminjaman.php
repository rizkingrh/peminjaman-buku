<?php

namespace App\Livewire;

use App\Models\DaftarBuku;
use App\Models\DaftarUser;
use App\Models\Peminjaman as ModelsPeminjaman;
use App\Models\Rfid;
use Livewire\Component;

class Peminjaman extends Component
{
    public $idPeminjam = '';
    public $message = '';
    public $bukuDipinjam = [];
    public $idBuku;

    public function mount() {
        $this->idPeminjam = '';
        $this->message = '';
    }

    public function update() {
        $rfid = Rfid::latest()->first();
        if ($rfid) {
            $this->idPeminjam = $rfid->encoded_id;
        }

        $user = DaftarUser::where('id_user', $this->idPeminjam)->first();
        if ($user) {
            $this->message = "Terdaftar sebagai " . $user->nama;
        } else {
            $this->message = "Belum terdaftar";
        }
    }

    public function scanBuku()
    {
        // Mendapatkan ID RFID buku terbaru dari tabel penampungan_rfid
        $rfid = Rfid::latest()->first();
        if ($rfid) {
            $this->idBuku = $rfid->encoded_id;
        }

        $buku = DaftarBuku::where('id_buku', $this->idBuku)->first();
        if ($buku) {
            $this->bukuDipinjam[] = [
                'id_buku' => $buku->id_buku,
                'nama_buku' => $buku->nama_buku,
                'penerbit' => $buku->penerbit,
                'jenis' => $buku->jenis,
                'status' => $buku->status,
            ];
        }
    }

    public function simpanPeminjaman()
    {
        $user = DaftarUser::where('id_user', $this->idPeminjam)->first();
        if ($user) {
            foreach ($this->bukuDipinjam as $buku) {
                // Menyimpan data peminjaman
                ModelsPeminjaman::create([
                    'id_user' => $user->id_user,
                    'id_buku' => $buku['id_buku'],
                    'peminjaman' => now(),
                    'status' => 'Dipinjam',
                ]);

                // Mengubah status buku menjadi "dipinjam"
                $buku = DaftarBuku::where('id_buku', $buku['id_buku'])->first();
                if ($buku) {
                    $buku->status = 'Dipinjam';
                    $buku->save();
                }
            }
            $this->bukuDipinjam = [];
            $this->message = "Peminjaman disimpan.";
        } else {
            $this->message = "User tidak ditemukan.";
        }
    }

    public function render()
    {
        return view('livewire.peminjaman');
    }
}
