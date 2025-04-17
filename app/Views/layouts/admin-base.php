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

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?= $this->include('partials/admin-navbar') ?>

    <?= $this->include('partials/admin-sidebar') ?>

    <main class="content-wrapper">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('partials/admin-footer') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

</body>

</html>