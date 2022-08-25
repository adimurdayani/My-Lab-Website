<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url('pendaftaran') ?>">Data Hardware</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title">Form <?= $title; ?></h4>
                            <?= form_open_multipart('pendaftaran/update') ?>
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="hidden" name="id" value="<?= $get_pendaftaran->id ?>">
                                    <div class="form-group">
                                        <label for="daftar_id">ID Daftar</label>
                                        <input type="text" value="<?= $get_pendaftaran->daftar_id ?>" class="form-control" disabled>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <select name="nim" id="nim" class="form-control" data-toggle="select2">
                                                    <option value="">-- Pilih NIM --</option>
                                                    <?php foreach ($get_register as $register) : ?>
                                                        <option value="<?= $register->nim ?>" <?php if ($get_pendaftaran->nim == $register->nim) : ?> selected <?php endif; ?>><?= $register->nama; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?= $get_pendaftaran->nama ?>" placeholder="Input nama lengkap">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kelamin">Jenis Kelamin</label>
                                                <select class="form-control" name="kelamin">
                                                    <option value="Perempuan" <?php if ($get_pendaftaran->kelamin == "Perempuan") : ?> selected <?php endif; ?>>Perempuan</option>
                                                    <option value="Laki-Laki" <?php if ($get_pendaftaran->kelamin == "Laki-Laki") : ?> selected <?php endif; ?>>Laki-Laki</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <select class="form-control" name="agama">
                                                    <option value="Islam" <?php if ($get_pendaftaran->agama == "Islam") : ?> selected <?php endif; ?>>Islam</option>
                                                    <option value="Hindu" <?php if ($get_pendaftaran->agama == "Hindu") : ?> selected <?php endif; ?>>Hindu</option>
                                                    <option value="Budha" <?php if ($get_pendaftaran->agama == "Budha") : ?> selected <?php endif; ?>>Budha</option>
                                                    <option value="Kristen" <?php if ($get_pendaftaran->agama == "Kristen") : ?> selected <?php endif; ?>>Kristen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Praktikum</label> <br />
                                                <select name="kategori_id" id="kategori_id" class="form-control" data-toggle="select2">
                                                    <?php foreach ($get_kategori_praktikum as $praktikum) : ?>
                                                        <option value="<?= $praktikum->id ?>" <?php if ($get_pendaftaran->kategori_id == $praktikum->id) : ?> selected <?php endif; ?>><?= $praktikum->kategori ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="semester">Semester</label>
                                                <select class="form-control" name="semester" data-toggle="select2">
                                                    <option value="Semester I" <?php if ($get_pendaftaran->semester == "Semester I") : ?> selected <?php endif; ?>>Semester I</option>
                                                    <option value="Semester II" <?php if ($get_pendaftaran->semester == "Semester II") : ?> selected <?php endif; ?>>Semester II</option>
                                                    <option value="Semester III" <?php if ($get_pendaftaran->semester == "Semester III") : ?> selected <?php endif; ?>>Semester III</option>
                                                    <option value="Semester IV" <?php if ($get_pendaftaran->semester == "Semester IV") : ?> selected <?php endif; ?>>Semester IV</option>
                                                    <option value="Semester V" <?php if ($get_pendaftaran->semester == "Semester V") : ?> selected <?php endif; ?>>Semester V</option>
                                                    <option value="Semester VI" <?php if ($get_pendaftaran->semester == "Semester VI") : ?> selected <?php endif; ?>>Semester VI</option>
                                                    <option value="Semester VII" <?php if ($get_pendaftaran->semester == "Semester VII") : ?> selected <?php endif; ?>>Semester VII</option>
                                                    <option value="Semester VIII" <?php if ($get_pendaftaran->semester == "Semester VIII") : ?> selected <?php endif; ?>>Semester VIII</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="project-overview">Alamat</label>
                                        <textarea class="form-control" id="project-overview" name="alamat" rows="5" placeholder="Input alamat lengkap anda.."><?= $get_pendaftaran->alamat ?></textarea>
                                    </div>

                                </div> <!-- end col-->

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label for="nama_ortu">Nama Orang Tua</label>
                                        <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" value="<?= $get_pendaftaran->nama_ortu ?>" placeholder="Nama lengkap orang tua">
                                    </div>

                                    <div class="form-group">
                                        <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
                                        <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" class="form-control" value="<?= $get_pendaftaran->pekerjaan_ortu ?>" placeholder="Pekerjaan lengkap orang tua">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_ortu">Alamat Orang Tua</label>
                                        <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="5" placeholder="Input alamat lengkap orang tua anda.."> <?= $get_pendaftaran->alamat_ortu ?></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kabupaten">Kabupaten</label>
                                                <input type="text" id="kabupaten" name="kabupaten" class="form-control" value="<?= $get_pendaftaran->kabupaten ?>" placeholder="Nama kabupaten">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="provinsi">Provinsi</label>
                                                <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?= $get_pendaftaran->provinsi ?>" placeholder="Nama provinsi">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" id="image" name="image" class="form-control" placeholder="Upload foto">
                                        <img src="<?= base_url('assets/backend/images/upload/') . $get_pendaftaran->image ?>" class="img-thumbnail mt-2" width="200px" alt="">
                                    </div>
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-warning waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> Update</button>
                                    <a href="<?= base_url('pendaftaran') ?>" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i> Kembali</a>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                        <?= form_close() ?>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- end card body-->

    </div> <!-- container -->

</div> <!-- content -->