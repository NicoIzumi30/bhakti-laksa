<!-- partial -->
<?php $user = get_user() ?>

<div class="page-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar">
        <div class="navbar-content">

            <div class="logo-mini-wrapper">
                <img src="<?= base_url() ?>/assets/images/logo-mini-light.png" class="logo-mini logo-mini-light"
                    alt="logo">
                <img src="<?= base_url() ?>/assets/images/logo-mini-dark.png" class="logo-mini logo-mini-dark"
                    alt="logo">
            </div>


            <ul class="navbar-nav">
                <li class="theme-switcher-wrapper nav-item">
                    <input type="checkbox" value="" id="theme-switcher">
                    <label for="theme-switcher">
                        <div class="box">
                            <div class="ball"></div>
                            <div class="icons">
                                <i class="feather icon-sun"></i>
                                <i class="feather icon-moon"></i>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="w-30px h-30px ms-1 rounded-circle" src="<?php echo(get_image_profile()) ?>"
                            alt="profile">
                    </a>
                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                            <div class="mb-3">
                                <img class="w-80px h-80px rounded-circle" src="<?php echo(get_image_profile()) ?>"
                                    alt="">
                            </div>
                            <div class="text-center">
                                <p class="fs-16px fw-bolder"><?= $user->name; ?></p>
                                <p class="fs-12px text-secondary"><?= $user->role; ?></p>
                            </div>
                        </div>
                        <ul class="list-unstyled p-1">
                            <li class="dropdown-item py-2">
                                <a href="<?= base_url('profile') ?>" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="dropdown-item py-2">
                                <a href="<?= base_url('logout') ?>" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>

        </div>
    </nav>
    <!-- partial -->