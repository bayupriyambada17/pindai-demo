<div>
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-12">
                        <x-indicator-card
                            text="Indikator yang ditampilkan dalam warna hijau menunjukkan bahwa mereka telah memenuhi standar untuk manajemen perguruan tinggi yang berkualitas."
                            bgColor="bg-green"></x-indicator-card>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <x-indicator-card
                            text="Indikator yang berwarna kuning menandakan bahwa perlu dilakukan evaluasi lebih lanjut untuk memastikan bahwa mereka memenuhi standar pengelolaan perguruan tinggi yang baik."
                            bgColor="bg-yellow"></x-indicator-card>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <x-indicator-card
                            text="Indikator yang berwarna merah menandakan bahwa area tersebut memerlukan perhatian lebih dan tindakan segera untuk memenuhi standar pengelolaan perguruan tinggi yang baik."
                            bgColor="bg-red"></x-indicator-card>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                Daftar Fakultas
                            </div>
                        </div>
                    </div>
                    @foreach ($faculties as $item)
                        <div class="col-md-6 col-lg-4">
                            <x-faculty-card route="{{ route('detail.faculty',encrypt( $item['id'])) }}"
                                text="{{ $item['faculty_name'] }} ({{ $item['faculty_code'] }})"></x-faculty-card>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
