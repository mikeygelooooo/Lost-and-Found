<?= $this->extend('admin/admin-base') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container">
        <div class="row border border-3 px-2 mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/reports') ?>" class="text-decoration-none text-dark">
                        Reports
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Report Lost Item
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
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
</div>

<div class="container-fluid row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header <?= ($report_type == 'lost') ? 'bg-danger' : 'bg-success' ?> text-white">
                <h3 class="mb-0">Report a <?= esc(ucfirst($report_type)); ?> Item</h3>
            </div>
            <div class="card-body">
                <?= view('user/forms/report-form', [
                    'form_action' => $form_action,
                    'report_type' => $report_type,
                    'categories'  => $categories
                ]); ?>
            </div>
            <div class="card-footer text-muted">
                <small><span class="text-danger">*</span> Required fields</small>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>