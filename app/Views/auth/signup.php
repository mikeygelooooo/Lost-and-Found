<?= $this->extend('layouts/base') ?>

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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Create an Account</h4>
                    <small>Fill in the details to sign up</small>
                </div>
                <div class="card-body px-4 py-4">
                    <?= view('forms/signup-form'); ?>
                </div>
                <div class="card-footer bg-light">
                    <small><span class="text-danger">*</span> Required fields</small>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>