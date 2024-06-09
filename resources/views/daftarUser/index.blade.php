@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                        @foreach ($data as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->id_user }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->nama }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->no_telp }}
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-{{ $item->id }}">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <form method="POST" action="{{ url('daftar-user/' . $item->id) }}"
                                            onsubmit="return confirm('Yakin untuk menghapus data!')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-2 py-1">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-2">
                    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                        data-bs-target="#create-modal">
                        Tambah User
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('daftarUser.create')
    @include('daftarUser.edit')
@endsection
