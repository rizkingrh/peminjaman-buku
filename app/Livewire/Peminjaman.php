<?php

namespace App\Livewire;

use App\Models\DaftarUser;
use App\Models\Rfid;
use Livewire\Component;

class Peminjaman extends Component
{
    public $idPeminjam = '';
    public $message = '';

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

    public function render()
    {
        return view('livewire.peminjaman');
    }
}
