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
                    <a href="#profile" data-toggle="collapse">
                        <i class="fe-database"></i>
                        <span> Mahasiswa </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="profile">
                        <ul class="nav-second-level">

                            <li>
                                <a href="<?= base_url('mahasiswa') ?>">List</a>
                            </li>

                            <!-- <li>
                                <a href="<?= base_url('mahasiswa/tambah') ?>">Post Mahasiswa</a>
                            </li> -->

                            <!-- <li>
                                <a href="<?= base_url('mahasiswa/konsentrasi') ?>">Konsentrasi</a>
                            </li> -->

                        </ul>
                    </div>
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
                                <a href="#pendaftaran2" data-toggle="collapse">
                                    Hardware <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="pendaftaran2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="<?= base_url('pendaftaran') ?>">List Hardware</a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('pendaftaran/tambah') ?>">Post Hardware</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#pendaftaran3" data-toggle="collapse">
                                    Software <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="pendaftaran3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="<?= base_url('pendaftaran/pendaftaran_soft') ?>">List Software</a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('pendaftaran/pendaftaran_soft/tambah') ?>">Post Software</a>
                                        </li>
                                    </ul>
                                </div>
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
                    <a href="<?= base_url('jadwal') ?>">
                        <i class="fe-calendar"></i>
                        <span> Jadwal Praktikum</span>
                    </a>
                </li>

                <li>
                    <a href="#informasi" data-toggle="collapse">
                        <i class="fe-tv"></i>
                        <span> Informasi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="informasi">
                        <ul class="nav-second-level">

                            <li>
                                <a href="<?= base_url('informasi/kategori') ?>">Kategori</a>
                            </li>

                            <li>
                                <a href="<?= base_url('informasi') ?>">List</a>
                            </li>

                            <li>
                                <a href="<?= base_url('berita/') ?>">Post Informasi</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sertifikat" data-toggle="collapse">
                        <i class="fe-file-text"></i>
                        <span> Sertifikat</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sertifikat">
                        <ul class="nav-second-level">

                            <li>
                                <a href="<?= base_url('sertifikat/kategori_galeri') ?>">Kategori</a>
                            </li>
                            <li>
                                <a href="<?= base_url('sertifikat') ?>">List </a>
                            </li>
                            <li>
                                <a href="<?= base_url('galeri/tambah') ?>">Post Sertifikat</a>
                            </li>

                        </ul>
                    </div>
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