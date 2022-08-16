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
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <form action="<?= base_url('kelompok/hapus_all/') ?>" method="POST" id="form-delete">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" data-target="#tambah" data-toggle="modal" class="btn btn-outline-blue mb-2"><i class="fe-plus"></i> Tambah</a>
                                        <button type="submit" class="btn btn-danger mb-2" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                    </div>
                                </div>
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chack-all"></th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelompok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($get_data as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id ?>"></td>
                                                <td><?= $data->nim ?></td>
                                                <td><?= $data->nama ?></td>
                                                <td><?= $data->kelompok ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" data-target="#detail<?= $data->id ?>" class="btn btn-outline-info" data-toggle="modal" title="Detail data" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                    <a href="javascript:void(0);" data-target="#edit<?= $data->id ?>" data-toggle="modal" class="btn btn-outline-warning" title="Edit data" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('kelompok/hapus/') . $data->id ?>" class="btn btn-outline-danger hapus" title="Hapus data" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                        </div> <!-- end card body-->
                        </form>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kelompok Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <?= form_open('kelompok/tambah') ?>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="id_mahasiswa" class="control-label">Nama Mahasiswa</label>
                        <select name="id_mahasiswa" id="id_mahasiswa" class="form-control" data-toggle="select2" required>
                            <option value="">-- Pilih mahasiswa --</option>
                            <?php foreach ($get_mahasiswa as $m) : ?>
                                <option value="<?= $m->id ?>"><?= $m->nim ?> - <?= $m->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kelompok</label>
                                <input type="text" name="kelompok" id class="form-control" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                    <button type="type" class="btn btn-outline-success waves-effect"><i class="fe-save"></i></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- edit modal content -->
    <?php foreach ($get_data as $edit) : ?>
        <div id="edit<?= $edit->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Kelompok Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?= form_open('kelompok/edit') ?>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="id_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <select name="id_mahasiswa" id="id_mahasiswa" class="form-control" data-toggle="select2" required>
                                <option value="">-- Pilih mahasiswa --</option>
                                <?php foreach ($get_mahasiswa as $m) : ?>
                                    <option value="<?= $m->id ?>" <?php if ($edit->id_mahasiswa == $m->id) : ?>selected<?php endif; ?>><?= $m->nim ?> - <?= $m->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Kelompok</label>
                                    <input type="text" name="kelompok" class="form-control" value="<?= $edit->kelompok ?>" required>
                                    <input type="hidden" name="id" class="form-control" value="<?= $edit->id ?>" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                        <button type="type" class="btn btn-outline-success waves-effect"><i class="fe-save"></i></button>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>

    <!-- edit modal content -->
    <?php foreach ($get_data as $detail) : ?>
        <div id="detail<?= $detail->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail kelompok Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4 table-responsive">
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Kelompok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data_kelompok = $this->db->get_where('tb_kelompok', ['kelompok' => $detail->kelompok])->result();
                                $no = 1;
                                foreach ($data_kelompok as $k) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $k->nim ?></td>
                                        <td><?= $k->nama ?></td>
                                        <td><?= $k->kelompok ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>