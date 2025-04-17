<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<div class="container p-4">
    <ol class="breadcrumb p-2 border border-2 border-secondary rounded-0 mb-5">
        <li class="breadcrumb-item">
            <a href="#" class="text-decoration-none">Reports</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Report #<?= $report['id'] ?? '50' ?></li>
    </ol>

    <div class="card">
        <!-- Card Header -->
        <div class="card-header p-3">
            <h5 class="mb-0">Report Details</h5>
        </div>
        
        <div class="card-body container p-3">
            <div class="row mb-3">
            <?php if ($report['image'] != '') : ?>
                <div class="col-md-6">
                    <img id="itemImage" src="" alt="Item Image"
                        class="img-fluid" style="max-height: 200px;">
                </div>
                <div class="col-md-6">
            <?php else : ?>
                <div class="col-md-12">
            <?php endif; ?>
                    <h4 id="itemName" class="mb-3"><?= esc($report['item_name']) ?></h4>
                    <div class="row mb-3">
                        <div class="col-6">
                            <small class="text-muted">Category</small>
                            <p id="itemCategory" class="mb-0"><?= esc($report['category_name']) ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Report Type</small>
                            <p class="mb-0"><?= esc($report['report_type']) ?></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Description</small>
                        <p id="itemDescription" class="mb-0"><?= esc($report['description']) ?></p>
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
            
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card bg-light border-0">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3">Reporter Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted">Reported By</small>
                                    <p id="reportedBy" class="mb-0">John Doe</p>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted">Contact Info</small>
                                    <p id="contactInfo" class="mb-0">
                                        <a href="mailto:johndoe@email.com" class="text-decoration-none">johndoe@email.com</a>
                                    </p>
                                </div>
                            </div>
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
        
        <!-- Card Footer -->
        <div class="card-footer p-3">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary me-2">Edit Report</button>
                <button class="btn btn-danger">Delete Report</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>