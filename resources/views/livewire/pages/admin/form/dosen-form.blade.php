<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $dosenId ? 'Perbaharui Data' : 'Tambah Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="dosenId">
                <div class="mb-3">
                    <label class="form-label required">NIDN</label>
                    <input type="text" class="form-control" wire:model.live="nidn" placeholder="Contoh: 123123123"
                        {{ $dosenId ? 'disabled readonly' : '' }}>
                    @error('nidn')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Nama Dosen</label>
                    <input type="text" class="form-control" wire:model.live="name" placeholder="Contoh: Jamal Kanei">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" wire:model.live="email"
                        placeholder="Contoh: jamal@gmail.com" {{ $dosenId ? 'disabled readonly' : '' }}>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Batalkan
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $dosenId ? 'Perbaharui Data' : 'Simpan Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
