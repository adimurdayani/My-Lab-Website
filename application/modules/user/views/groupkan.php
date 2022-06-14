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
                                <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User Manajemen</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title">Data <?= $title; ?></h4>
                            <p class="sub-header">
                                Nama Pengguna: <b><?= $get_user->first_name ?></b>
                                <?= validation_errors() ?>
                            </p>

                            <a href="<?= base_url('user') ?>" class="btn btn-secondary mb-2"><i class="fe-arrow-left"></i> Kembali</a>
                            <?= $this->session->flashdata('sukses'); ?>
                            <form action="<?= base_url('user/groupkan') ?>" method="POST">
                                <div class="form-group">
                                    <label for="">Pilih Group User</label>
                                    <input type="hidden" name="id" value="<?= $get_user->id ?>">
                                    <select name="group_id" id="" class="form-control">
                                        <?php foreach ($get_all_grup as $ug) : ?>
                                            <?php if ($ug->name != "admin") : ?>
                                                <option value="<?= $ug->id ?>"><?= $ug->description ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="submit" class="btn btn-success mt-2">Ubah</button>
                                </div>
                            </form>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->