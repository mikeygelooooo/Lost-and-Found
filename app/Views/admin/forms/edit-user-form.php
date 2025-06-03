<form method="post" action="<?= base_url('admin/users/update/' . $user['id']) ?>">
    <?= csrf_field() ?>

    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
            <input type="text" name="first_name" class="form-control" placeholder="Enter your first name" required
                value="<?= esc($user['first_name']) ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
            <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" required
                value="<?= esc($user['last_name']) ?>">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required
            value="<?= esc($user['email']) ?>">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
        <input type="text" name="phone_number" class="form-control" placeholder="Enter your phone number" required
            value="<?= esc($user['phone_number']) ?>">
    </div>

    <hr class="my-4 border border-1 border-secondary opacity-50">

    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <button type="submit" class="btn btn-dark w-100">CONFIRM EDIT</button>
        </div>
    </div>
    
</form>