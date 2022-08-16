<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge" id="totalregister">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                            </span>Notifikasi
                        </h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>
                        <?php if (!empty($get_register_limit)) : ?>
                            <?php foreach ($get_register_limit as $regis) : ?>
                                <!-- item-->
                                <a href="<?= base_url('register') ?>" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">Register akun baru.
                                        <span class="text-muted"><?= $regis->email ?></span>
                                        <small class="text-muted"><?= $regis->created_at ?></small>
                                    </p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <!-- All-->
                    <a href="<?= base_url('register') ?>" class="dropdown-item text-center text-primary notify-item notify-all">
                        Lihat semua
                        <i class="fe-arrow-right"></i>
                    </a>

                </div>
            </li>


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?= base_url('assets/backend/') ?>/images/users/user-2.jpg" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        <?= $session->first_name ?> <?= $session->last_name ?> <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="<?= base_url('user') ?>" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">

            <a href="<?= base_url() ?>" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="<?= base_url('assets') ?>/images/logo_luwu.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url('assets/frontend/') ?>/images/logo-tekno.png" alt="" height="35">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->