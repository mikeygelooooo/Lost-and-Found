<?= $this->extend('layouts/admin-base') ?>

<?= $this->section('content') ?>
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
                    <h3>152</h3>
                    <p>Lost Items</p>
                </div>
                <div class="icon"><i class="fas fa-search"></i></div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div>
                <a href="#" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Add Lost Item</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>98</h3>
                    <p>Found Items</p>
                </div>
                <div class="icon"><i class="fas fa-box"></i></div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div>
                <a href="#" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Add Found Item</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>34</h3>
                    <p>Pending Claims</p>
                </div>
                <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div>
                <a href="#" class="btn btn-warning btn-block"><i class="fas fa-search"></i> Match Items</a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info text-dark">
                <div class="inner">
                    <h3>76</h3>
                    <p>Resolved Cases</p>
                </div>
                <div class="icon"><i class="fas fa-check-circle"></i></div>
                <a href="#" class="small-box-footer">
                    <span class="text-dark">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </span>
                </a>
            </div>
            <div>
                <a href="#" class="btn btn-info btn-block"><i class="fas fa-chart-bar"></i> View Reports</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <hr class="border border-1 border-dark">
</div>


<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Recent Item Reports</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
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
                                            <th scope="col" class="py-2">Date Lost/Found</th>
                                            <th scope="col" class="py-2">Location</th>
                                            <th scope="col" class="text-center pe-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top text-center py-4">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lost" role="tabpanel" aria-labelledby="lost-tab">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="bg-light text-nowrap align-middle">
                                            <th scope="col" class="ps-3 py-2">#</th>
                                            <th scope="col" class="py-2">Item</th>
                                            <th scope="col" class="py-2">Category</th>
                                            <th scope="col" class="py-2">Date Lost</th>
                                            <th scope="col" class="py-2">Location</th>
                                            <th scope="col" class="text-center pe-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top text-center py-2">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-list-ul me-1"></i>View Lost Reports
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="found" role="tabpanel" aria-labelledby="found-tab">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="bg-light text-nowrap align-middle">
                                            <th scope="col" class="ps-3 py-2">#</th>
                                            <th scope="col" class="py-2">Item</th>
                                            <th scope="col" class="py-2">Category</th>
                                            <th scope="col" class="py-2">Date Found</th>
                                            <th scope="col" class="py-2">Location</th>
                                            <th scope="col" class="text-center pe-3 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer border-top text-center py-2">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-list-ul me-1"></i>View Found Reports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>