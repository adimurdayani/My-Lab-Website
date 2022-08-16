<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigasi</li>

                <li>
                    <a href="<?= base_url('dashboard') ?>">
                        <i class="fe-grid"></i>
                        <span> Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Modul Data</li>

                <li>
                    <a href="<?= base_url('mahasiswa') ?>">
                        <i class="fe-database"></i>
                        <span> Mahasiswa </span>
                    </a>
                </li>

                <li>
                    <a href="#pendaftaran" data-toggle="collapse">
                        <i class="fe-edit"></i>
                        <span> Pendaftaran </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="pendaftaran">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('pendaftaran') ?>">
                                    Hardware
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('pendaftaran/pendaftaran_soft') ?>">
                                    Software
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('pendaftaran/kategori') ?>">Kategori Praktikum</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#nilai" data-toggle="collapse">
                        <i class="fe-list"></i>
                        <span> Nilai Praktikum </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="nilai">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('nilai/nilai_hard') ?>">
                                    Hardware
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('nilai/nilai_soft') ?>">
                                    Software
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#register" data-toggle="collapse">
                        <i class="fe-log-in"></i>
                        <span> Register </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="register">
                        <ul class="nav-second-level">

                            <li>
                                <a href="<?= base_url('register') ?>">List Register</a>
                            </li>

                            <li>
                                <a href="<?= base_url('register/kategori') ?>">Kategori Register</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?= base_url('kelompok') ?>">
                        <i class="fe-user-plus"></i>
                        <span> Kelompok</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('jadwal') ?>">
                        <i class="fe-calendar"></i>
                        <span> Jadwal Praktikum</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('informasi') ?>">
                        <i class="fe-tv"></i>
                        <span> Informasi</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('sertifikat') ?>">
                        <i class="fe-file-text"></i>
                        <span> Sertifikat</span>
                    </a>
                </li>

                <li class="menu-title">Pengaturan</li>

                <li>
                    <a href="<?= base_url('profile') ?>">
                        <i class="fe-user"></i>
                        <span> Profil</span>
                    </a>
                </li>

                <li>
                    <a href="#user" data-toggle="collapse">
                        <i class="fe-users"></i>
                        <span> Users Manajemen</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav-second-level">

                            <li>
                                <a href="<?= base_url('user') ?>">Users</a>
                            </li>
                            <li>
                                <a href="<?= base_url('grup') ?>">Grup User</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?= base_url('konfigurasi') ?>">
                        <i class="fe-settings"></i>
                        <span> Konfigurasi</span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->