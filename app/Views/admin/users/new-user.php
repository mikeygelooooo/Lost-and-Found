<?= $this->extend('admin/admin-base') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container">
        <div class="row border border-3 px-2 mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/users') ?>" class="text-decoration-none text-dark">
                        Users
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    New User
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Create New User</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('message') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body container p-4">
            <?= view('admin/forms/new-user-form'); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>