<div class="card-body p-4">
    <!-- Profile Picture -->
    <div class="mx-auto ratio ratio-1x1 mb-3" style="max-width: 200px;">
        <img src="<?= base_url(
                        empty($user['profile_picture'])
                            ? 'uploads/profile_pictures/blank.jpg'
                            : 'uploads/profile_pictures/' . esc($user['profile_picture'])
                    ) ?>"
            class="w-100 h-100 rounded-circle border border-primary border-4"
            style="object-fit: cover;"
            alt="Profile Picture">
    </div>

    <div class="row g-2">
        <div class="col-12 d-flex justify-content-center">
            <a href="<?= base_url('profile/change-profile-picture') ?>" class="btn btn-outline-primary btn-sm p-2" style="border-width: 2px;">
                <small><i class="fas fa-camera me-1"></i> CHANGE PHOTO</small>
            </a>
        </div>
    </div>
</div>

<div class="list-group list-group-flush text-start">
    <a href="<?= base_url('profile/details') ?>"
        class="list-group-item list-group-item-action border-top <?= in_array(uri_string(), ['profile/details', 'profile/edit']) ? 'active' : '' ?>">
        <i class="fas fa-user me-2"></i>PROFILE DETAILS
    </a>

    <a href="<?= base_url('profile/account-settings') ?>" class="list-group-item list-group-item-action <?= uri_string() === 'profile/account-settings' ? 'active' : '' ?>">
        <i class="fas fa-cog me-2"></i>ACCOUNT SETTINGS
    </a>
</div>