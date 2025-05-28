<form method="post" action="<?= esc($form_action); ?>">
    <?= csrf_field() ?>

    <input type="hidden" name="report-type" value="<?= esc($report_type); ?>">

    <div class="mb-3">
        <label for="itemName" class="form-label">Item Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="item-name" placeholder="Enter item name" value="<?= esc($report['item_name'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
        <select class="form-select" name="category" required>
            <option value="" disabled <?= !isset($report['category']) ? 'selected' : '' ?>>Select a category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= esc($category); ?>"
                    <?= (isset($report['category']) && $report['category'] == $category) ? 'selected' : '' ?>>
                    <?= esc($category); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="date-of-event" class="form-label">Date of Event<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="date-of-event" value="<?= esc($report['date_of_event'] ?? '') ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="location" placeholder="Where did the event take place?" value="<?= esc($report['location'] ?? '') ?>" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"><?= esc($report['description'] ?? '') ?></textarea>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn <?= ($report_type == 'lost') ? 'btn-danger' : 'btn-success' ?>">
            <?php if (empty($report)) : ?>
                Submit Report
            <?php else : ?>
                Confirm Edit
            <?php endif; ?>
        </button>
        <button type="reset" class="btn btn-outline-secondary">Clear Form</button>
    </div>
</form>