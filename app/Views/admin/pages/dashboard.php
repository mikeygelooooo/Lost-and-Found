<?= $this->extend('admin/admin-base') ?>

<?= $this->section('content') ?>
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

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row g-2">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= esc($lost_count); ?></h3>
                    <p>Lost Reports</p>
                </div>
                <div class="icon"><i class="fas fa-search"></i></div>
                <a href="<?= base_url('admin/reports') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div>
                <a href="<?= base_url('admin/reports/create/lost') ?>" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Add Lost Item</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= esc($found_count); ?></h3>
                    <p>Found Reports</p>
                </div>
                <div class="icon"><i class="fas fa-box"></i></div>
                <a href="<?= base_url('admin/reports') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div>
                <a href="<?= base_url('admin/reports/create/found') ?>" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Add Found Item</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= esc($pending_count); ?></h3>
                    <p>Pending Reports</p>
                </div>
                <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                <a href="<?= base_url('admin/reports') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div>
                <a href="<?= base_url('admin/reports') ?>" class="btn btn-warning btn-block"><i class="fas fa-search"></i> View Reports</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info text-dark">
                <div class="inner">
                    <h3><?= esc($total_users); ?></h3>
                    <p>Active Users</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
                <a href="<?= base_url('admin/users') ?>" class="small-box-footer">
                    <span class="text-dark">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </span>
                </a>
            </div>
            <div>
                <a href="<?= base_url('admin/users/create') ?>" class="btn btn-info btn-block">
                    <i class="fas fa-plus"></i> Create New User
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <hr class="border border-1 border-dark">
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Report Analytics</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <!-- Left: Bar Chart -->
        <div class="col-lg-4 mb-4">
            <div class="card card-outline card-success h-100">
                <div class="card-header">
                    <h3 class="card-title m-0">Reports by Type & Category</h3>
                </div>
                <div class="card-body">
                    <canvas id="barChart" height="300" data-type-category-data='<?= esc(json_encode($typeCategoryData), 'attr') ?>'></canvas>
                </div>
            </div>
        </div>

        <!-- Middle: Line Chart -->
        <div class="col-lg-4 mb-4">
            <div class="card card-outline card-primary h-100">
                <div class="card-header">
                    <h3 class="card-title m-0">Monthly Report Trends</h3>
                </div>
                <div class="card-body">
                    <canvas id="lineChart" height="300" data-monthly-reports='<?= esc(json_encode($monthlyReports), 'attr') ?>'></canvas>
                </div>
            </div>
        </div>

        <!-- Right: Donut Chart -->
        <div class="col-lg-4 mb-4">
            <div class="card card-outline card-warning h-100">
                <div class="card-header">
                    <h3 class="card-title m-0">Report Status Overview</h3>
                </div>
                <div class="card-body">
                    <canvas id="donutChart" height="300" data-report-status-data='<?= esc(json_encode($reportStatusData), 'attr') ?>'></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <hr class="border border-1 border-dark">
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Recent Reports</h1>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header bg-white pb-0 border-bottom-0">
                    <ul class="nav nav-underline nav-fill rounded-top p-2" id="itemTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-secondary" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                                <i class="fas fa-list-ul me-2"></i>All Items
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary" id="lost-tab" data-bs-toggle="tab" data-bs-target="#lost" type="button" role="tab" aria-controls="lost" aria-selected="false">
                                <i class="fas fa-circle-question me-2"></i>Lost Items
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary" id="found-tab" data-bs-toggle="tab" data-bs-target="#found" type="button" role="tab" aria-controls="found" aria-selected="false">
                                <i class="fas fa-flag me-2"></i>Found Items
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="itemTabsContent">
                    <!-- All Items Tab -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="bg-light text-nowrap align-middle">
                                            <th scope="col" class="ps-3 py-2">#</th>
                                            <th scope="col" class="py-2">Item</th>
                                            <th scope="col" class="py-2">Report Type</th>
                                            <th scope="col" class="py-2">Category</th>
                                            <th scope="col" class="py-2">Status</th>
                                            <th scope="col" class="py-2">Date Lost/Found</th>
                                            <th scope="col" class="py-2">Location</th>
                                            <th scope="col" class="text-center pe-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($reports)): ?>
                                            <?php foreach ($reports as $report): ?>
                                                <tr class="text-nowrap">
                                                    <td class="ps-3"><?= esc($report['id']) ?></td>
                                                    <td><?= esc($report['item_name']) ?></td>
                                                    <td>
                                                        <span class="badge bg-<?= $report['report_type'] === 'lost' ? 'danger' : 'success' ?>">
                                                            <?= ucfirst($report['report_type']) ?>
                                                        </span>
                                                    </td>
                                                    <td><?= esc($report['category']) ?></td>
                                                    <td>
                                                        <span class="badge text-dark bg-<?= $report['status'] === 'resolved' ? 'info' : 'warning' ?>">
                                                            <?= ucfirst($report['status']) ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-secondary"><?= esc($report['date_of_event']) ?></td>
                                                    <td class="text-secondary"><?= esc($report['location']) ?></td>
                                                    <td class="text-center pe-3">
                                                        <a href="<?= base_url('admin/reports/details/' . $report['id']) ?>" class="btn btn-sm btn-outline-dark rounded px-2">
                                                            <i class="fas fa-eye"></i> Details
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-secondary">No reports available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top text-center py-2">
                            <a href="<?= base_url('admin/reports') ?>" class="btn btn-secondary">
                                <i class="fas fa-list-ul me-1"></i>View All Reports
                            </a>
                        </div>
                    </div>

                    <!-- Lost Items Tab -->
                    <div class="tab-pane fade" id="lost" role="tabpanel" aria-labelledby="lost-tab">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="bg-light text-nowrap align-middle">
                                            <th scope="col" class="ps-3 py-2">#</th>
                                            <th scope="col" class="py-2">Item</th>
                                            <th scope="col" class="py-2">Category</th>
                                            <th scope="col" class="py-2">Status</th>
                                            <th scope="col" class="py-2">Date Lost</th>
                                            <th scope="col" class="py-2">Location</th>
                                            <th scope="col" class="text-center pe-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($lost_reports)): ?>
                                            <?php foreach ($lost_reports as $report): ?>
                                                <tr class="text-nowrap">
                                                    <td class="ps-3"><?= esc($report['id']) ?></td>
                                                    <td><?= esc($report['item_name']) ?></td>
                                                    <td><?= esc($report['category']) ?></td>
                                                    <td>
                                                        <span class="badge text-dark bg-<?= $report['status'] === 'resolved' ? 'info' : 'warning' ?>">
                                                            <?= ucfirst($report['status']) ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-secondary"><?= esc($report['date_of_event']) ?></td>
                                                    <td class="text-secondary"><?= esc($report['location']) ?></td>
                                                    <td class="text-center pe-3">
                                                        <a href="<?= base_url('admin/reports/details/' . $report['id']) ?>" class="btn btn-sm btn-outline-dark rounded px-2">
                                                            <i class="fas fa-eye"></i> Details
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center text-secondary">No reports available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top text-center py-2">
                            <a href="<?= base_url('admin/reports') ?>" class="btn btn-secondary">
                                <i class="fas fa-list-ul me-1"></i>View All Reports
                            </a>
                        </div>
                    </div>

                    <!-- Found Items Tab -->
                    <div class="tab-pane fade" id="found" role="tabpanel" aria-labelledby="found-tab">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="bg-light text-nowrap align-middle">
                                            <th scope="col" class="ps-3 py-2">#</th>
                                            <th scope="col" class="py-2">Item</th>
                                            <th scope="col" class="py-2">Category</th>
                                            <th scope="col" class="py-2">Status</th>
                                            <th scope="col" class="py-2">Date Found</th>
                                            <th scope="col" class="py-2">Location</th>
                                            <th scope="col" class="text-center pe-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($found_reports)): ?>
                                            <?php foreach ($found_reports as $report): ?>
                                                <tr class="text-nowrap">
                                                    <td class="ps-3"><?= esc($report['id']) ?></td>
                                                    <td><?= esc($report['item_name']) ?></td>
                                                    <td><?= esc($report['category']) ?></td>
                                                    <td>
                                                        <span class="badge text-dark bg-<?= $report['status'] === 'resolved' ? 'info' : 'warning' ?>">
                                                            <?= ucfirst($report['status']) ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-secondary"><?= esc($report['date_of_event']) ?></td>
                                                    <td class="text-secondary"><?= esc($report['location']) ?></td>
                                                    <td class="text-center pe-3">
                                                        <a href="<?= base_url('admin/reports/details/' . $report['id']) ?>" class="btn btn-sm btn-outline-dark rounded px-2">
                                                            <i class="fas fa-eye"></i> Details
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center text-secondary">No reports available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top text-center py-2">
                            <a href="<?= base_url('admin/reports') ?>" class="btn btn-secondary">
                                <i class="fas fa-list-ul me-1"></i>View All Reports
                            </a>
                        </div>
                    </div>

                </div> <!-- End tab content -->
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= base_url('assets/js/dashboard-charts.js') ?>"></script>
<?= $this->endSection() ?>