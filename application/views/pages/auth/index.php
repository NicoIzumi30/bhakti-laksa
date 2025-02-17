<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Bhakti Laksa - Website Rekapitulasi Nilai">
    <meta name="author" content="Heru Kristanto">

    <title>Bhakti Laksa - Website Rekapitulasi Nilai</title>

    <!-- color-modes:js  -->
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
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fonts/feather-font/css/iconfont.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/demo1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
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
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                        <div class="card" style="border-radius: 0.7rem;">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper"
                                        style="background-image: url(<?= base_url('assets/images/background/login.jpg') ?>);border-radius: 0.7rem">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="nobleui-logo d-block mb-2">Bhakti <span>Laksa</span></a>
                                        <h5 class="text-secondary fw-normal mb-4">Welcome back! Log in to your account.
                                        </h5>
                                        <form class="forms-sample" action="<?= base_url('login') ?>" method="post">
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">Email </label>
                                                <input type="email" class="form-control" name="email" id="userEmail"
                                                    placeholder="Email">
                                                <?php echo form_error('email', '<small class="email">', '</small>'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="userPassword" autocomplete="current-password"
                                                    placeholder="Password">
                                                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/vendors/jquery/jquery.min.js"></script>

    <!-- core:js -->
    <script src="<?= base_url() ?>/assets/vendors/core/core.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="<?= base_url() ?>/assets/vendors/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <!-- endinject -->

    <?php if ($this->session->flashdata('error')) {
        echo error_notification($this->session->flashdata('error'));
    } ?>
    <?php if ($this->session->flashdata('success')) {
        echo success_notification($this->session->flashdata('success'));
    } ?>
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

</body>

</html>