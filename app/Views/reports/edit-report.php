<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="container py-5">
    <ol class="breadcrumb p-2 border border-2 border-secondary rounded-0 mb-5">
        <li class="breadcrumb-item">
            <a href="<?= base_url('reports') ?>" class="text-decoration-none">Reports</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Report</li>
        <li class="breadcrumb-item active" aria-current="page">Report #<?= $report['id'] ?? '50' ?></li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header <?= ($report_type == 'lost') ? 'bg-danger' : 'bg-success' ?> text-white">
                    <h3 class="mb-0">Edit <?= esc($report_type); ?> Report</h3>
                </div>
                <div class="card-body">
                    <?= view('forms/report-form', [
                        'form_action' => $form_action,
                        'report_type' => $report_type,
                        'categories'  => $categories,
                        'report'        => $report
                    ]); ?>
                </div>
                <div class="card-footer text-muted">
                    <small>* Required fields</small>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>