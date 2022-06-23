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
                <div class="col-8">
                    <div class="card">
                        <form action="<?= base_url('nilai/nilai_soft/hapus_all/') ?>" method="POST" id="form-delete">
                            <div class="row p-2">
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
                                            <th>Kelamin</th>
                                            <th>Nilai Tugas</th>
                                            <th>Nilai UAS</th>
                                            <th>Nilai Huruf</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($get_nilai_soft as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id ?>"></td>
                                                <td><?= $data->nim; ?></td>
                                                <td><?= $data->nama; ?></td>
                                                <td><?= $data->kelamin; ?></td>
                                                <td><?= $data->nilai_tugas; ?></td>
                                                <td><?= $data->nilai_uas; ?></td>
                                                <td>
                                                    <?php if ($data->nilai_uas >= "85") : ?>
                                                        <div class="badge badge-outline-success">A</div>
                                                    <?php elseif ($data->nilai_uas >= "78") : ?>
                                                        <div class="badge badge-outline-success">B+</div>
                                                    <?php elseif ($data->nilai_uas >= "70") : ?>
                                                        <div class="badge badge-outline-success">B</div>
                                                    <?php elseif ($data->nilai_uas >= "63") : ?>
                                                        <div class="badge badge-outline-success">C+</div>
                                                    <?php elseif ($data->nilai_uas >= "55") : ?>
                                                        <div class="badge badge-outline-warning">C</div>
                                                    <?php elseif ($data->nilai_uas >= "45") : ?>
                                                        <div class="badge badge-outline-danger">D</div>
                                                    <?php elseif ($data->nilai_uas <= "44") : ?>
                                                        <div class="badge badge-outline-danger">E</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" data-target="#detail<?= $data->id ?>" class="btn btn-outline-info" data-toggle="modal" title="Detail nilai" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                    <a href="javascript:void(0);" data-target="#edit<?= $data->id ?>" data-toggle="modal" class="btn btn-outline-warning" title="Edit nilai" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('nilai/nilai_soft/hapus/') . base64_encode($data->id) ?>" class="btn btn-outline-danger hapus" title="Hapus nilai" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </form>
                    </div> <!-- end card -->
                </div><!-- end col-->
                <div class="col-4">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title mb-2">NILAI</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">Nilai Praktikum</th>
                                </tr>
                                <tr>
                                    <td class="text-center">Penilaian</td>
                                    <td class="text-center">Presentase</td>
                                </tr>
                                <tr>
                                    <td>Kehadiran + Aktifitas</td>
                                    <td>30%</td>
                                </tr>
                                <tr>
                                    <td>Responsi</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>Tugas + Laporan Praktikum</td>
                                    <td>40%</td>
                                </tr>
                                <tr>
                                    <td>Ujian Akhir Semester/Praktikum</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">Jumlah 100%</th>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">Range Nilai</th>
                                </tr>
                                <tr>
                                    <td class="text-center">Huruf</td>
                                    <td class="text-center">Angka</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>≥ 85</td>
                                </tr>
                                <tr>
                                    <td>B+</td>
                                    <td>77,5 – 84,9</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>70 – 77,4</td>
                                </tr>
                                <tr>
                                    <td>C+</td>
                                    <td>62,5 – 69,9</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>55 – 62,49</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>45 – 54,9</td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <td>≤ 44,9</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Tambah modal -->
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Nilai Software</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <?php echo form_open("nilai/nilai_soft/tambah"); ?>
                <div class="modal-body p-4">

                    <div class="form-group">
                        <label for="nim" class="control-label">NIM</label>
                        <select name="nim" id="nim" class="form-control" data-toggle="select2">
                            <option>-- Pilih NIM --</option>
                            <?php foreach ($get_nim as $nim) : ?>
                                <option value="<?= $nim->nim ?>"><?= $nim->nim ?>-<?= $nim->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori_lab" class="control-label">Laboratorium</label>
                                <select name="kategori_lab" id="kategori_lab" class="form-control">
                                    <?php foreach ($get_kategori_lab as $lab) : ?>
                                        <?php if ($lab->id == 4) : ?>
                                            <option value="<?= $lab->id ?>"><?= $lab->kategori ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori_praktikum_id" class="control-label">Praktikum</label>
                                <select name="kategori_praktikum_id" id="kategori_praktikum_id" class="form-control">
                                    <?php foreach ($get_kategori_praktikum as $praktikum) : ?>
                                        <option value="<?= $praktikum->id ?>"><?= $praktikum->kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nilai_tugas">Nilai Tugas <span class="text-danger">*</span></label>
                        <input type="text" id="nilai_tugas" name="nilai_tugas" class="form-control" value="<?= set_value('nilai_tugas') ?>" require>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nilai_uas">Nilai UAS <span class="text-danger">*</span></label>
                        <input type="text" id="nilai_uas" name="nilai_uas" class="form-control" value="<?= set_value('nilai_uas') ?>" require>
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
    <?php foreach ($get_nilai_soft as $edit) : ?>
        <div id="edit<?= $edit->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Nilai Software</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <?php echo form_open("nilai/nilai_soft/edit"); ?>
                    <div class="modal-body p-4">
                        <input type="hidden" name="id" id="id" value="<?= $edit->id ?>">
                        <div class="form-group">
                            <label for="nim" class="control-label">NIM</label>
                            <select name="nim" id="nim" class="form-control">
                                <option>-- Pilih NIM --</option>
                                <?php foreach ($get_nim as $n) : ?>
                                    <option value="<?= $n->nim ?>" <?php if ($edit->nim == $n->nim) : ?> selected <?php endif; ?>><?= $n->nim ?>-<?= $n->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <dvi class="col-md-">
                                <div class="form-group">
                                    <label for="kategori_lab" class="control-label">Laboratorium</label>
                                    <select name="kategori_lab" id="kategori_lab" class="form-control">
                                        <?php foreach ($get_kategori_lab as $lab2) : ?>
                                            <?php if ($lab2->id != 3) : ?>
                                                <option value="<?= $lab2->id ?>" <?php if ($edit->kategori_lab == $lab2->id) : ?> selected <?php endif; ?>><?= $lab2->kategori ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </dvi>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori_praktikum_id" class="control-label">Praktikum</label>
                                        <select name="kategori_praktikum_id" id="kategori_praktikum_id" class="form-control">
                                            <?php foreach ($get_kategori_praktikum as $praktikum) : ?>
                                                <option value="<?= $praktikum->id ?>" <?php if ($edit->kategori_praktikum_id == $praktikum->id) : ?> selected <?php endif; ?>><?= $praktikum->kategori ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nilai_tugas">Nilai Tugas <span class="text-danger">*</span></label>
                            <input type="text" id="nilai_tugas" name="nilai_tugas" class="form-control" value="<?= $edit->nilai_tugas ?>" require>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nilai_uas">Nilai UAS <span class="text-danger">*</span></label>
                            <input type="text" id="nilai_uas" name="nilai_uas" class="form-control" value="<?= $edit->nilai_uas ?>" require>
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
    <?php endforeach; ?>

    <!-- detail modal -->
    <?php foreach ($get_nilai_soft as $detail) : ?>
        <div id="detail<?= $detail->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Nilai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group mb-3">
                            <label for="nilai_tugas">NIM</label>
                            <input type="text" class="form-control" value="<?= $detail->nim ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nilai_tugas">Laboratorum</label>
                            <input type="text" class="form-control" value="<?= $detail->kategori ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nilai_tugas">Nilai Tugas</label>
                            <input type="text" class="form-control" value="<?= $detail->nilai_tugas ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nilai_uas">Nilai UAS</label>
                            <input type="text" class="form-control" value="<?= $detail->nilai_uas ?>" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"><i class="fe-arrow-left"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    <?php endforeach; ?>