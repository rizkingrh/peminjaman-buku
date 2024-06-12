<?php

namespace App\Http\Controllers;

use App\Models\DaftarUser;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
        return view('dashboard', compact('tanggal'));
    }

    public function history() {
        return view('history');
    }

    public function pengembalian() {
        return view('pengembalian');
    }
}
