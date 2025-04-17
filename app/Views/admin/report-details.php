<?= $this->extend('layouts/admin-base') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container">
        <div class="row border border-3 px-2 mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none text-dark">
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <?php if ($report['report_type'] == 'Lost') : ?>
                        <a href="<?= base_url('admin/reports/lost-items') ?>" class="text-decoration-none text-dark">
                            Lost Items
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url('admin/reports/found-items') ?>" class="text-decoration-none text-dark">
                            Found Items
                        </a>
                    <?php endif; ?>
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
    <div class="card container p-4">
        <div class="row mb-3">
            <!-- Image Column -->
            <?php if ($report['image'] != '') : ?>
                <div class="col-md-6">
                    <img id="itemImage" src="" alt="Item Image"
                        class="img-fluid" style="max-height: 200px;">
                </div>

                <div class="col-md-6">
                <?php else : ?>
                    <div class="col-md-12">
                    <?php endif; ?>
                    <!-- Details Column -->
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

                <!-- Reporter Information -->
                <div class="row card bg-light border-0 mb-3">
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

                <!-- Timestamps -->
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
    </div>
</div>
<?= $this->endSection() ?>