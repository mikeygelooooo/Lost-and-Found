<form action="<?= base_url('profile/update') ?>" method="post">
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label class="form-label fw-semibold">First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="Enter your first name"
                value="<?= esc($user['first_name']) ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Enter your last name"
                value="<?= esc($user['last_name']) ?>">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email"
            value="<?= esc($user['email']) ?>">
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" placeholder="Enter your phone number"
            value="<?= esc($user['phone_number']) ?>">
    </div>

    <hr class="my-4 border border-1 border-secondary opacity-50">

    <div class="row">
        <div class="col-xl-6">
            <div class="row g-2">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary p-2 w-100">
                        <i class="fas fa-floppy-disk me-1"></i> SAVE
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