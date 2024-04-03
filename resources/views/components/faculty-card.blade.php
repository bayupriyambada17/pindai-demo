@props([
    'text' => '',
    'route' => '#'
])

<a href="{{ $route }}" style="text-decoration: none;">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md mt-3">
                    <h4>{{ $text }}</h4>
                </div>
                <div class="col-md-auto">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-external-link-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M10 14l2 -2m2.007 -2.007l6 -6" /><path d="M15 4h5v5" /><path d="M3 3l18 18" /></svg>
                </div>
            </div>
        </div>
    </div>
</a>
