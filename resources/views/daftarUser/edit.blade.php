@foreach ($data as $item)
    <!-- Modal -->
    <div class="modal fade" id="modal-edit-{{ $item->id }}" tabindex="-1" aria-labelledby="edit-modallabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-modallabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('daftar-user/' . $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="id_user" class="form-label">ID User</label>
                            <input type="text" class="form-control" id="id_user" name="id_user"
                                aria-describedby="iduser" placeholder="Masukan id yang terdapat pada RFID"
                                value="{{ $item->id_user }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukan nama lengkap" value="{{ $item->nama }}" required>
                        </div>
                        <div>
                            <label for="no_telp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                placeholder="Masukan nomor telepon" value="{{ $item->no_telp }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
