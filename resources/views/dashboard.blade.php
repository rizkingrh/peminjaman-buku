@extends('layouts.main')

@section('container')
    <h5 class="fw-semibold">Welcome, Rizki Nugraha</h5>
    <p>{{ $tanggal }}</p>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 logo-img">
                    <img src="assets/img/imagedashboard.png" width="400" alt="">
                </div>
                <div class="col-md-6">
                    <h1>SELAMAT DATANG DI</h1>
                    <h5>PANDAWA LIBRARY</h5>
                    <p>Website pengelola buku dan peminjaman perpustakaan</p>
                </div>
            </div>
        </div>
    </div>
@endsection
