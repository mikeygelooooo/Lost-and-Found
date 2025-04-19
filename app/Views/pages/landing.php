<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="bg-body-tertiary py-5" id="search">
    <div class="container">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Find What You've Lost</h1>
                <p class="lead mb-4">Our community helps reunite people with their lost belongings every day</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 rounded shadow">
                    <form class="row g-3">
                        <div class="col-md-5">
                            <select class="form-select form-select-lg">
                                <option selected>I'm looking for...</option>
                                <option>Lost Items</option>
                                <option>Found Items</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control form-control-lg" placeholder="Keywords (phone, wallet, keys...)">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5" id="report">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow rounded">
                    <div class="card-body p-4 text-center">
                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-search-minus fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3">I Lost Something</h3>
                        <p class="mb-4">File a report about your lost item and get notified when similar items are found.</p>
                        <a href="#" class="btn btn-danger btn-lg rounded-pill px-4">Report Lost Item</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 border-0 shadow rounded">
                    <div class="card-body p-4 text-center">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-hand-holding fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3">I Found Something</h3>
                        <p class="mb-4">Help reunite lost items with their owners by reporting what you've found.</p>
                        <a href="#" class="btn btn-success btn-lg rounded-pill px-4">Report Found Item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-body-tertiary py-5" id="recent">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="h2 fw-bold">Recently Reported Items</h2>
        </div>

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

        <div class="text-center mt-5">
            <a href="<?= base_url('reports') ?>" class="btn btn-primary btn-lg px-4">View All Items</a>
        </div>
    </div>

</section>

<section class="bg-light py-5" id="how-it-works">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-6 mb-3 fw-bold">How It Works</h2>
                <p class="lead">Simple steps to help you recover lost items or return found ones</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <div class="card-body p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="fas fa-clipboard-list fs-3"></i>
                        </div>
                        <h3 class="h5 mb-3">1. Report Your Item</h3>
                        <p>Provide detailed information about the lost or found item including photos, location, and description.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <div class="card-body p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="fas fa-bell fs-3"></i>
                        </div>
                        <h3 class="h5 mb-3">2. Get Notified</h3>
                        <p>Receive alerts when potential matches are found based on your description and location information.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <div class="card-body p-4">
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                            <i class="fas fa-handshake fs-3"></i>
                        </div>
                        <h3 class="h5 mb-3">3. Connect Safely</h3>
                        <p>Use our secure messaging system to arrange a safe meetup or handover at a public location.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-body-tertiary text-center py-5" id="get-started">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-6 mb-3 fw-bold">Join Our Community Today</h2>
                <p class="lead mb-4">Help us create a world where lost items find their way back home</p>
                <button class="btn btn-primary btn-lg px-5 py-3 fw-bold">Get Started - It's Free!</button>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>