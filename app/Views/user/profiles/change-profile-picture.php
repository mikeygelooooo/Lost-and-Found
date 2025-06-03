<?= $this->extend('user/base') ?>

<?= $this->section('content') ?>
<section class="container p-5">
    <ol class="breadcrumb p-2 border border-2 border-secondary rounded-0 mb-5">
        <li class="breadcrumb-item">
            <a href="<?= base_url('profile/details') ?>" class="text-decoration-none">Profile</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Change Profile Picture</li>
    </ol>
    
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
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-camera me-2"></i>Change Profile Picture</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('profile/upload-profile-picture') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Select Profile Picture</label>
                            <input class="form-control" type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary p-2 w-100">
                                            <i class="fas fa-upload me-1"></i> UPLOAD
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?= base_url('profile/details') ?>" class="btn btn-secondary p-2 w-100">
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
    </div>
</section>
<?= $this->endSection() ?>