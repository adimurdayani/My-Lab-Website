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
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title">Edit <?= $title; ?></h4>

                            <?= form_open() ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tanggal_buka" id="tanggal_buka" class="form-control" value="<?= $get_informasi['tanggal_buka'] ?>" required>
                                        <input type="hidden" name="id" value="<?= $get_informasi['id'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Tutup</label>
                                        <input type="date" name="tanggal_tutup" id="tanggal_tutup" class="form-control" value="<?= $get_informasi['tanggal_tutup'] ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="">Pilih Laboratorium</label>
                                <select name="kategori_register_id" id="kategori_register_id" class="form-control">
                                    <option value="">-- Pilih Laboratorium --</option>
                                    <?php foreach ($get_kategori_register as $register) : ?>
                                        <option value="<?= $register['id'] ?>" <?php if ($get_informasi['kategori_register_id'] == $register['id']) : ?> selected <?php endif; ?>><?= $register['kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?= $get_informasi['keterangan'] ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('informasi') ?>" class="btn btn-secondary float-right mt-4 mr-2"><i class="fe-arrow-left"></i> Kembali</a>
                            <?= form_close() ?>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->