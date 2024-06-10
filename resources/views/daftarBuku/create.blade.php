<!-- Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="create-modallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create-modallabel">Tambah Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/daftar-buku" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="id_buku" class="form-label">ID Buku</label>
                        <input type="text" class="form-control" id="id_buku" name="id_buku"
                            aria-describedby="iduser" placeholder="Masukan id yang terdapat pada RFID" required>
                    </div>
                    <div class="mb-2">
                        <label for="nama_buku" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                            placeholder="Masukan nama buku" required>
                    </div>
                    <div class="mb-2">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                            placeholder="Masukan nama penerbit" required>
                    </div>
                    <div class="mb-2">
                        <label for="jenis" class="form-label">Jenis Buku</label>
                        <input type="text" class="form-control" id="jenis" name="jenis"
                            placeholder="Masukan jenis buku" required>
                    </div>
                    <div>
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                            <option selected value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
