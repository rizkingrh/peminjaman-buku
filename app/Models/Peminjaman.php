<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'peminjamans';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(DaftarUser::class, 'id_user', 'id_user');
    }

    public function buku() {
        return $this->belongsTo(DaftarBuku::class, 'id_buku', 'id_buku');
    }
}
