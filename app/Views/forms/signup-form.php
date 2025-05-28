<form method="post" action="<?= base_url('register') ?>">
    <?= csrf_field() ?>

    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
            <input type="text" name="first_name" class="form-control" placeholder="Enter your first name" required
                value="<?= old('first_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
            <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" required
                value="<?= old('last_name') ?>">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required
            value="<?= old('email') ?>">
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
        <input type="text" name="phone_number" class="form-control" placeholder="Enter your phone number" required
            value="<?= old('phone_number') ?>">
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">SIGN UP</button>

    <div class="text-center">
        <a href="<?= base_url('login') ?>" class="text-decoration-none">Already have an account? <strong>Log In</strong></a>
    </div>
</form>