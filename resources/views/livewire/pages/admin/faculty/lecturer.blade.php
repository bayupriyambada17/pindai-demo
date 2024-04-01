<div>
    <div class="row g-2 align-items-center">
        <div class="col">
            <x-header-page-components title="Faculty - Lecturer" />
        </div>
    </div>

    <div class="mt-4">
        <div class="row row-deck row-cards">
            <div class="col-3">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Search Lecturer...">
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
                                <th>NIDN</th>
                                <th>Name Lecturer</th>
                                <th>Email</th>
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

                                </tr>
                            @empty
                                <tr>
                                    <x-not-found-table length="4" />
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
</div>
{{-- @push('scripts')
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
@endpush --}}
