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
                                <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
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
                            <?= form_open('mahasiswa/update') ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="id" value="<?= $get_mahasiswa->id ?>">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="number" id="nim" name="nim" class="form-control" value="<?= $get_mahasiswa->nim ?>" placeholder="Input 15xxx">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?= $get_mahasiswa->nama ?>" placeholder="Input nama lengkap">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="angkatan">Angkatan</label>
                                        <input type="number" id="angkatan" name="angkatan" class="form-control" value="<?= $get_mahasiswa->angkatan ?>" placeholder="Input angkatan">
                                    </div>

                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->


                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-warning waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> Update</button>
                                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i> Kembali</a>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                        <?= form_close() ?>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div>
<!-- end row-->

</div> <!-- container -->

</div> <!-- content -->