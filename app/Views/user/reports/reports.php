<?= $this->extend('user/base') ?>

<?= $this->section('content') ?>
<section class="py-5 bg-body-tertiary">
    <div class="container">
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

        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold">Browse Item Reports</h1>
            <p class="lead text-secondary">Browse all lost and found items reported in our system</p>
        </div>

        <!-- Filter Card -->
        <div class="card shadow-sm">
            <div class="card-body p-3 p-md-4">
                <form class="row g-3">
                    <div class="col-md-3">
                        <label for="typeFilter" class="form-label small text-muted">Report Type</label>
                        <select class="form-select shadow-sm" id="typeFilter">
                            <option selected value="">All Reports</option>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="categoryFilter" class="form-label small text-muted">Category</label>
                        <select class="form-select shadow-sm" id="categoryFilter">
                            <option selected disabled>All Categories</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= esc($category); ?>">
                                    <?= esc($category); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="sortFilter" class="form-label small text-muted">Sort by</label>
                        <select class="form-select shadow-sm" id="sortFilter">
                            <option selected value="">Newest First</option>
                            <option>Oldest First</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="searchInput" class="form-label small text-muted">Search</label>
                        <div class="input-group shadow-sm">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search items...">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 text-end mt-3">
                        <button type="reset" class="btn btn-outline-dark btn-sm me-2">
                            <i class="fas fa-redo-alt me-1"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-filter me-1"></i>Apply Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <a href="<?= base_url('reports/create/lost') ?>" class="card h-100 shadow-sm border-danger border-opacity-25 text-decoration-none">
                    <div class="card-body text-center py-4">
                        <div class="text-danger mb-3">
                            <i class="fas fa-search-minus fa-3x"></i>
                        </div>
                        <h4 class="card-title mb-0 fw-bold text-danger">Report Lost Item</h4>
                        <p class="card-text text-muted mt-2">Submit a report for your missing item</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url('reports/create/found') ?>" class="card h-100 shadow-sm border-success border-opacity-25 text-decoration-none">
                    <div class="card-body text-center py-4">
                        <div class="text-success mb-3">
                            <i class="fas fa-hand-holding fa-3x"></i>
                        </div>
                        <h4 class="card-title mb-0 fw-bold text-success">Report Found Item</h4>
                        <p class="card-text text-muted mt-2">Submit a report for an item you found</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-body-tertiary">
    <div class="container">
        <!-- Item Cards -->
        <div class="row g-4">
            <?php if (!empty($reports)): ?>
                <?php foreach ($reports as $index => $report): ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card h-100 shadow-sm hover-shadow" style="transition: all 0.2s ease-in-out;">
                            <div class="position-relative">
                                <?php if ($report['image'] != ''): ?>
                                    <img src="<?= base_url('uploads/reports/' . esc($report['image'])) ?>" class="card-img-top" alt="<?= esc($report['item_name']) ?>" style="height: 180px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                        <i class="fas fa-image text-muted fa-3x"></i>
                                    </div>
                                <?php endif; ?>

                                <?php if ($report['report_type'] == "lost"): ?>
                                    <span class="position-absolute top-0 end-0 badge bg-danger m-2 px-3 py-2 rounded-pill">
                                        <i class="fas fa-search-minus me-1"></i> Lost
                                    </span>
                                <?php else: ?>
                                    <span class="position-absolute top-0 end-0 badge bg-success m-2 px-3 py-2 rounded-pill">
                                        <i class="fas fa-hand-holding me-1"></i> Found
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= esc($report['item_name']) ?></h5>
                                <p class="card-text mb-1">
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-tag me-1"></i> <?= esc($report['category']) ?>
                                    </span>
                                </p>
                                <p class="card-text mb-1 small text-muted">
                                    <i class="far fa-calendar-alt me-1"></i> <?= esc($report['date_of_event']) ?>
                                </p>
                                <p class="card-text small text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i> <?= esc($report['location']) ?>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-center">
                                <a href="<?= base_url('reports/details/' . $report['id']) ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center p-5">
                        <i class="fas fa-info-circle fa-2x mb-3"></i>
                        <h5>No Reports Available</h5>
                        <p class="mb-0">There are currently no items reported in the system.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>