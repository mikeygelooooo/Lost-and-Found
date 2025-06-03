<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('/') ?>" class="nav-link mb-0">
                        <i class="nav-icon fas fa-boxes-packing fs-5"></i>
                        <p class="fs-5 ms-2" style="font-family: 'Lobster';">FindMyStuff</p>
                    </a>
                </li>

                <hr class="border border-white border-1 opacity-50">

                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/reports') ?>" class="nav-link">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>Reports Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/users') ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Audit Logs</p>
                    </a>
                </li>

                <hr class="border border-white border-1 opacity-50">

                <li class="nav-item">
                    <a href="<?= base_url('profile/details') ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>