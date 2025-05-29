<div class="card-body">
    <!-- Profile Picture -->
    <img src="/path/to/default-profile.png" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Profile Picture">

    <div class="row g-2">
        <div class="col-12 d-flex justify-content-center">
            <a href="<?= base_url('user/change-picture') ?>" class="btn btn-outline-primary btn-sm p-2" style="border-width: 2px;">
                <small><i class="fas fa-camera me-1"></i> CHANGE PHOTO</small>
            </a>
        </div>
    </div>
</div>

<div class="list-group list-group-flush text-start">
    <a href="<?= base_url('profile/details') ?>" class="list-group-item list-group-item-action">
        <i class="fas fa-user me-2"></i>PROFILE DETAILS
    </a>
    <a href="<?= base_url('user/activity') ?>" class="list-group-item list-group-item-action">
        <i class="fas fa-cog me-2"></i>ACCOUNT SETTINGS
    </a>
</div>