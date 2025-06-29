<?= $this->extend('user/base') ?>

<?= $this->section('content') ?>
<div class="container p-4">
    <ol class="breadcrumb p-2 border border-2 border-secondary rounded-0 mb-5">
        <li class="breadcrumb-item">
            <a href="<?= base_url('reports') ?>" class="text-decoration-none">Reports</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Report #<?= $report['id'] ?? '50' ?></li>
    </ol>

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

    <div class="card">
        <!-- Card Header -->
        <div class="card-header p-3">
            <h5 class="mb-0">Report Details</h5>
        </div>

        <div class="card-body container p-4">
            <div class="row mb-3">
                <div class="col-md-5 d-flex justify-content-center align-items-center <?= $report['image'] == '' ? 'd-none' : '' ?>">
                    <img id="itemImage" src="<?= base_url('uploads/reports/' . esc($report['image'])) ?>" alt="Item Image"
                        class="img-fluid my-3 rounded border border-3 border-primary" style="max-height: 200px;">
                </div>

                <div class="<?= $report['image'] != '' ? 'col-md-7' : 'col-md-12' ?>">
                    <h4 id="itemName" class="mb-3"><?= esc($report['item_name']) ?></h4>

                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Category</small>
                            <p id="itemCategory" class="mb-0"><?= esc($report['category']) ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Report Type</small>
                            <p class="mb-0">
                                <span class="badge <?= $report['report_type'] == 'lost' ? 'bg-danger' : 'bg-success' ?> fs-6">
                                    <i class="fas <?= $report['report_type'] == 'lost' ? 'fa-search-minus' : 'fa-hand-holding' ?>"></i>
                                    <?= ucfirst($report['report_type']) ?>
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Description</small>
                            <p id="itemDescription" class="mb-0"><?= esc($report['description']) ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Report Status</small>
                            <p class="mb-0">
                                <span class="badge <?= $report['status'] == 'resolved' ? 'bg-info' : 'bg-warning' ?> fs-6">
                                    <i class="fas <?= $report['status'] == 'resolved' ? 'fa-check-circle' : 'fa-hourglass-half' ?>"></i>
                                    <?= ucfirst($report['status']) ?>
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-6">
                            <small class="text-muted">Location</small>
                            <p id="itemLocation" class="mb-0"><?= esc($report['location']) ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Date Lost/Found</small>
                            <p id="itemDate" class="mb-0"><?= esc($report['date_of_event']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reporter Information Highlight (no card) -->
            <div class="row mb-3">
                <div class="col-12 bg-light p-3 rounded">
                    <h6 class="mb-3">Reporter Information</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <small class="text-muted">Reported By</small>
                            <p id="reportedBy" class="mb-0"><?= esc($report['reported_by_name']) ?></p>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted">Email</small>
                            <p id="contactEmail" class="mb-0">
                                <a href="mailto:<?= esc($report['reported_by_email']) ?>" class="text-decoration-none"><?= esc($report['reported_by_email']) ?></a>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted">Phone</small>
                            <p id="contactPhone" class="mb-0"><?= esc($report['reported_by_phone']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <small class="text-muted">Report Submitted</small>
                    <p id="createdAt" class="mb-0"><?= esc($report['created_at']) ?></p>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">Last Updated</small>
                    <p id="updatedAt" class="mb-0"><?= esc($report['updated_at']) ?></p>
                </div>
            </div>
        </div>

        <!-- Card Footer (Actions) -->
        <?php if (session()->get('user_id') == $report['reported_by']) : ?>
            <div class="card-footer p-3">
                <div class="d-flex justify-content-end flex-wrap gap-2">
                    <a href="<?= base_url('reports/update/' . $report['id']) ?>" class="btn btn-primary">
                        Edit Report
                    </a>
                    <form action="<?= base_url('reports/update/status/' . $report['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="status" value="<?= $report['status'] == 'pending' ? 'resolved' : 'pending' ?>">
                        <button type="submit" class="btn <?= $report['status'] == 'pending' ? 'btn-info' : 'btn-warning' ?>">
                            Mark as <?= $report['status'] == 'pending' ? 'Resolved' : 'Pending' ?>
                        </button>
                    </form>
                    <form action="<?= base_url('reports/delete/' . $report['id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this report?');">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger">Delete Report</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>