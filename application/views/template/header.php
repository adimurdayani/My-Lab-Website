<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admninistrator | <?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <?php if (!empty($get_config)) : ?>
        <link rel="shortcut icon" href="<?= base_url('assets/backend/images/upload/') . $get_config->icon_web ?>">
    <?php endif; ?>
    <!-- Sweet Alert-->
    <link href="<?= base_url('assets/backend/') ?>libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css -->
    <link href="<?= base_url('assets/backend/') ?>libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/backend/') ?>libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="<?= base_url('assets/backend/') ?>libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/backend/') ?>libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/backend/') ?>libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Summernote css -->
    <link href="<?= base_url('assets/backend/') ?>libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
    <!-- Lightbox css -->
    <link href="<?= base_url('assets/backend/') ?>libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url('assets/backend/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url('assets/backend/') ?>css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= base_url('assets/backend/') ?>css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="<?= base_url('assets/backend/') ?>css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="<?= base_url('assets/backend/') ?>css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .a-widget-card {
            padding: 5%;
            border: 1px solid #eaeaea;
            background: none;
            border-radius: 5px
        }

        .a-widget-card h2 {
            color: #000
        }

        .a-widget-card p {
            color: #000
        }

        .a-widget-info {
            color: #000;
            text-align: center
        }

        .a-widget-card span {
            font-weight: bold
        }

        .a-widget-card .data {
            font-size: 20px
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">