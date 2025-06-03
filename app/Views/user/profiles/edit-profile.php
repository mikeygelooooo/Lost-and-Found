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
                    <h4 class="mb-0"><i class="fas fa-circle-user me-2"></i>Edit Profile Details</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <?= view('user/forms/edit-profile-form', ['user' => $user]); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>