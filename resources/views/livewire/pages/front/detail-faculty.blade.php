<div>
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Halaman Detail: {{ $data['faculty']->faculty_name }}
                                    ({{ $data['faculty']->faculty_code }})</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <x-select-component :options="['odd' => 'Ganjil', 'even' => 'Genap']" value="odd"
                                            label="-- Pilih Semester --" />
                                    </div>
                                    <div class="col-md-3">
                                        <x-select-component :options="['odd' => 'Ganjil', 'even' => 'Genap']" value="odd"
                                            label="-- Pilih Tahun --"></x-select-component>
                                    </div>
                                    <div class="col-md-3">
                                        <x-select-component :options="['odd' => 'Ganjil', 'even' => 'Genap']" value="odd"
                                            label="-- Pilih Semester --" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <x-indicator-card bgColor="bg-green"
                                    label="Informasi Penelitian"
                                    text="Penelitian fakultas ini vital, namun hanya melibatkan sekitar 10  dari 300 dosen yang menjadi target. Capaiannya saat ini baru sekitar 100% dari target yang diinginkan.."></x-indicator-card>
                            </div>
                            <div class="col-md-6">
                                <x-indicator-card label="Informasi Pengabdian" bgColor="bg-red"
                                text="Catatan Pengabdian pada fakultas ini tidak cukup bermanfaat.">
                                ></x-indicator-card>
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
                                        @forelse ($data['faculty']->research as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
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
                                                    {{ $item->academic_year_id }}
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
