<?= $this->extend('user/base') ?>

<?= $this->section('content') ?>
<section class="container p-5">
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

    <div class="row justify-content-center g-4">
        <div class="col-lg-3">
            <div class="card shadow border-0 text-center">
                <?= $this->include('user/partials/profile-sidebar') ?>
            </div>
        </div>

        <!-- Right Section: Profile Details Form -->
        <div class="col-lg-9">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-clock me-2"></i>Item Report History</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="table-responsive" style="min-height: 350px; max-height: 520px; overflow-y: auto;">
                        <ul class="list-group flex-nowrap" style="min-width: 600px;">
                            <?php if (!empty($reports)): ?>
                                <?php foreach ($reports as $report): ?>
                                    <a href="<?= base_url('reports/details/' . $report['id']) ?>"
                                        class="list-group-item list-group-item-action border border-primary border-2 shadow-sm mb-2 text-decoration-none d-flex align-items-center justify-content-between">

                                        <!-- Left side: Image + Text -->
                                        <div class="d-flex align-items-center">
                                            <!-- Image -->
                                            <?php if ($report['image'] != ''): ?>
                                                <img src="<?= base_url('uploads/reports/' . esc($report['image'])) ?>"
                                                    alt="<?= esc($report['item_name']) ?>"
                                                    class="rounded me-3"
                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                            <?php else: ?>
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                                                    style="width: 80px; height: 80px;">
                                                    <i class="fas fa-image text-muted fa-2x"></i>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Text Details -->
                                            <div>
                                                <h6 class="mb-1 fw-bold"><?= esc($report['item_name']) ?></h6>
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-tag me-1"></i><?= esc($report['category']) ?>
                                                </small>
                                                <small class="text-muted d-block">
                                                    <i class="far fa-calendar-alt me-1"></i><?= esc($report['date_of_event']) ?> &nbsp;|&nbsp;
                                                    <i class="fas fa-map-marker-alt me-1"></i><?= esc($report['location']) ?>
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Right side: Badges -->
                                        <div class="text-end ms-3">
                                            <span class="badge <?= $report['report_type'] == 'lost' ? 'bg-danger' : 'bg-success' ?> mb-1">
                                                <i class="fas <?= $report['report_type'] == 'lost' ? 'fa-search-minus' : 'fa-hand-holding' ?>"></i>
                                                <?= ucfirst($report['report_type']) ?>
                                            </span><br>
                                            <span class="badge <?= $report['status'] == 'resolved' ? 'bg-info' : 'bg-warning' ?>">
                                                <i class="fas <?= $report['status'] == 'resolved' ? 'fa-check-circle' : 'fa-hourglass-half' ?>"></i>
                                                <?= ucfirst($report['status']) ?>
                                            </span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item text-center text-muted py-5 h-100 d-flex flex-column justify-content-center align-items-center border-3 bg-light" style="min-height: 350px;">
                                    <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                                    No reports found.
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>