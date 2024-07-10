<div>
    <div class="row g-2 align-items-center">
        <div class="col">
            <x-header-page-components title="Admin - Research" />
        </div>

    </div>

    <div class="mt-4">
        <div class="row row-deck row-cards">
            <div class="col-4">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Judul">
            </div>
            <div class="col-2">
                <select name="" class="form-select" wire:model.live="selectFunding"> 
                    <option value="">Pilih Pendanaan</option>
                    <option value="mandiri">Mandiri</option>
                    <option value="hibah">Hibah</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-select" wire:model.live="selectType"> 
                    <option value="">Pilih Tipe Riset</option>
                    <option value="penelitian">Penelitian</option>
                    <option value="pengabdian">Pengabdian</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-select" wire:model.live="selectSemester"> 
                    <option value="">Pilih Semester</option>
                    <option value="ganjil">Semester Ganjil</option>
                    <option value="genap">Semester Genap</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-select" wire:model.live="selectAcademicYear"> 
                    <option value="">Pilih Tahun Akademik</option>
                    @foreach ($academicYear as $item)
                        <option value="{{ $item->academic_year }}">{{ $item->academic_year }}</option>
                    @endforeach
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
                                <th>Judul Riset</th>
                                <th>Pendanaan</th>
                                <th>Tipe Riset</th>
                                <th>Semester</th>
                                <th>Tahun</th>
                                <th>Dosen (NIDN)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($researchLecturer)
                            @forelse ($researchLecturer as $research)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-muted">
                                        {{ $research->title }}
                                    </td>


                                    <td class="text-muted">
                                        <span class="text-capitalize">{{ $research->funding }}</span>
                                    </td>
                                    <td class="text-muted">
                                        <span class="text-capitalize">
                                            {{ $research->type_research }}
                                        </span>
                                    </td>
                                    <td class="text-muted">
                                        <span class="text-capitalize">
                                            Semester {{ $research->semesters }}</span>

                                    </td>
                                    <td class="text-muted">
                                        {{ $research->academicYear->academic_year }}

                                    </td>

                                    <td class="text-muted">
                                        <span class="text-capitalize">
                                            {{ $research->lecturer->name }}</span> ({{ $research->lecturer->nidn }})
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <x-not-found-table length="7" />
                                </tr>
                            @endforelse
                                
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-4 mx-4">
                        {{ $researchLecturer->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
