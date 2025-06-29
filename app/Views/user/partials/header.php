<?php
$userModel = new \App\Models\UserModel();
$userId = session()->get('user_id');
$user = $userModel->find($userId);
?>

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


                <?php if (session()->has('user_id')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i><?= esc(strtoupper($user['first_name'])) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('profile/details') ?>">
                                    <i class="fas fa-user text-success me-2"></i>Profile Details
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('profile/report-history') ?>">
                                    <i class="fas fa-clock text-success me-2"></i>Report History
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('profile/account-settings') ?>">
                                    <i class="fas fa-cog text-success me-2"></i>Account Settings
                                </a>
                            </li>
                            <?php if ($user['role'] == 'admin'): ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('admin/dashboard') ?>">
                                        <i class="fas fa-cog text-warning me-2"></i>Admin Panel
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                    <i class="fas fa-right-from-bracket text-danger me-2"></i>Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <?php $current = uri_string(); ?>
                    <a class="nav-link <?= in_array($current, ['login', 'signup']) ? 'active' : '' ?>" href="<?= base_url('login') ?>">
                        <i class="fas fa-user me-1"></i>
                        LOG IN
                    </a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>