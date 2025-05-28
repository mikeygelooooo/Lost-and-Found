<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="container py-5">
    <ol class="breadcrumb p-2 border border-2 border-secondary rounded-0 mb-5">
        <li class="breadcrumb-item">
            <a href="<?= base_url('reports') ?>" class="text-decoration-none">Reports</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Report <?= esc(ucfirst($report_type)); ?> Item</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header <?= ($report_type == 'lost') ? 'bg-danger' : 'bg-success' ?> text-white">
                    <h3 class="mb-0">Report a <?= esc(ucfirst($report_type)); ?> Item</h3>
                </div>
                <div class="card-body">
                    <?= view('forms/report-form', [
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
</section>

<?= $this->endSection() ?>