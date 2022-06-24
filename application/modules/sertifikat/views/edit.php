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
                        <div class="card-body">
                            <?= form_open_multipart() ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Hardware</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nama_hardware" name="nama_hardware" autocomplete="off" placeholder="Pilih nilai hardware" required readonly>
                                            <input type="hidden" class="form-control" id="id_hardware" name="id_hardware">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $get_sertifikat['id'] ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" data-target="#pilih-hardware" data-toggle="modal" type="button"><i class="fe-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Software</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nama_software" name="nama_software" autocomplete="off" placeholder="Pilih nilai software" required readonly>
                                            <input type="hidden" class="form-control" id="id_software" name="id_software">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" data-target="#pilih-software" data-toggle="modal" type="button"><i class="fe-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Upload Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input input1" id="img_sertifikat" name="img_sertifikat" required>
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <img src="<?= base_url('assets/backend/images/upload/') . $get_sertifikat['img_sertifikat'] ?>" alt="" class="img-thumbnail mt-2" width="30%">
                            </div>

                            <button type="submit" class="btn btn-primary float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('sertifikat') ?>" class="btn btn-secondary mt-4 mr-2 float-right"><i class="fe-arrow-left"></i> Kembali</a>
                            <?= form_close() ?>
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Tambah modal -->
    <div id="pilih-hardware" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Nilai Hardware</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4 table-responsive">
                    <table id="basic-datatable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nilai Tugas</th>
                                <th class="text-center">Nilai UAS</th>
                                <th class="text-center">Nilai Huruf</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($get_nilai_h as $hardware) : ?>
                                <tr>
                                    <td class="text-center"><?= $hardware->nim ?></td>
                                    <td><?= $hardware->nama; ?></td>
                                    <td><?= $hardware->nilai_tugas; ?></td>
                                    <td><?= $hardware->nilai_uas; ?></td>
                                    <td>
                                        <?php if ($hardware->nilai_uas >= "85") : ?>
                                            <div class="badge badge-outline-success">A</div>
                                        <?php elseif ($hardware->nilai_uas >= "78") : ?>
                                            <div class="badge badge-outline-success">B+</div>
                                        <?php elseif ($hardware->nilai_uas >= "70") : ?>
                                            <div class="badge badge-outline-success">B</div>
                                        <?php elseif ($hardware->nilai_uas >= "63") : ?>
                                            <div class="badge badge-outline-success">C+</div>
                                        <?php elseif ($hardware->nilai_uas >= "55") : ?>
                                            <div class="badge badge-outline-warning">C</div>
                                        <?php elseif ($hardware->nilai_uas >= "45") : ?>
                                            <div class="badge badge-outline-danger">D</div>
                                        <?php elseif ($hardware->nilai_uas <= "44") : ?>
                                            <div class="badge badge-outline-danger">E</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="id_hardware" data-idhardware="<?= $hardware->id ?>" data-nama="<?= $hardware->nama ?>" data-nim="<?= $hardware->nim ?>" class="btn btn-success idhardware" data-dismiss="modal"><i class="fe-plus"></i> Pilih</button>
                                    </td>
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

    <div id="pilih-software" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Nilai Software</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4 table-responsive">
                    <table id="basic-datatable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nilai Tugas</th>
                                <th class="text-center">Nilai UAS</th>
                                <th class="text-center">Nilai Huruf</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($get_nilai_s as $software) : ?>
                                <tr>
                                    <td class="text-center"><?= $software->nim ?></td>
                                    <td><?= $software->nama; ?></td>
                                    <td><?= $software->nilai_tugas; ?></td>
                                    <td><?= $software->nilai_uas; ?></td>
                                    <td>
                                        <?php if ($software->nilai_uas >= "85") : ?>
                                            <div class="badge badge-outline-success">A</div>
                                        <?php elseif ($software->nilai_uas >= "78") : ?>
                                            <div class="badge badge-outline-success">B+</div>
                                        <?php elseif ($software->nilai_uas >= "70") : ?>
                                            <div class="badge badge-outline-success">B</div>
                                        <?php elseif ($software->nilai_uas >= "63") : ?>
                                            <div class="badge badge-outline-success">C+</div>
                                        <?php elseif ($software->nilai_uas >= "55") : ?>
                                            <div class="badge badge-outline-warning">C</div>
                                        <?php elseif ($software->nilai_uas >= "45") : ?>
                                            <div class="badge badge-outline-danger">D</div>
                                        <?php elseif ($software->nilai_uas <= "44") : ?>
                                            <div class="badge badge-outline-danger">E</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="id_software" data-idsoftware="<?= $software->id ?>" data-nama="<?= $software->nama ?>" data-nim="<?= $software->nim ?>" class="btn btn-success idsoftware" data-dismiss="modal"><i class="fe-plus"></i> Pilih</button>
                                    </td>
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

    <?php echo $this->load->view('template/footer'); ?>
    <script>
        $('.idsoftware').on('click', function(e) {
            var idsoftware = $(this).data('idsoftware');
            var nama = $(this).data('nama');
            var nim = $(this).data('nim');
            var id_software = document.getElementById('id_software').value = idsoftware;
            var mahasiswa = document.getElementById('nama_software').value = nim + ' - ' + nama;
        })

        $('.idhardware').on('click', function(e) {
            var idhardware = $(this).data('idhardware');
            var nama = $(this).data('nama');
            var nim = $(this).data('nim');
            var id_hardware = document.getElementById('id_hardware').value = idhardware;
            var mahasiswa = document.getElementById('nama_hardware').value = nim + ' - ' + nama;
        })

        $('.input1').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>