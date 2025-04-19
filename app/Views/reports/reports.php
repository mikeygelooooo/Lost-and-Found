<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="bg-body-tertiary py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">Browse Item Reports</h1>
            <p class="lead">Browse all lost and found items reported in our system</p>
        </div>

        <div class="row mb-4">
            <div class="col-12 bg-white p-4 rounded shadow">
                <form class="row g-3">
                    <div class="col-md-3">
                        <select class="form-select" id="typeFilter">
                            <option selected value="">All Types</option>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="categoryFilter">
                            <option selected value="">All Categories</option>
                            <option>Accessories & Jewelry</option>
                            <option>Personal Belongings</option>
                            <option>School & Office Supplies</option>
                            <option>Transportation Items</option>
                            <option>Electronics</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="locationFilter">
                            <option selected value="">All Locations</option>
                            <option>Cafeteria</option>
                            <option>Lecture Hall</option>
                            <option>Bus Stop</option>
                            <option>Gym</option>
                            <option>Parking Lot</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search items...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <?php if (!empty($reports)): ?>
            <div class="row g-4">
                <?php foreach ($reports as $index => $report): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            <?php if ($report['report_type'] == "Lost"): ?>
                                <div class="card-header bg-danger text-white">
                                    Lost Item
                                </div>
                            <?php else: ?>
                                <div class="card-header bg-success text-white">
                                    Found Item
                                </div>
                            <?php endif; ?>
                            <?php if ($report['image'] != ''): ?>
                                <img src="/api/placeholder/400/300" class="card-img-top p-2" alt="Gold Bracelet">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($report['item_name']) ?></h5>
                                <p class="card-text mb-1"><strong>Category:</strong> <?= esc($report['category_name']) ?></p>
                                <p class="card-text mb-1 text-primary"><strong>Date:</strong> <?= esc($report['date_of_event']) ?></p>
                                <p class="card-text text-primary"><strong>Location:</strong> <?= esc($report['location']) ?></p>
                            </div>
                            <div class="card-footer text-center bg-white border-top-0">
                                <a href="<?= base_url('reports/details/' . $report['id']) ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center text-primary mt-4">No reports available.</div>
        <?php endif; ?>

        <div class="mt-5">
            <div class="d-flex justify-content-center">
                <div class="btn-group">
                    <button class="btn btn-primary">Previous</button>
                    <button class="btn btn-outline-primary active">1</button>
                    <button class="btn btn-outline-primary">2</button>
                    <button class="btn btn-outline-primary">3</button>
                    <button class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>