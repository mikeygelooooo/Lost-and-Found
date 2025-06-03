<?= $this->extend('admin/admin-base') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Reports Management</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <table id="reportsTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $r): ?>
                        <tr>
                            <td><?= esc($r['id']) ?></td>
                            <td>
                                <span class="badge badge-<?= $r['report_type'] === 'found' ? 'success' : 'danger' ?>">
                                    <?= ucfirst(esc($r['report_type'])) ?>
                                </span>
                            </td>
                            <td><?= esc($r['item_name']) ?></td>
                            <td><?= esc($r['category']) ?></td>
                            <td><?= esc($r['date_of_event']) ?></td>
                            <td><?= esc($r['location']) ?></td>
                            <td>
                                <span class="badge text-dark badge-<?= $r['status'] === 'resolved' ? 'info' : 'warning' ?>">
                                    <?= ucfirst(esc($r['status'])) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/reports/details/' . $r['id']) ?>" class="btn btn-outline-dark btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#reportsTable').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
<?= $this->endSection() ?>