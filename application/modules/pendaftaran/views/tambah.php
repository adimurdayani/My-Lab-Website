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
                            <?= form_open('pendaftaran/post') ?>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="daftar_id">ID Daftar</label>
                                        <input type="text" id="daftar_id" name="daftar_id" value="<?= $kode ?>" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <select name="nim" id="nim" class="form-control" data-toggle="select2">
                                                    <option value="">-- Pilih NIM --</option>
                                                    <?php foreach ($get_register as $register) : ?>
                                                        <option value="<?= $register->nim ?>"><?= $register->nama; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Input nama lengkap">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kelamin">Jenis Kelamin</label>
                                                <select class="form-control" name="kelamin">
                                                    <option value="Perempuan">Perempuan</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <select class="form-control" name="agama">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Kristen">Kristen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="kategori_lab">Laboratorium</label>
                                        <select class="form-control" name="kategori_lab">
                                            <?php foreach ($get_kategori_register as $register) : ?>
                                                <?php if ($register->kategori == "Hardware") : ?>
                                                    <option value="<?= $register->id ?>"><?= $register->kategori ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Praktikum</label> <br />
                                                <select name="kategori_id" id="kategori_id" class="form-control" data-toggle="select2">
                                                    <?php foreach ($get_kategori_praktikum as $praktikum) : ?>
                                                        <option value="<?= $praktikum->id ?>"><?= $praktikum->kategori ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="semester">Semester</label>
                                                <select class="form-control" name="semester" data-toggle="select2">
                                                    <option value="Semester I">Semester I</option>
                                                    <option value="Semester II">Semester II</option>
                                                    <option value="Semester III">Semester III</option>
                                                    <option value="Semester IV">Semester IV</option>
                                                    <option value="Semester V">Semester V</option>
                                                    <option value="Semester VI">Semester VI</option>
                                                    <option value="Semester VII">Semester VII</option>
                                                    <option value="Semester VIII">Semester VIII</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="project-overview">Alamat</label>
                                        <textarea class="form-control" id="project-overview" name="alamat" rows="5" placeholder="Input alamat lengkap anda.."></textarea>
                                    </div>

                                </div> <!-- end col-->

                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label for="nama_ortu">Nama Orang Tua</label>
                                        <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" placeholder="Nama lengkap orang tua">
                                    </div>

                                    <div class="form-group">
                                        <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
                                        <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" class="form-control" placeholder="Pekerjaan lengkap orang tua">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_ortu">Alamat Orang Tua</label>
                                        <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="5" placeholder="Input alamat lengkap orang tua anda.."></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kabupaten">Kabupaten</label>
                                                <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="Nama kabupaten">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="provinsi">Provinsi</label>
                                                <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="Nama provinsi">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> Simpan</button>
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