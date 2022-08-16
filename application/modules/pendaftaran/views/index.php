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
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">

                                    <?php
                                    $s = $this->input->post('semester');
                                    if (!empty($s)) {
                                        $this->db->where('semester', $s);
                                        $cetak = $this->db->get('tb_pendaftaran_h')->row();
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="">Pilih Semester</label>
                                            <select name="semester" id="semester" class="form-control">
                                                <option value="">-- Pilih Semester --</option>
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

                                        <div class="text-center">
                                            <button class="btn btn-primary" type="submit"><i class="fe-search"></i> Cari</button>
                                        </div>
                                    </form>

                                    <?php if (!empty($s)) : ?>
                                        <?php if ($cetak) : ?>
                                            <form action="<?= base_url('pendaftaran/cetak') ?>" method="post" target="_blank">
                                                <input type="hidden" name="semester" value="<?= $s ?>">
                                                <div class="text-center">
                                                    <button class="btn btn-success print mt-2" type="submit"><i class="fe-printer"></i> Cetak</a>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <form action="<?= base_url('pendaftaran/hapus_all/') ?>" method="POST" id="form-delete">
                                <a href="<?= base_url('pendaftaran/tambah') ?>" class="btn btn-outline-blue mb-2"><i class="fe-plus"></i> Tambah</a>
                                <button type="submit" class="btn btn-danger mb-2" id="hapus"><i class="fe-trash"></i> Hapus</button>

                                <?php
                                $semester = $this->input->post('semester');
                                if (!empty($semester)) :
                                    $this->db->order_by('id', 'desc');
                                    $this->db->where('semester', $semester);
                                    $get_data = $this->db->get('tb_pendaftaran_h')->result();
                                ?>

                                    <table id="basic-datatable" class="table nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="chack-all"></th>
                                                <th>ID Daftar</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Kelamin</th>
                                                <th>Semester</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php foreach ($get_data as $data) :
                                                $kat_prak = $this->db->get_where('tb_kategori_praktikum', ['id' => $data->kategori_id])->row();
                                            ?>
                                                <tr>
                                                    <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id ?>"></td>
                                                    <td><?= $data->daftar_id ?></td>
                                                    <td><?= $data->nim ?></td>
                                                    <td><?= $data->nama ?></td>
                                                    <td><?= $data->kelamin ?></td>
                                                    <td><?= $data->semester ?></td>
                                                    <td><?= $kat_prak->kategori ?></td>
                                                    <td>
                                                        <a href="javascript:void(0);" data-target="#detail<?= $data->id ?>" class="btn btn-outline-info" data-toggle="modal" title="Detail pendaftaran" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                        <a href="<?= base_url('pendaftaran/edit/') . base64_encode($data->id) ?>" class="btn btn-outline-warning" title="Edit pendaftaran" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                        <a href="<?= base_url('pendaftaran/hapus/') . base64_encode($data->id) ?>" class="btn btn-outline-danger hapus" title="Hapus mahasiswa" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else : ?>
                                    <table class="table nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="chack-all"></th>
                                                <th>ID Daftar</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Kelamin</th>
                                                <th>Semester</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tbody>
                                    </table>
                                <?php endif; ?>

                        </div> <!-- end card body-->
                        </form>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- detail modal content -->
    <?php foreach ($get_pendaftaran as $detail) : ?>
        <div id="detail<?= $detail->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label>ID Daftar</label>
                            <input type="text" class="form-control" value="<?= $detail->daftar_id ?>" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">NIM</label>
                                    <input type="text" class="form-control" value="<?= $detail->nim ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Nama</label>
                                    <input type="text" class="form-control" value="<?= $detail->nama ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="<?= $detail->kelamin ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="email" class="form-control" value="<?= $detail->agama ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Praktikum</label>
                                    <input type="text" class="form-control" value="<?= $detail->kategori ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Semester</label>
                                    <input type="text" class="form-control" value="<?= $detail->semester ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" readonly><?= $detail->alamat ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nama Wali</label>
                                    <input type="text" class="form-control" value="<?= $detail->nama_ortu ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Pekerjaan Wali</label>
                                    <input type="text" class="form-control" value="<?= $detail->pekerjaan_ortu ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Wali</label>
                                    <textarea class="form-control" readonly><?= $detail->alamat_ortu ?></textarea>
                                </div>
                            </div>
                        </div>

                        <img src="<?= base_url('assets/backend/images/upload/') . $detail->foto ?>" class="img-thumbnail mt-2" width="200px" alt="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i> </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>