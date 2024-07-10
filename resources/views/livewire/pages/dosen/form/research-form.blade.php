<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $researchId ? 'Perbaharui Data' : 'Simpan Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="researchId">
                <div class="mb-3">
                    <label class="form-label required">Judul Riset</label>
                    <input type="text" class="form-control" wire:model.live="title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" wire:model.live="description" rows="3"></textarea>


                </div>
                <div class="mb-3">
                    <label class="form-label required">Pendanaan</label>
                    <select class="form-select" wire:model.live="funding">
                        <option value="">-- Pilih Pendanaan --</option>
                        <option value="mandiri">Mandiri</option>
                        <option value="hibah">Hibah</option>
                    </select>
                    @error('funding')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Tipe Riset</label>
                    <select class="form-select" wire:model.live="type_research">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="penelitian">Penelitian</option>
                        <option value="pengabdian">Pengabdian</option>
                    </select>

                    @error('type_research')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Semester</label>
                    <select class="form-select" wire:model.live="semesters">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="ganjil">Semester Ganjil</option>
                        <option value="genap">Semester Genap</option>
                    </select>

                    @error('semesters')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Tahun Akademik</label>
                    <select class="form-select" wire:model="academic_year_id">
                        <option value="">-- Select Tahun Akademik --</option>
                        @foreach ($academicYears as $academicYear)
                            <option value="{{ $academicYear->id }}">{{ $academicYear->academic_year }}</option>
                        @endforeach
                    </select>
                    @error('academic_year_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Batalkan
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $researchId ? 'Perbaharui Data' : 'Simpan Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
