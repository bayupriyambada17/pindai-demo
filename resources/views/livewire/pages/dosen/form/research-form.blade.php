<div wire:ignore.self class="modal modal-blur fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $researchId ? 'Update Data' : 'Save Data' }}</h5>
                <button type="button" wire:click="closeModal()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model.live="researchId">
                <div class="mb-3">
                    <label class="form-label required">Title Research</label>
                    <input type="text" class="form-control" wire:model.live="title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Description</label>
                    <textarea class="form-control" wire:model="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Funding Research</label>
                    <div class="btn-group w-100" role="group">
                        <input wire:model="funding" type="radio" class="btn-check" name="btn-radio-basic" id="btn-radio-basic-1" value="independent"
                            autocomplete="off" checked="">
                        <label for="btn-radio-basic-1" type="button" class="btn">Independent</label>
                        <input type="radio" class="btn-check" wire:model="funding" name="btn-radio-basic" id="btn-radio-basic-2" value="finance"
                            autocomplete="off">
                        <label for="btn-radio-basic-2" type="button" class="btn">Finance</label>
                    </div>
                    @error('funding')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Research Type</label>
                    <div class="btn-group w-100" role="group">
                        <input wire:model="type_research" type="radio" class="btn-check" name="btn-type-research" id="btn-type-research-1" value="devotion"
                            autocomplete="off" checked="">
                        <label for="btn-type-research-1" type="button" class="btn">Devotion</label>
                        <input type="radio" class="btn-check" wire:model="type_research" name="btn-type-research" id="btn-type-research-2" value="study"
                            autocomplete="off">
                        <label for="btn-type-research-2" type="button" class="btn">Study</label>
                    </div>
                    @error('type_research')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Implementation Type</label>
                    <div class="btn-group w-100" role="group">
                        <input wire:model="semesters" type="radio" class="btn-check" name="btn-implementation" id="btn-implementation-1" value="odd"
                            autocomplete="off" checked="">
                        <label for="btn-implementation-1" type="button" class="btn">Odd</label>
                        <input type="radio" class="btn-check" wire:model="semesters" name="btn-implementation" id="btn-implementation-2" value="even"
                            autocomplete="off">
                        <label for="btn-implementation-2" type="button" class="btn">Even</label>
                    </div>
                    @error('semesters')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">Academic Year</label>
                    <select class="form-select" wire:model="academic_year_id">
                        <option value="">-- Select Academic Year --</option>
                        @foreach ($academicYears as $academicYear)
                            <option value="{{ $academicYear->id }}">{{ $academicYear->academic_year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-outline-secondary">
                    Cancel
                </button>
                <button wire:click.prevent="save" type="button" class="btn btn-primary ms-auto">
                    {{ $researchId ? 'Update Data' : 'Save Data' }}
                </button>
            </div>
        </div>
    </div>
</div>
