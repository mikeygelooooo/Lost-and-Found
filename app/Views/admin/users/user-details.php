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
                    User #<?= esc($user['id']) ?>
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">User Details</h1>
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
            <div class="row">
                <!-- Left Column: Profile Picture + Buttons -->
                <div class="col-md-4 text-center mb-4 mb-md-0 d-flex flex-column align-items-center justify-content-start">
                    <?php if ($user['profile_picture']): ?>
                        <img src="<?= base_url('uploads/profile_pictures/' . esc($user['profile_picture'])) ?>"
                            alt="Profile Picture"
                            class="img-thumbnail rounded-circle border border-3 border-dark mb-3"
                            style="max-width: 200px;">
                    <?php else: ?>
                        <img src="<?= base_url('uploads/profile_pictures/blank.jpg') ?>"
                            alt="Profile Picture"
                            class="img-thumbnail rounded-circle border border-3 border-dark mb-3"
                            style="max-width: 200px;">
                    <?php endif; ?>

                    <div class="row w-100 justify-content-center gap-2">
                        <div class="col-8">
                            <a href="<?= base_url('admin/users/update/profile-picture/' . $user['id']) ?>" class="btn btn-outline-primary w-100">
                                <i class="fas fa-camera me-1"></i> Change Photo
                            </a>
                        </div>
                        <div class="col-8">
                            <a href="<?= base_url('admin/users/update/password/' . $user['id']) ?>" class="btn btn-outline-dark w-100">
                                <i class="fas fa-lock me-1"></i> Change Password
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: User Info Fields -->
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-semibold">First Name</label>
                            <input type="text" name="first_name" class="form-control bg-light" readonly
                                value="<?= esc($user['first_name']) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Last Name</label>
                            <input type="text" name="last_name" class="form-control bg-light" readonly
                                value="<?= esc($user['last_name']) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control bg-light" readonly
                            value="<?= esc($user['email']) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control bg-light" readonly
                            value="<?= esc($user['phone_number']) ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Role</label>
                            <input type="text" class="form-control bg-light" readonly
                                value="<?= ucfirst($user['role']) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Date Registered</label>
                            <input type="text" class="form-control bg-light" readonly
                                value="<?= date('F j, Y', strtotime($user['created_at'])) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Reports Made</label>
                            <input type="text" class="form-control bg-light" readonly
                                value="<?= esc($report_count) ?>">
                        </div>
                    </div>
                </div> <!-- /.col-md-8 -->
            </div> <!-- /.row -->
        </div>
        <div class="card-footer p-3">
            <div class="d-flex justify-content-end flex-wrap gap-2">
                <a href="<?= base_url('admin/users/update/' . $user['id']) ?>" class="btn btn-primary">
                    Edit Details
                </a>
                <form action="<?= base_url('admin/users/update/role/' . $user['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="role" value="<?= $user['role'] === 'user' ? 'admin' : 'user' ?>">
                    <button type="submit" class="btn text-white btn-<?= $user['role'] === 'user' ? 'info' : 'warning' ?>">Change Role</button>
                </form>
                <form action="<?= base_url('admin/users/delete/' . $user['id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>