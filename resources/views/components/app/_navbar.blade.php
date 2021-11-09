<nav class="navbar navbar-header navbar-expand navbar-light">
  <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
  <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
      <li class="dropdown">
        <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          @role('superadmin|admin|laboratorium|staff')
          <div class="d-none d-md-block d-lg-inline-block">{{ ucwords(auth()->user()->username) }}</div>
          @endrole
          @role('mahasiswa')
          <div class="d-none d-md-block d-lg-inline-block">{{ ucwords(auth()->user()->username) }}</div>
          @endrole
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          @role('mahasiswa')
          <a class="dropdown-item" href="#"><i data-feather="user"></i> Akun</a>
          @endrole
          <a class="dropdown-item" href="{{ route('user-change-password') }}"><i data-feather="settings"></i> Password</a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-item">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="btn">
                <i data-feather="log-out" class="text-danger"></i><span class="fw-bold text-danger"> Logout</span>
              </button>
            </form>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
