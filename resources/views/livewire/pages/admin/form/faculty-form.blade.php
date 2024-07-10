<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $facultyId ? 'Perbaharui Data' : 'Simpan Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="facultyId">
                <div class="mb-3">
                    <label class="form-label required">Kode Fakultas</label>
                    <input type="text" class="form-control" wire:model.live="faculty_code"
                        placeholder="Contoh: FEB">
                    @error('faculty_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Nama Fakultas</label>
                    <input type="text" class="form-control" wire:model.live="faculty_name"
                        placeholder="Contoh: Fakultas Ekonomi Bisnis">
                    @error('faculty_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Target Fakulas</label>
                    <input type="number" class="form-control" wire:model.live="faculty_target" placeholder="Contoh: 100">
                    @error('faculty_target')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Batalkan
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $facultyId ? 'Perbaharui Data' : 'Simpan Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
