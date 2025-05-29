<div class="row mb-3">
    <div class="col-md-6 mb-3 mb-md-0">
        <label class="form-label fw-semibold">First Name</label>
        <input type="text" name="first_name" class="form-control bg-light" placeholder="Enter your first name" readonly
            value="<?= esc($user['first_name']) ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Last Name</label>
        <input type="text" name="last_name" class="form-control bg-light" placeholder="Enter your last name" readonly
            value="<?= esc($user['last_name']) ?>">
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Email</label>
    <input type="email" name="email" class="form-control bg-light" placeholder="Enter your email" readonly
        value="<?= esc($user['email']) ?>">
</div>

<div class="mb-4">
    <label class="form-label fw-semibold">Phone Number</label>
    <input type="text" name="phone_number" class="form-control bg-light" placeholder="Enter your phone number" readonly
        value="<?= esc($user['phone_number']) ?>">
</div>

<hr class="my-4 border border-1 border-secondary opacity-50">

<div class="row">
    <div class="col-xl-6">
        <div class="row g-2">
            <div class="col-md-6">
                <a href="<?= base_url('profile/update') ?>" class="btn btn-primary p-2 w-100">
                    <i class="fas fa-edit me-1"></i> EDIT PROFILE
                </a>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('logout') ?>" class="btn btn-danger p-2 w-100">
                    <i class="fas fa-sign-out-alt me-1"></i> LOG OUT
                </a>
            </div>
        </div>
    </div>
</div>

