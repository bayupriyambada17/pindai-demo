<div>
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Pages Faculty
            </h2>
        </div>
    </div>

    <div class="mt-4">
        <div class="row row-deck row-cards">
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Search Lecturer...">
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
                                    <td colspan="4" class="text-center">Data Not Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 mx-4">
                        {{-- {{ $faculties->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    @include('livewire.pages.admin.form.faculty-form')
    {{-- end modal --}}

    {{-- delete --}}
    @include('livewire.pages.admin.form.delete.faculty-delete')
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
