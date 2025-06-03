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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url('admin/users/details/' . $user['id']) ?>" class="text-decoration-none text-dark">
                        User #<?= esc($user['id']) ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Change Profile Picture
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Update User Profile Picture</h1>
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
            <form action="<?= site_url('admin/users/update/profile-picture/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">Select Profile Picture</label>
                    <input class="form-control" type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-dark p-2 w-100">
                                    <i class="fas fa-upload me-1"></i> UPLOAD
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url('admin/users/details/' . $user['id']) ?>" class="btn btn-secondary p-2 w-100">
                                    <i class="fas fa-xmark me-1"></i> CANCEL
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>