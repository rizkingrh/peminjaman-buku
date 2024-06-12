<div>
    @if ($messagePeminjaman != '')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $messagePeminjaman }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Peminjaman</h5>
            <form wire:submit.prevent="update">
                <label for="idPeminjam" class="form-label">ID Peminjam</label>
                <div class="mb-2 d-flex gap-3">
                    <div class="flex-fill">
                        <input type="text" class="form-control" id="idPeminjam" wire:model="idPeminjam" readonly
                            disabled>
                    </div class="flex-fill">
                    <div>
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
                @if ($message)
                    <div class="form-text">{{ $message }}</div>
                @endif
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Scan Buku</h5>
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
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
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
                                <td class="border-bottom-0">
                                    {{ $item['status'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-2">
                    <button type="button" class="btn btn-success m-2" wire:click="simpanPeminjaman">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-primary m-2" wire:click="scanBuku">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
