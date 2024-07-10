<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $academicYearId ? 'Perbaharui Data' : 'Simpan Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="academicYearId">
                <div class="mb-3">
                    <label class="form-label required">Year</label>
                    <input type="text" class="form-control" wire:model.live="academic_year"
                        placeholder="Contoh: 2022/2023" autocomplete="off">
                    @error('academic_year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Cancel
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $academicYearId ? 'Perbaharui Data' : 'Simpan Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
