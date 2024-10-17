<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            
        </div>
        <div class="sidebar-brand-text mx-3">BACKOFFICE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

        @can('management-access')
            
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Management Access</span>
        </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                    <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                    <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
                </div>
            </div>
        </li>
        @endcan

        @can('master-data')
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('units.index') }}">Unit</a>
                    <a class="collapse-item" href="{{ route('kategori.index') }}">Kategori</a>
                </div>
            </div>
            </li>
        @endcan

        @can('unit-permintaan')      
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('unit-permintaan.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Permintaan</span>
            </a> 
        </li>
        @endcan

        @can('manager-klinik')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manager-klinik.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Approval M.Klinik</span>
            </a> 
        </li>
        @endcan

        @can('cetak-surat')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Surat</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('surat-permintaan-unit.index') }}">Permintaan Unit</a>
                    <a class="collapse-item" href="{{ route('memo-permintaan.index') }}">Memo Permintaan</a>
                    <a class="collapse-item" href="{{ route('memo-persetujuan.index') }}">Memo Persetujuan</a>
              
                </div>
            </div>
        </li>
    @endcan

        @can('admin-updated')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('daftar-permintaan.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Daftar Permintaan</span>
            </a> 
        </li>
        @endcan

        @can('kepala-bidang')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('kepala-bidang.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Approval Kepala Bidang</span>
            </a> 
        </li>
        @endcan

        @can('manager-operational')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manager-operational.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Approval M. Operational</span>
            </a> 
        </li>
        @endcan
     
        @can('manager-keuangan')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manager-keuangan.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Approval M. Keuangan</span>
            </a> 
        </li>
        @endcan

        @can('direktur')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('direktur.index') }}" 
                aria-expanded="true" >
                <i class="fas fa-fw fa-list"></i>
                <span>Direktur</span>
            </a> 
        </li>
        @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>