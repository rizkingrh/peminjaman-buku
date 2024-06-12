<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Peminjam</h5>
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
                                <h6 class="fw-semibold mb-0">Nama User</h6>
                            </th>
                            <th class="border-bottom-0 text-center">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->id_user }}
                                </td>
                                <td class="border-bottom-0">
                                    {{ $item->user->nama }}
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <a href="{{ url('peminjaman/' . $item->id_user . '/detail') }}"
                                        class="btn btn-warning px-2 py-1">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
