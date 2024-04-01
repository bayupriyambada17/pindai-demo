<div>
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Pages Lecturer
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
                <input type="text" class="form-control" placeholder="Cari Tahun Akademik...">
            </div>
            {{-- <div class="col-3">
                <select class="form-select" wire:model.live="selectBidangPengabdianId">
                    <option value="">-- Pilih Bidang Pengabdian --</option>
                    @foreach ($bidangPengabdian as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_bidang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <select class="form-select" wire:model.live="selectMetodePelaksanaanId">
                    <option value="">-- Pilih Metode Pengabdian --</option>
                    @foreach ($metodePelaksanaan as $item)
                        <option value="{{ $item->id }}">{{ $item->metode_pelaksanaan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <select class="form-select" wire:model.live="selectPendaan">
                    <option value="">-- Pilih Pendanaan --</option>
                    <option value="didanai">Didanai</option>
                    <option value="tidak-didanai">Tidak Di Danai</option>
                </select>
            </div> --}}

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
                                <th>NIDN</th>
                                <th>Nama Dosen</th>
                                <th>Email Dosen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lecturers as $lecturer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-muted">
                                        {{ $lecturer->nidn }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $lecturer->name }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $lecturer->email }}
                                    </td>

                                    <td>
                                        <button wire:click="edit({{ $lecturer->id }})" type="button"
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
                                        <button type="button" wire:click="formDelete({{ $lecturer->id }})"
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
                                    <td colspan="4" class="text-center">Data Not Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 mx-4">
                        {{ $lecturers->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    @include('livewire.pages.admin.form.lecturer-form')
    {{-- end modal --}}

    {{-- delete --}}
    @include('livewire.pages.admin.form.delete.lecturer-delete')
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

        function validateInput(input) {
        // Menghapus karakter non-angka dari input
        input.value = input.value.replace(/\D/g, '');
    }
    </script>
@endpush
