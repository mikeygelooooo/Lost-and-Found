<form method="post" action="<?= base_url('authenticate') ?>">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">LOG IN</button>

    <div class="text-center">
        <a href="<?= base_url('signup') ?>" class="text-decoration-none">Don't have an account? <strong>Sign Up</strong></a>
    </div>
</form>