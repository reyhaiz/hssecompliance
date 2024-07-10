<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">HSSE Compliance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('user_role') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Menu -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Manage Regulations Menu -->
                <li class="nav-item">
                    <a href="/regulations" class="nav-link <?= (uri_string() == 'regulations' || uri_string() == 'regulations/add' || strpos(uri_string(), 'regulations/edit') !== false || strpos(uri_string(), 'regulations/detail') !== false) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Manage Regulations</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
