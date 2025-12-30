<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">

      {{-- BRAND --}}
      <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">
          <i class="bi bi-box-seam me-1"></i>
          Inventaris Karang Taruna
      </a>

      {{-- TOGGLER --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">


          {{-- RIGHT MENU --}}
          <ul class="navbar-nav ms-auto">

              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                     href="#"
                     role="button"
                     data-bs-toggle="dropdown"
                     aria-expanded="false">

                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgAqRaFTzMDUvkKsGPnjojD4APa34rVF_JOg&s"
                           width="32"
                           height="32"
                           class="rounded-circle border">

                      <span class="fw-semibold">
                          {{ auth()->user()->name }}
                      </span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                      <li class="px-3 py-2">
                          <div class="fw-semibold">
                              {{ auth()->user()->name }}
                          </div>
                          <small class="text-muted">Internal System</small>
                      </li>

                      <li><hr class="dropdown-divider"></li>

                      <li class="px-3">
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button class="btn btn-outline-danger w-100">
                                  <i class="bi bi-box-arrow-right"></i> Logout
                              </button>
                          </form>
                      </li>

                  </ul>
              </li>

          </ul>

      </div>
  </div>
</nav>
