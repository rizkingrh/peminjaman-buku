<div>
    <form wire:submit.prevent="update">
        <label for="idPeminjam" class="form-label">Nama Peminjam</label>
        <div class="mb-2 d-flex gap-3">
            <div class="flex-fill">
                <input type="text" class="form-control" id="idPeminjam" wire:model="idPeminjam" readonly disabled>
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
