<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Bhakti Laksa - Website Rekapitulasi Nilai">
    <meta name="author" content="Heru Kristanto">

    <title>Bhakti Laksa - Website Rekapitulasi Nilai</title>

    <!-- color-modes:js -->
    <script src="<?= base_url() ?>/assets/js/color-modes.js"></script>
    <!-- endinject -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/dropify/dist/dropify.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fonts/feather-font/css/iconfont.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/demo1/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/demo1/app.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.png" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

    <script>
        function toast(status, message, speed = 300) {
            let title = 'Success'
            if (status == 'error') {
                title = 'Failed'
            }
            new Notify({
                status: status,
                title: title,
                text: message,
                effect: 'fade',
                speed: speed,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 1000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'right top',
                customWrapper: '',
            })
        }
    </script>
</head>

<body>
    <div class="main-wrapper">
    <?php if ($this->session->flashdata('error')) {
        echo error_notification($this->session->flashdata('error'));
    } ?>
    <?php if ($this->session->flashdata('success')) {
        echo success_notification($this->session->flashdata('success'));
    } ?>
