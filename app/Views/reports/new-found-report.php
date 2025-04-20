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
                    <form id="foundItemForm">
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Item Name*</label>
                            <input type="text" class="form-control" id="itemName" placeholder="Enter item name" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category*</label>
                            <select class="form-select" id="category" required>
                                <option value="" selected disabled>Select a category</option>
                                <option value="1">Personal Belongings</option>
                                <option value="2">Electronics</option>
                                <option value="3">Identification & Documents</option>
                                <option value="4">Accessories & Jewelry</option>
                                <option value="5">School & Office Supplies</option>
                                <option value="6">Transportation Items</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dateOfEvent" class="form-label">Date Found*</label>
                                <input type="date" class="form-control" id="dateOfEvent" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location Found*</label>
                                <input type="text" class="form-control" id="location" placeholder="Where did you find it?" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Provide details about the item (color, brand, distinguishing features, etc.)"></textarea>
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