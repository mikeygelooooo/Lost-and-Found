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
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="<?= site_url('admin/reports/create/lost') ?>" class="btn btn-danger btn-sm">
                    <i class="fas fa-plus"></i> New Lost Report
                </a>
                <a href="<?= site_url('admin/reports/create/found') ?>" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> New Found Report
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="reportsTable" class="table table-responsive table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap">Type</th>
                        <th class="text-nowrap w-50">Item</th>
                        <th class="text-nowrap">Category</th>
                        <th class="text-nowrap">Date</th>
                        <th class="text-nowrap w-50">Location</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $r): ?>
                        <tr>
                            <td class="text-nowrap"><?= esc($r['id']) ?></td>
                            <td class="text-nowrap">
                                <span class="badge badge-<?= $r['report_type'] === 'found' ? 'success' : 'danger' ?>">
                                    <?= ucfirst(esc($r['report_type'])) ?>
                                </span>
                            </td>
                            <td class="text-nowrap"><?= esc($r['item_name']) ?></td>
                            <td class="text-nowrap"><?= esc($r['category']) ?></td>
                            <td class="text-nowrap"><?= esc($r['date_of_event']) ?></td>
                            <td class="text-nowrap"><?= esc($r['location']) ?></td>
                            <td class="text-nowrap">
                                <span class="badge text-dark badge-<?= $r['status'] === 'resolved' ? 'info' : 'warning' ?>">
                                    <?= ucfirst(esc($r['status'])) ?>
                                </span>
                            </td>
                            <td class="text-nowrap">
                                <a href="<?= site_url('admin/reports/details/' . $r['id']) ?>" class="btn btn-outline-dark btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('admin/reports/update/' . $r['id']) ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="<?= base_url('admin/reports/delete/' . $r['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
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