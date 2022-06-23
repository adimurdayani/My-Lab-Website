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
                            <div class="form-group">
                                <label for="">Pilih Mahasiswa</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Pilih mahasiswa" value="<?= $get_sertifikat['nim'] . ' - ' . $get_sertifikat['nama'] ?>" required readonly>
                                    <input type="hidden" class="form-control" id="user_id" name="user_id">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $get_sertifikat['id'] ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" data-target="#pilih-mahasiswa" data-toggle="modal" type="button"><i class="fe-search"></i></button>
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
                                <img src="<?= base_url('assets/backend/images/upload/') . $get_sertifikat['img_sertifikat'] ?>" class="img-thumbnail mt-2" width="30%" alt="<?= $get_sertifikat['img_sertifikat'] ?>">
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
    <div id="pilih-mahasiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4 table-responsive">
                    <table id="basic-datatable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">NIM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($get_mahasiswa as $mahasiswa) : ?>
                                <tr>
                                    <td class="text-center"><?= $mahasiswa['nim'] ?></td>
                                    <td><?= $mahasiswa['nama'] ?></td>
                                    <td><?= $mahasiswa['email'] ?></td>
                                    <td class="text-center">
                                        <button type="button" id="id_mahasiswa" data-idmahasiswa="<?= $mahasiswa['id'] ?>" data-nama="<?= $mahasiswa['nama'] ?>" data-nim="<?= $mahasiswa['nim'] ?>" class="btn btn-success idmahasiswa" data-dismiss="modal"><i class="fe-plus"></i> Pilih</button>
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
        $('.idmahasiswa').on('click', function(e) {
            var idmahasiswa = $(this).data('idmahasiswa');
            var nama = $(this).data('nama');
            var nim = $(this).data('nim');
            var id = document.getElementById('user_id').value = idmahasiswa;
            var mahasiswa = document.getElementById('nama_user').value = nim + ' - ' + nama;
        })

        $('.input1').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>