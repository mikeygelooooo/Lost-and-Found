<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="container p-5">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card shadow border-0 text-center">
                <?= $this->include('partials/profile-sidebar') ?>
            </div>
        </div>

        <!-- Right Section: Profile Details Form -->
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-circle-user me-2"></i>User Profile Details</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <?= view('forms/profile-details-form', ['user' => $user]); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>