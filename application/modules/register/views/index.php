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
                        <form action="<?= base_url('register/hapus_all/') ?>" method="POST" id="form-delete">
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-danger" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                    <a href="javascript:void(0);" data-target="#tambah" data-toggle="modal" class="btn btn-outline-blue"><i class="fe-plus"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <h4 class="header-title">Data <?= $title; ?></h4>
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chack-all"></th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($get_register as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id ?>"></td>
                                                <td><?= $data->nim ?></td>
                                                <td><?= $data->nama ?></td>
                                                <td><?= $data->email ?></td>
                                                <td>
                                                    <?php if ($data->active == 1) : ?>
                                                        <a href="javascript:void(0);" data-target="#aktivasi<?= $data->id ?>" data-toggle="modal" class="badge badge-outline-success" title="Aktivasi user" data-plugin="tippy" data-tippy-placement="top"><i class="fa fa-check"></i></a>
                                                    <?php else : ?>
                                                        <a href="javascript:void(0);" data-target="#aktivasi<?= $data->id ?>" data-toggle="modal" class="badge badge-outline-danger" title="Aktivasi user" data-plugin="tippy" data-tippy-placement="top"><i class="fe-x"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" data-target="#detail<?= $data->id ?>" class="btn btn-outline-info" data-toggle="modal" title="Detail register" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                    <a href="javascript:void(0);" data-target="#edit<?= $data->id ?>" class="btn btn-outline-warning" data-toggle="modal" title="Edit register" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('register/hapus/') . $data->id ?>" class="btn btn-outline-danger hapus" title="Hapus register" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
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
                    <h4 class="modal-title">Tambah Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <?php echo form_open("register/tambah"); ?>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nim">NIM <span class="text-danger">*</span></label>
                                <input type="number" id="nim" name="nim" value="<?= set_value('nim') ?>" class="form-control" require>
                                <?= form_error('nim', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" id="nama" name="nama" class="form-control" value="<?= set_value('nama') ?>" require>
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="number" id="phone" name="phone" class="form-control" value="<?= set_value('phone') ?>" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="kelamin" id="kelamin" class="form-control">
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control" require>
                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="password_confirm">Konfirmasi Password <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control" require>
                                <?= form_error('password_confirm', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
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

    <?php foreach ($get_register as $edit) : ?>
        <!-- Tambah modal -->
        <div id="edit<?= $edit->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Register</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?php echo form_open("register/edit"); ?>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="<?= $edit->id ?>">
                                <div class="form-group mb-3">
                                    <label for="nim">NIM <span class="text-danger">*</span></label>
                                    <input type="number" id="nim" name="nim" value="<?= $edit->nim ?>" class="form-control" require>
                                    <?= form_error('nim', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $edit->nama ?>" require>
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $edit->email ?>" require>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input type="number" id="phone" name="phone" class="form-control" value="<?= $edit->phone ?>" require>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="kelamin" id="kelamin" class="form-control">
                                <option value="Perempuan" <?php if ($edit->kelamin == "Perempuan") : ?> selected <?php endif; ?>>Perempuan</option>
                                <option value="Laki-Laki" <?php if ($edit->kelamin == "Laki-Laki") : ?> selected <?php endif; ?>>Laki-Laki</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control" require>
                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password_confirm">Konfirmasi Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirm" name="password_confirm" class="form-control" require>
                                    <?= form_error('password_confirm', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
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


    <?php foreach ($get_register as $detail) : ?>
        <!-- Tambah modal -->
        <div id="detail<?= $detail->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="<?= $detail->id ?>">
                                <div class="form-group mb-3">
                                    <label for="nim">NIM <span class="text-danger">*</span></label>
                                    <input type="number" value="<?= $detail->nim ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?= $detail->nama ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" value="<?= $detail->email ?>" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input type="number" id="phone" name="phone" class="form-control" value="<?= $detail->phone ?>" require>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="kelamin" id="kelamin" class="form-control">
                                <option value="Perempuan" <?php if ($detail->kelamin == "Perempuan") : ?> selected <?php endif; ?>>Perempuan</option>
                                <option value="Laki-Laki" <?php if ($detail->kelamin == "Laki-Laki") : ?> selected <?php endif; ?>>Laki-Laki</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>

    <?php foreach ($get_register as $aktivasi) : ?>
        <!-- Tambah modal -->
        <div id="aktivasi<?= $aktivasi->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Aktivasi User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?= form_open('register/active') ?>
                    <div class="modal-body p-2">

                        <input type="hidden" name="id" value="<?= $aktivasi->id ?>">
                        <div class="form-group mb-3">
                            <label for="email">Aktivasi Akun</label>
                            <select class="form-control" name="active">
                                <option value="1" <?php if ($aktivasi->active == 1) : ?> selected <?php endif; ?>>Aktif</option>
                                <option value="0" <?php if ($aktivasi->active == 0) : ?> selected <?php endif; ?>>Non-Aktif</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                        <button type="submit" class="btn btn-outline-warning"><i class="fa fa-save"></i> </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>