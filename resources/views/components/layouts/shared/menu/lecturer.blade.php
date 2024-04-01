<ul class="navbar-nav pt-lg-3">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('lecturer.dashboard') ? 'active' : '' }}"
            href="{{ route('lecturer.dashboard') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </span>
            <span class="nav-link-title">
                Dashboard
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('lecturer.research') ? 'active' : '' }}"
            href="{{ route('lecturer.research') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </span>
            <span class="nav-link-title">
                Riset
            </span>
        </a>
    </li>
    {{--
    <li class="nav-item {{ request()->routeIs('operator.fakultas', 'operator.dosen', 'operator.programpendidikan', 'operator.programstudi') ? 'active' : '' }} dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false"
            role="button" aria-expanded="false">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M15 15l3.35 3.35" />
                    <path d="M9 15l-3.35 3.35" />
                    <path d="M5.65 5.65l3.35 3.35" />
                    <path d="M18.35 5.65l-3.35 3.35" />
                </svg>
            </span>
            <span class="nav-link-title">
                Master Data
            </span>
        </a>
        <div class="dropdown-menu {{ request()->routeIs('operator.fakultas', 'operator.dosen', 'operator.programpendidikan', 'operator.programstudi') ? 'show' : '' }} ">
            <a class="dropdown-item {{ request()->routeIs('operator.fakultas') ? 'active' : '' }} " href="{{ route('operator.fakultas') }}">
                Fakultas
            </a>
            <a class="dropdown-item {{ request()->routeIs('operator.dosen') ? 'active' : '' }}" href="{{ route('operator.dosen') }}">
                Dosen
            </a>
            <a class="dropdown-item {{ request()->routeIs('operator.programpendidikan') ? 'active' : '' }}" href="{{ route('operator.programpendidikan') }}">
                Program Pendidikan
            </a>
            <a class="dropdown-item {{ request()->routeIs('operator.programstudi') ? 'active' : '' }}" href="{{ route('operator.programstudi') }}">
                Program Studi
            </a>
        </div>
    </li>
    <li class="nav-item {{ request()->routeIs('operator.pengabdian.bidang-pengabdian', 'operator.pengabdian.metode-pelaksanaan') ? 'active' : '' }} dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false"
            role="button" aria-expanded="false">
            <span
                class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M15 15l3.35 3.35" />
                    <path d="M9 15l-3.35 3.35" />
                    <path d="M5.65 5.65l3.35 3.35" />
                    <path d="M18.35 5.65l-3.35 3.35" />
                </svg>
            </span>
            <span class="nav-link-title">
                Master Pengabdian
            </span>
        </a>
        <div class="dropdown-menu {{ request()->routeIs('operator.pengabdian.bidang-pengabdian', 'operator.pengabdian.metode-pelaksanaan') ? 'show' : '' }} ">
            <a class="dropdown-item {{ request()->routeIs('operator.pengabdian.metode-pelaksanaan') ? 'active' : '' }} " href="{{ route('operator.pengabdian.metode-pelaksanaan') }}">
                Metode Pelaksanaan
            </a>
            <a class="dropdown-item {{ request()->routeIs('operator.pengabdian.bidang-pengabdian') ? 'active' : '' }}" href="{{ route('operator.pengabdian.bidang-pengabdian') }}">
                Bidang Pengabdian
            </a>
        </div>
    </li> --}}
</ul>
