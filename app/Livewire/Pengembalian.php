<?php

namespace App\Livewire;

use App\Models\DaftarBuku;
use App\Models\DaftarUser;
use App\Models\Peminjaman;
use App\Models\Rfid;
use Livewire\Component;
use Termwind\Components\Dd;

class Pengembalian extends Component
{
    public $users = [];
    public $selectedUser;
    public $peminjamanHistory = [];
    public $id_user;
    public $idBuku;
    public $bukuDipinjam = [];

    public function mount()
    {
        $this->users = Peminjaman::select('id_user')
            ->distinct()
            ->with('user')
            ->get();
    }

    public function showHistory($userId)
    {
        $this->selectedUser = DaftarUser::find($userId);
        $this->id_user = $this->selectedUser->id_user;
        $this->peminjamanHistory = Peminjaman::where('id_user', $this->id_user)
            ->with('buku')
            ->get();
    }

    public function scanBuku()
    {
        // Mendapatkan ID RFID buku terbaru dari tabel penampungan_rfid
        $rfid = Rfid::latest()->first();
        $this->idBuku = $rfid->encoded_id;

        $buku = DaftarBuku::where('id_buku', $this->idBuku)->first();
        if ($buku) {
            $this->bukuDipinjam[] = [
                'id_buku' => $buku->id_buku,
                'nama_buku' => $buku->nama_buku,
                'penerbit' => $buku->penerbit,
                'jenis' => $buku->jenis,
            ];
        }
    }
    
    public function simpanPengembalian()
    {
        $user = DaftarUser::where('id_user', $this->id_user)->first();
        if ($user) {
            foreach ($this->bukuDipinjam as $buku) {
                // Mengambil data peminjaman yang masih aktif (belum dikembalikan)
                $peminjaman = Peminjaman::where('id_user', $user->id_user)
                                        ->where('id_buku', $buku['id_buku'])
                                        ->whereNull('pengembalian')
                                        ->first();
                if ($peminjaman) {  
                    // Update data peminjaman
                    $peminjaman->pengembalian = now();
                    $peminjaman->save();

                    // Mengubah status buku menjadi "dipinjam"
                    $buku = DaftarBuku::where('id_buku', $buku['id_buku'])->first();
                    if ($buku) {
                        $buku->status = 'Tersedia';
                        $buku->save();
                    }
                }
            }
            $this->bukuDipinjam = [];
        } else {
            //
        }
    }

    public function render()
    {
        return view('livewire.pengembalian');
    }
}
