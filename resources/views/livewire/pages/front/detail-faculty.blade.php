<div>

    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Halaman Detail: {{ optional($faculty)->faculty_name }} ({{ optional($faculty)->faculty_code }})</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <select class="form-select" wire:model.live="selectSemesters">
                                            <option value="">-- Pilih Semester --</option>
                                            <option value="odd">(Odd) Ganjil</option>
                                            <option value="even">(Even) Genap</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" wire:model.live="selectAcademicYearId">
                                            <option value="">-- Pilih Tahun --</option>
                                            @foreach ($academicYears as $item)
                                                <option value="{{ $item->id }}">{{ $item->academic_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select" wire:model.live="selectTypeResearch">
                                            <option value="">-- Pilih Riset Penelitian --</option>
                                            <option value="devotion">(devotion) Pengabdian</option>
                                            <option value="study">(study) Penelitian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="row row-cards">
                            <div class="col-md-6">
                                <x-indicator-detail :bgColor="$data['devotion']['color']" label="Informasi Penelitian">
                                    <div class="mt-1">
                                        <div class="text-muted badge badge-outline text-green">>= 75%</div>
                                        <div class="text-muted badge badge-outline text-yellow">>= 25%</div>
                                        <div class="text-muted badge badge-outline text-red">
                                            < 25%</div>
                                        </div>
                                </x-indicator-detail>
                            </div>
                            <div class="col-md-6">
                            <x-indicator-detail :bgColor="$data['study']['color']" label="Informasi Pengabdian">
                                    <div class="mt-1">
                                        <div class="text-muted badge badge-outline text-green">>= 75%</div>
                                        <div class="text-muted badge badge-outline text-yellow">>= 25%</div>
                                        <div class="text-muted badge badge-outline text-red">
                                            < 25%</div>

                                        </div>
                                </x-indicator-detail>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul Penelitian</th>
                                            <th>Nama Dosen</th>
                                            <th>Semester</th>
                                            <th>Tipe Penelitian</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faculty->research as $item)
                                            <tr>
                                                <td class="text-secondary">{{ $loop->iteration }}</td>
                                                <td class="text-secondary">
                                                    {{ $item->title }}
                                                </td>
                                                <td class="text-secondary">{{ $item->lecturer->name }}</td>
                                                <td class="text-secondary">
                                                    {{ $item->semesters === 'odd' ? 'Ganjil' : 'Genap' }}
                                                </td>
                                                <td class="text-secondary">
                                                    {{ $item->type_research === 'devotion' ? 'Pengabdian' : 'Penelitian' }}
                                                </td>
                                                <td class="text-secondary">
                                                    {{ $item->academicYear->academic_year }}
                                                </td>

                                            </tr>
                                        @empty
                                            <x-not-found-table length="6"></x-not-found-table>
                                        @endforelse

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
