<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

      {{-- LEFT --}}
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
            <i class="bi bi-list"></i>
          </a>
        </li>

        <li class="nav-item d-none d-md-block">
          <span class="nav-link fw-semibold">
            Internal Admin Panel
          </span>
        </li>
      </ul>

      {{-- RIGHT --}}
      <ul class="navbar-nav ms-auto">

        {{-- FULLSCREEN --}}
        <li class="nav-item">
          <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
          </a>
        </li>

        {{-- USER MENU --}}
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgAqRaFTzMDUvkKsGPnjojD4APa34rVF_JOg&s"
              class="user-image rounded-circle shadow"
              alt="User Image"
            />
            <span class="d-none d-md-inline">Arif Alexander</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

            {{-- HEADER --}}
            <li class="user-header text-bg-primary">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgAqRaFTzMDUvkKsGPnjojD4APa34rVF_JOg&s"
                class="rounded-circle shadow"
                alt="User Image"
              />
              <p>
                Arif Alexander
                <small>Internal System</small>
              </p>
            </li>
          </ul>
        </li>

      </ul>
    </div>
</nav>