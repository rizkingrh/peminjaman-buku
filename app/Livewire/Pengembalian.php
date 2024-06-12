<?php

namespace App\Livewire;

use App\Models\DaftarUser;
use App\Models\Peminjaman;
use Livewire\Component;

class Pengembalian extends Component
{
    public $users = [];
    public $selectedUser = null;
    public $peminjamanHistory = [];

    public function mount()
    {
        $this->users = Peminjaman::select('id_user')
            ->distinct()
            ->with('user')
            ->get();
    }

    // public function showHistory($userId)
    // {
    //     $this->selectedUser = DaftarUser::find($userId);
    //     $this->peminjamanHistory = Peminjaman::where('id_user', $userId)
    //         ->with('barang')
    //         ->get();
    // }

    public function render()
    {
        return view('livewire.pengembalian');
    }
}
