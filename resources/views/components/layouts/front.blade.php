<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title ?? '' }} - SI PINDAI</title>
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @livewireStyles()
</head>

<body>
    <div class="page">
        <div class="page">
            @include('components.layouts.shared.front.header')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    {{ $slot }}
                </div>
            </div>
            @include('components.layouts.shared.footer')
        </div>
    </div>

    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
    <script src="{{ asset('dist/js/sweetAlert.js') }}"></script>
    @livewireScripts()
    <x-livewire-alert::scripts />
    @stack('scripts')
</body>

</html>
