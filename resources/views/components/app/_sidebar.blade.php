<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset('img/logo/logo-color2.png') }}">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item{{ (request()->is('home*')) ?  ' active' : '' }}">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @role('superadmin|admin')
                <li class='sidebar-title'>Users</li>
                <li class="sidebar-item{{ (request()->is('users*')) ?  ' active' : '' }}">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i data-feather="users" width="20"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('role*')) ?  ' active' : '' }}">
                    <a href="{{ route('role.index') }}" class='sidebar-link'>
                        <i data-feather="user-check" width="20"></i>
                        <span>Role</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('mahasiswa*')) ?  ' active' : '' }}">
                    <a href="{{ route('mahasiswa.index') }}" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>

                <li class='sidebar-title'>Form</li>
                <li class="sidebar-item{{ (request()->is('data-mahasiswa*')) ?  ' active' : '' }}">
                    <a href="{{ route('data-mahasiswa.index') }}" class='sidebar-link'>
                        <i data-feather="users" width="20"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('data-proposal*')) ?  ' active' : '' }}">
                    <a href="{{ route('data-proposal.index') }}" class='sidebar-link'>
                        <i data-feather="file" width="20"></i>
                        <span>Data Proposal Tugas Akhir</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('data-seminar*')) ?  ' active' : '' }}">
                    <a href="{{ route('data-seminar.index') }}" class='sidebar-link'>
                        <i data-feather="file-minus" width="20"></i>
                        <span>Data Seminar Hasil</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('data-pendadaran*')) ?  ' active' : '' }}">
                    <a href="{{ route('data-pendadaran.index') }}" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Data Pendadaran</span>
                    </a>
                </li>
                @endrole

                @role('superadmin|mahasiswa')
                <li class='sidebar-title'>Pendaftaran</li>
                <li class="sidebar-item{{ (request()->is('data-diri*')) ?  ' active' : '' }}">
                    <a href="{{ route('data-diri.index') }}" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Data Diri</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('seminar-hasil*')) ?  ' active' : '' }}">
                    <a href="{{ route('seminar-hasil.index') }}" class='sidebar-link'>
                        <i data-feather="file-minus" width="20"></i>
                        <span>Seminar Hasil</span>
                    </a>
                </li>
                <li class="sidebar-item{{ (request()->is('pendadaran*')) ?  ' active' : '' }}">
                    <a href="{{ route('pendadaran.index') }}" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Pendadaran</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
