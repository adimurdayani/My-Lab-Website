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
                <div class="col-12">
                    <div class="card">
                        <form action="<?= base_url('jadwal/hapus_all/') ?>" method="POST" id="form-delete">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-danger" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                    <a href="javascript:void(0);" data-target="#tambah" data-toggle="modal" class="btn btn-outline-blue"><i class="fe-plus"></i> Tambah Jadwal</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <h4 class="header-title">Data <?= $title; ?></h4>
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chack-all"></th>
                                            <th>Praktikum</th>
                                            <th>Asisten Lab</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($get_jadwal as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id ?>"></td>
                                                <td><?= $data->judul ?></td>
                                                <td><?= $data->nama_dosen ?></td>
                                                <td><?= $data->tanggal ?></td>
                                                <td><?= $data->jam ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" data-target="#detail<?= $data->id ?>" class="btn btn-outline-info" data-toggle="modal" title="Detail jadwal" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                    <a href="javascript:void(0);" data-target="#edit<?= $data->id ?>" class="btn btn-outline-warning" data-toggle="modal" title="Edit jadwal" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('jadwal/hapus/') . base64_encode($data->id) ?>" class="btn btn-outline-danger hapus" title="Hapus jadwal" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
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

    <!-- Tambah modal -->
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <?php echo form_open("jadwal/tambah"); ?>
                <div class="modal-body p-4">

                    <div class="form-group">
                        <label for="judul" class="control-label">Praktikum</label>
                        <select name="judul" id="judul" class="form-control" data-toggle="select2">
                            <option>-- Pilih Praktikum --</option>
                            <?php foreach ($get_kategori_praktikum as $kat) : ?>
                                <option value="<?= $kat->kategori ?>"><?= $kat->kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= set_value('tanggal') ?>" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="jam">Jam <span class="text-danger">*</span></label>
                                <input type="time" id="jam" name="jam" class="form-control" value="<?= set_value('jam') ?>" require>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_dosen">Asisten Lab <span class="text-danger">*</span></label>
                        <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="<?= set_value('nama_dosen') ?>" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                        <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- edit modal -->
    <?php foreach ($get_jadwal as $edit) : ?>
        <div id="edit<?= $edit->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?php echo form_open("jadwal/edit"); ?>
                    <div class="modal-body p-4">
                        <input type="hidden" name="id" id="id" value="<?= $edit->id ?>">
                        <div class="form-group">
                            <label for="judul" class="control-label">Praktikum</label>
                            <select name="judul" id="judul" class="form-control">
                                <option>-- Pilih Praktikum --</option>
                                <?php foreach ($get_kategori_praktikum as $kat) : ?>
                                    <option value="<?= $kat->kategori ?>" <?php if ($edit->judul == $kat->kategori) : ?> selected <?php endif; ?>><?= $kat->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $edit->tanggal ?>" require>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jam">Jam <span class="text-danger">*</span></label>
                                    <input type="time" id="jam" name="jam" class="form-control" value="<?= $edit->jam ?>" require>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_dosen">Asisten Lab <span class="text-danger">*</span></label>
                            <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="<?= $edit->nama_dosen ?>" require>
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                            <textarea id="keterangan" name="keterangan" class="form-control"><?= $edit->keterangan ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                        <button type="submit" class="btn btn-outline-warning"><i class="fa fa-save"></i> </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>