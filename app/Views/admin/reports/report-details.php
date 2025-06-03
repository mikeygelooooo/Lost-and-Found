<?= $this->extend('admin/admin-base') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container">
        <div class="row border border-3 px-2 mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/reports') ?>" class="text-decoration-none text-dark">
                        Reports
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Report #<?= esc($report['id']) ?>
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Report Details</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body container p-4">
            <div class="row mb-3">
                <div class="col-md-5 d-flex justify-content-center align-items-center <?= $report['image'] == '' ? 'd-none' : '' ?>">
                    <img id="itemImage" src="<?= base_url('uploads/reports/' . esc($report['image'])) ?>" alt="Item Image"
                        class="img-fluid my-3 rounded border border-3 border-dark" style="max-height: 200px;">
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
                <div class="col-12 bg-secondary-subtle p-3 rounded">
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
    </div>
</div>
<?= $this->endSection() ?>