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
            <h5 class="card-title fw-semibold mb-4">History Tags ID</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle table-striped">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No.</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tags ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Keterangan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Timestamp</h6>
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
                                    {{ $item->encoded_id }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->status }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->keterangan }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->created_at }}
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <form method="POST" action="{{ url('history/' . $item->id) }}"
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
            </div>
        </div>
    </div>
@endsection
