<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $academicYearId ? 'Update Data' : 'Save Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="academicYearId">
                <div class="mb-3">
                    <label class="form-label required">Year</label>
                    <input type="text" class="form-control" wire:model.live="tahun_akademik"
                        placeholder="Contoh: 2022/2023" autocomplete="off">
                    @error('tahun_akademik')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Tahun Ganjil Mulai</label>
                            <input type="date" id="ganjil_start" class="form-control"
                                placeholder="Contoh: {{ Date('Y M d') }}" wire:model.live="periode_ganjil_start"
                                autocomplete="off">
                            @error('periode_ganjil_start')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Tahun Ganjil Selesai</label>
                            <input type="date" id="date" class="form-control"
                                placeholder="Contoh: {{ Date('Y M d') }}" wire:model.live="periode_ganjil_end"
                                autocomplete="off">
                            @error('periode_ganjil_end')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Tahun Genap Mulai</label>
                            <input type="date" class="form-control" placeholder="Contoh: {{ Date('Y M d') }}" wire:model.live="periode_genap_start" autocomplete="off">
                            @error('periode_genap_start')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Tahun Genap Selesai</label>
                            <input type="date" class="form-control" placeholder="Contoh: {{ Date('Y M d') }}"
                                wire:model.live="periode_genap_end" autocomplete="off">
                            @error('periode_genap_end')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Cancel
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $academicYearId ? 'Update Data' : 'Save Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
