<div>
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Halaman Riset
            </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <button wire:click="openModal()" type="button" class="btn btn-primary d-none d-sm-inline-block">
                    Add Data
                </button>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                    data-bs-target="#modalForm" aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="row row-deck row-cards">
            <div class="col-3">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Search Research By Title...">
            </div>
            <div class="col-3">
                <select class="form-select" wire:model.live="selectFunding">
                    <option value="">-- Select Funding --</option>
                    <option value="independent">(Independent) Pembiayaan Mandiri</option>
                    <option value="finance">(Finance) Di sponsori</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-select" wire:model.live="selectTypeResearch">
                    <option value="">-- Select Type Research --</option>
                    <option value="devotion">(Devotion) Pengabdian Masyarakat</option>
                    <option value="study">(Study) Penelitian Masyarakat</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-select" wire:model.live="selectSemesters">
                    <option value="">-- Select Semesters --</option>
                    <option value="odd">(Odd) Ganjil</option>
                    <option value="even">(Even) Genap</option>
                </select>
            </div>

        </div>
    </div>

    <div class="mt-3">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-bordered text-center card-table table-striped">
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>Title Research</th>
                                <th>Funding</th>
                                <th>Type Research</th>
                                <th>Semesters</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($researchByDosen as $research)
                                <tr wire:key="research-{{ $research->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-muted">
                                        {{ $research->title }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $research->funding == 'independent' ? 'Pembiayaan Mandiri' : 'Di Sponsori' }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $research->type_research == 'devotion' ? 'Pengabdian' : 'Penelitian' }} Masyarakat
                                    </td>
                                    <td class="text-muted">
                                        {{ $research->semesters == 'odd' ? 'Ganjil' : 'Genap' }}
                                    </td>

                                    <td>
                                        <a href="{{ route('lecturer.research.view', encrypt($research->id)) }}"
                                            class="btn btn-outline-info btn-icon">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                        </a>
                                        <button wire:click="edit({{ $research->id }})" type="button"
                                            class="btn btn-outline-warning btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-pencil" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                <path d="M13.5 6.5l4 4" />
                                            </svg>
                                        </button>
                                        <button type="button" wire:click="formDelete({{ $research->id }})"
                                            class="btn btn-outline-danger btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <x-not-found-table length="6" />
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 mx-4">
                        {{-- {{ $pengabdian->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    @include('livewire.pages.dosen.form.research-form')
    {{-- end modal --}}

    {{-- delete --}}
    {{-- @include('livewire.pages.dosen.form.delete.academic-delete') --}}
    {{-- delete --}}
</div>
@push('scripts')
    <script>
        Livewire.on('closeModal', () => {
            $('#modalForm').modal('hide');
        });

        Livewire.on('openModal', () => {
            $('#modalForm').modal('show');
        });
        Livewire.on('openModalDelete', () => {
            $('#modalDelete').modal('show');
        });
        Livewire.on('closeModalDelete', () => {
            $('#modalDelete').modal('hide');
        });
    </script>
@endpush
