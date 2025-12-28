<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{ asset('images\icons\laravel.svg') }}" alt="Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <br>
            <span class="brand-text fw-dark">Sistem Karang Taruna</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- EVENT --}}
                <li class="nav-item {{ request()->routeIs('events.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-calendar-event"></i>
                        <p>
                            Event
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('events.index') }}"
                                class="nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Daftar Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('events.create') }}"
                                class="nav-link {{ request()->routeIs('events.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Buat Event</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- BARANG --}}
                <li class="nav-item">
                    <a href="{{ route('items.index') }}"
                        class="nav-link {{ request()->routeIs('items.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>Barang</p>
                    </a>
                </li>

                {{-- ANGGOTA --}}
                <li class="nav-item">
                    <a href="{{ route('members.index') }}"
                        class="nav-link {{ request()->routeIs('members.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Anggota</p>
                    </a>
                </li>

                {{-- TEAM --}}
                <li class="nav-item {{ request()->routeIs('teams.index') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('teams.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-diagram-3"></i>
                        <p>
                            Tim
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teams.index') }}"
                                class="nav-link {{ request()->routeIs('teams.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Daftar Tim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teams.create') }}"
                                class="nav-link {{ request()->routeIs('teams.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Buat Tim</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </nav>
    </div>
</aside>
