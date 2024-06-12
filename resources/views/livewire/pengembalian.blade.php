<div>
    @if ($selectedUser)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-2">Riwayat Peminjaman</h5>
                <h6 class="mb-4">{{ $selectedUser->nama }} (ID: {{ $selectedUser->id_user }})</h6>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle table-striped">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No.</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID Buku</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Buku</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Peminjaman</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Pengembalian</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamanHistory as $item)
                                <tr>
                                    <td class="border-bottom-0">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item->buku->id_buku }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item->buku->nama_buku }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item->peminjaman }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item->pengembalian ?? 'Belum dikembalikan' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Pengembalian Buku</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle table-striped">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No.</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID Buku</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Buku</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Penerbit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jenis Buku</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukuDipinjam as $item)
                                <tr>
                                    <td class="border-bottom-0">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item['id_buku'] }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item['nama_buku'] }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item['penerbit'] }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ $item['jenis'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-success m-2" wire:click="simpanPengembalian">
                            Simpan
                        </button>
                        <button type="button" class="btn btn-primary m-2" wire:click="scanBuku">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
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
                                        <button type="button" wire:click="showHistory({{ $item->user->id }})"
                                            class="btn btn-warning px-2 py-1">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
