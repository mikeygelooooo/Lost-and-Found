<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FindMyStuff Admin <?= $title ?? '' ?></title>
    <link rel="icon" href="<?= base_url('assets/images/logo.svg') ?>">

    <!-- AdminLTE & Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts & Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Load DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/partials/admin-navbar') ?>

        <?= $this->include('admin/partials/admin-sidebar') ?>

        <main class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </main>

        <?= $this->include('admin/partials/admin-footer') ?>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>