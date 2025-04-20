<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="container py-5">
    <ol class="breadcrumb p-2 border border-2 border-secondary rounded-0 mb-5">
        <li class="breadcrumb-item">
            <a href="<?= base_url('reports') ?>" class="text-decoration-none">Reports</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Report Found Item</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Report a Found Item</h3>
                </div>
                <div class="card-body">
                    <form id="foundItemForm" method="post" action="<?= base_url('reports/create') ?>">
                        <input type="hidden" name="report-type" value="found">

                        <div class="mb-3">
                            <label for="itemName" class="form-label">Item Name*</label>
                            <input type="text" class="form-control" name="item-name" placeholder="Enter item name" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category*</label>
                            <select class="form-select" name="category-id" required>
                                <option value="" selected disabled>Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id']; ?>"><?= esc($category['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date-of-event" class="form-label">Date Lost*</label>
                                <input type="date" class="form-control" name="date-of-event" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location*</label>
                                <input type="text" class="form-control" name="location" placeholder="Where was it lost?" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Provide details about the item (color, brand, distinguishing features, etc.)"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="itemImage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="itemImage" accept="image/*">
                            <div class="form-text">Optional: Upload a photo of the item to help with identification</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Submit Report</button>
                            <button type="reset" class="btn btn-outline-secondary">Clear Form</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <small>* Required fields</small>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>