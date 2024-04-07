@props([
    'bgColor' => 'green',
    'label' => 'Penilaian Warna dalam Evaluasi Fakultas'
])

<div class="card card-sm">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="bg-{{ $bgColor }} text-white avatar" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>

                </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">
                    {{ $label }}
                </div>
                <div class="text-muted">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
