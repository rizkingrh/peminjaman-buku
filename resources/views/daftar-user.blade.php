@extends('layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Users</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle table-striped">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No.</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ID User</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Lengkap</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No Telepon</h6>
                            </th>
                            <th class="border-bottom-0 text-center">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border-bottom-0">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $user->id_user }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $user->nama }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $user->no_telp }}
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <a href="#">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti ti-trash" style="color: red"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="tambah.php">
                    <button type="button" class="btn btn-primary m-2">Tambah Data Karyawan</button>
                </a>

            </div>
        </div>
    </div>
@endsection
