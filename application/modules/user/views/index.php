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
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                        <h4 class="page-title">List Data <?= $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="<?= base_url('user/hapus_all/') ?>" method="POST" id="form-delete">
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-danger" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                    <a href="javascript:void(0);" data-target="#tambah" data-toggle="modal" class="btn btn-outline-blue"><i class="fe-plus"></i> Tambah User</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <h4 class="header-title">Data <?= $title; ?></h4>
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chack-all"></th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Group</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($get_user as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id ?>"></td>
                                                <td><?= $data->first_name ?></td>
                                                <td><?= $data->last_name ?></td>
                                                <td><?= $data->email ?></td>
                                                <td>
                                                    <ul>
                                                        <?php foreach ($data->groups as $group) : ?>
                                                            <li>
                                                                <div class="badge badge-info"><?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?></div>
                                                            </li>
                                                        <?php endforeach ?>
                                                        <li>
                                                            <a href="<?= base_url('user/tampil_groupkan/') . $data->id ?>" class="badge badge-outline-success">Grupkan</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <?php if ($data->active == 1) : ?>
                                                        <div class="badge badge-success"><i class="fa fa-check"></i></div>
                                                    <?php else : ?>
                                                        <div class="badge badge-danger"><i class="fe-x"></i></div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" data-target="#detail<?= $data->id ?>" class="btn btn-outline-info" data-toggle="modal" title="Detail User" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                    <a href="javascript:void(0);" data-target="#edit<?= $data->id ?>" class="btn btn-outline-warning" data-toggle="modal" title="Edit User" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('user/hapus/') . $data->id ?>" class="btn btn-outline-danger hapus" title="Hapus User" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
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
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <?php echo form_open("user/create_user"); ?>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                                <input type="text" id="first_name" name="first_name" value="<?= set_value('first_name') ?>" class="form-control" require>
                                <?= form_error('first_name', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="<?= set_value('last_name') ?>" require>
                                <?= form_error('last_name', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="company">Nama Instansi <span class="text-danger">*</span></label>
                        <input type="text" id="company" name="company" class="form-control" value="<?= set_value('company') ?>" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" id="username" name="username" class="form-control" value="<?= set_value('username') ?>" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>" require>
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        <input type="hidden" id="username" name="identity" class="form-control" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="number" id="phone" name="phone" class="form-control" value="<?= set_value('phone') ?>" require>
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

                    <div class="form-group">
                        <label for="aktifasi" class="control-label">Aktifasi</label>
                        <select name="active" id="active" class="form-control">
                            <option>-- Pilih Aktifasi --</option>
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
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

    <!-- edit modal content -->
    <?php foreach ($get_user as $user) : ?>
        <div id="edit<?= $user->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?php echo form_open("user/edit_user"); ?>
                    <div class="modal-body p-4">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nama Depan</label>
                                    <input type="text" class="form-control" name="first_name" value="<?= $user->first_name ?>" placeholder="Nama Depan">
                                    <?= form_error('first_name', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Nama Belakang</label>
                                    <input type="text" class="form-control" name="last_name" value="<?= $user->last_name ?>" placeholder="Nama Belakang">
                                    <?= form_error('last_name', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="company" value="<?= $user->company ?>" placeholder="Nama Perusahaan">
                                    <?= form_error('company', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $user->email ?>" placeholder="Email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" value="<?= $user->phone ?>" placeholder="Phone">
                                    <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $user->username ?>" placeholder="Username">
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="field-4" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Konfirmasi Password">
                                    <?= form_error('password_confirm', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="aktifasi" class="control-label">Aktifasi</label>
                            <select name="active" id="active" class="form-control">
                                <option value="1" <?php if ($user->active == 1) : ?> selected <?php endif; ?>>Aktif</option>
                                <option value="0" <?php if ($user->active == 0) : ?> selected <?php endif; ?>>Non-Aktif</option>
                            </select>
                        </div>

                        <h4>Grup User</h4>
                        <?php if ($this->ion_auth->is_admin()) : ?>
                            <?php
                            $curen = $this->ion_auth->get_users_groups($user->id)->result_array();
                            foreach ($get_grup as $group_id) : ?>
                                <div class="form-group mb-0">
                                    <input type="checkbox" name="groups[]" value="<?= $group_id['id'] ?>" <?php echo (in_array($group_id, $curen)) ? 'checked="checked"' : null; ?>>
                                    <label for="customCheck1"><?php echo htmlspecialchars($group_id['description'], ENT_QUOTES, 'UTF-8'); ?></label>
                                </div>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                        <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fe-save"></i></button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>

    <!-- detail modal content -->
    <?php foreach ($get_user as $detail) : ?>
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
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nama Depan</label>
                                    <input type="text" class="form-control" name="first_name" value="<?= $detail->first_name ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Nama Belakang</label>
                                    <input type="text" class="form-control" name="last_name" value="<?= $detail->last_name ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="company" value="<?= $detail->company ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $detail->email ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" value="<?= $detail->phone ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">username</label>
                                    <input type="text" class="form-control" value="<?= $detail->username ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <h4>User Group</h4>
                        <?php if ($this->ion_auth->is_admin()) : ?>
                            <?php
                            $curen = $this->ion_auth->get_users_groups($detail->id)->result_array();
                            foreach ($get_grup as $group_id) : ?>
                                <?php if ($group_id['id'] == in_array($group_id, $curen)) : ?>
                                    <div class="form-group mb-0">
                                        <input type="checkbox" name="groups[]" value="<?= $group_id['id'] ?>" <?php echo (in_array($group_id, $curen)) ? 'checked="checked"' : null; ?> disabled>
                                        <label for="customCheck1"><?php echo htmlspecialchars($group_id['description'], ENT_QUOTES, 'UTF-8'); ?></label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i> </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>