<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="<?= base_url('/') ?>" style="font-family: 'Lobster';">
            <h4 class="mb-0">
                <i class="fas fa-boxes-packing"></i> FindMyStuff
            </h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-3">
                    <a class="nav-link <?= uri_string() == 'home' ? 'active' : '' ?>" href="<?= base_url('home') ?>">
                        <i class="fas fa-home me-1"></i>
                        HOME
                    </a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link <?= uri_string() == 'reports' ? 'active' : '' ?>" href="<?= base_url('reports') ?>">
                        <i class="fas fa-search me-1"></i>
                        BROWSE
                    </a>
                </li>
                <li class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-plus-circle me-1"></i>REPORT
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('reports/create/lost') ?>">
                                <i class="fas fa-exclamation-circle text-danger me-2"></i>Report Lost Item
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('reports/create/found') ?>">
                                <i class="fas fa-check-circle text-success me-2"></i>Report Found Item
                            </a>
                        </li>
                    </ul>
                </li>
                <?php $session = session(); ?>

                <?php if (session()->get('user_id')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i><?= strtoupper(esc($session->get('first_name'))) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user text-success me-2"></i>User Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                    <i class="fas fa-right-from-bracket text-danger me-2"></i>Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <a class="nav-link <?= uri_string() == 'login' ? 'active' : '' ?>" href="<?= base_url('login') ?>">
                        <i class="fas fa-user me-1"></i>
                        LOG IN
                    </a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>