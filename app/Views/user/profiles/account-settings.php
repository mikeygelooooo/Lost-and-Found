<?= $this->extend('user/base') ?>

<?= $this->section('content') ?>
<section class="container p-5">
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

    <div class="row justify-content-center g-4">
        <div class="col-lg-3">
            <div class="card shadow border-0 text-center">
                <?= $this->include('user/partials/profile-sidebar') ?>
            </div>
        </div>

        <!-- Right Section: Profile Details Form -->
        <div class="col-lg-9">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-cogs me-2"></i>User Account Settings</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <!-- Password Change Section -->
                    <h5 class="mb-3 text-primary fw-bold">
                        <i class="fas fa-key me-2"></i>Change Password
                    </h5>
                    <form action="<?= site_url('profile/update/password') ?>" method="post">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="current_password" placeholder="Enter current password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Enter new password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm new password" required>
                        </div>
                        <div class="col-xl-4">
                            <button type="submit" class="btn btn-primary p-2 w-100">
                                <i class="fas fa-floppy-disk me-1"></i> SAVE
                            </button>
                        </div>
                    </form>

                    <hr class="my-4 border border-1 border-secondary opacity-50">

                    <!-- Account Deletion Section -->
                    <h5 class="mb-3 text-danger fw-bold">
                        <i class="fas fa-exclamation-triangle me-2"></i>Delete Account
                    </h5>
                    <p class="text-danger mb-3 fw-semibold">
                        Warning: Deleting your account is <strong>permanent</strong> and <strong>cannot be undone</strong>.
                        All your data will be lost.
                    </p>
                    <div class="col-xl-4">
                        <form action="<?= site_url('profile/delete-account') ?>" method="post" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger w-100 border-2 p-2">
                                <i class="fas fa-trash-alt me-2"></i>DELETE ACCOUNT
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>