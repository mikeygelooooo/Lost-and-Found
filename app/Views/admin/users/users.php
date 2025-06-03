<?= $this->extend('admin/admin-base') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">User Management</h1>
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
                <a href="" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> New User
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="reportsTable" class="table table-responsive table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="no-wrap">ID</th>
                        <th class="no-wrap w-25">First Name</th>
                        <th class="no-wrap w-25">Last Name</th>
                        <th class="no-wrap w-25">Email</th>
                        <th class="no-wrap w-25">Phone Number</th>
                        <th class="no-wrap">Role</th>
                        <th class="no-wrap"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="text-nowrap"><?= esc($user['id']) ?></td>
                            <td class="text-nowrap"><?= esc($user['first_name']) ?></td>
                            <td class="text-nowrap"><?= esc($user['last_name']) ?></td>
                            <td class="text-nowrap"><?= esc($user['email']) ?></td>
                            <td class="text-nowrap"><?= esc($user['phone_number']) ?></td>
                            <td class="text-nowrap">
                                <span class="badge text-dark badge-<?= $user['role'] === 'admin' ? 'info' : 'warning' ?>">
                                    <?= ucfirst(esc($user['role'])) ?>
                                </span>
                            </td>
                            <td class="text-nowrap">
                                <a href="<?= base_url('admin/users/details/' . $user['id']) ?>" class="btn btn-outline-dark btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('admin/users/update/' . $user['id']) ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="<?= base_url('admin/users/delete/' . $user['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
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