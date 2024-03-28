<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $fakultasId ? 'Perbaharui Data' : 'Tambah Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="fakultasId">
                <div class="mb-3">
                    <label class="form-label required">Kode Fakultas</label>
                    <input type="text" class="form-control" wire:model.live="kode_fakultas"
                        placeholder="Contoh: FEB">
                    @error('kode_fakultas')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Nama Fakultas</label>
                    <input type="text" class="form-control" wire:model.live="nama_fakultas"
                        placeholder="Contoh: Fakultas Ekonomi Bisnis">
                    @error('nama_fakultas')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Target Fakulas</label>
                    <input type="number" class="form-control" wire:model.live="target" placeholder="Contoh: 100">
                    @error('target')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Batalkan
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $fakultasId ? 'Perbaharui Data' : 'Simpan Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
