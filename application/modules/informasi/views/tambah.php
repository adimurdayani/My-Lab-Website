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
                <div class="col-7">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="header-title">Tambah <?= $title; ?></h4>

                            <?= form_open('informasi/tambah') ?>
                            <div class="form-group">
                                <label for="">Pilih Jadwal</label>
                                <div class="input-group">
                                    <input type="text" name="jadwal_id" id="jadwal_id" class="form-control" placeholder="Pilih jadwal" required readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary" data-target="#pilih-jadwal" data-toggle="modal"><i class="fe-search"></i></button>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered w-100 mt-4">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Praktikum</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Jam</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($get_informasi_detail as $data) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nama_praktikum'] ?></td>
                                            <td><?= $data['tanggal_praktikum'] ?></td>
                                            <td><?= $data['jam_praktikum'] ?></td>
                                            <td>
                                                <button type="button" data-informasiid="<?= $data['informasi_id'] ?>" class="btn btn-sm btn-danger session"><i class="fe-trash"></i> Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-4">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tanggal" id="tangal" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-4">
                                        <label for="">Pilih Laboratorium</label>
                                        <select name="kategori_register_id" id="kategori_register_id" class="form-control">
                                            <option value="">-- Pilih Laboratorium --</option>
                                            <?php foreach ($get_kategori_register as $register) : ?>
                                                <option value="<?= $register['id'] ?>"><?= $register['kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary float-right mt-4"><i class="fe-save"></i> Simpan</button>
                            <a href="<?= base_url('informasi') ?>" class="btn btn-secondary float-right mt-4 mr-2"><i class="fe-arrow-left"></i> Kembali</a>

                            <?php foreach ($get_informasi_detail as $g) : ?>
                                <input type="hidden" name="nama_praktikum[]" value="<?= $g['nama_praktikum'] ?>">
                                <input type="hidden" name="tanggal_praktikum[]" value="<?= $g['tanggal_praktikum'] ?>">
                                <input type="hidden" name="jam_praktikum[]" value="<?= $g['jam_praktikum'] ?>">
                                <input type="hidden" name="jadwal_id[]" value="<?= $g['jadwal_id'] ?>">
                                <input type="hidden" name="informasi_id[]" value="<?= $g['informasi_id'] ?>">
                            <?php endforeach; ?>
                            <?= form_close() ?>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <div id="pilih-jadwal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4 table-responsive">
                    <table id="basic-datatable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Praktikum</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($get_jadwal as $jadwal) : ?>
                                <tr>
                                    <td><?= $jadwal['judul'] ?></td>
                                    <td class="text-center"><?= $jadwal['tanggal'] ?></td>
                                    <td class="text-center"><?= $jadwal['jam'] ?></td>
                                    <td class="text-center">
                                        <button type="button" id="id_jadwal" data-idjadwal="<?= $jadwal['id'] ?>" class="btn btn-success idjadwal" data-dismiss="modal"><i class="fe-plus"></i> Pilih</button>
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
    </div>

    <?php echo $this->load->view('template/footer'); ?>
    <script>
        $('.idjadwal').on('click', function(e) {
            var idjadwal = $(this).data('idjadwal');

            $.ajax({
                url: "<?= base_url('informasi/tambah_informasi_detail') ?>",
                type: 'post',
                data: {
                    idjadwal: idjadwal
                },
                success: function() {
                    document.location.href = "<?= base_url('informasi/tambah') ?>";
                }
            })
        })

        $('.session').on('click', function(e) {
            var informasiid = $(this).data('informasiid');

            $.ajax({
                url: "<?= base_url('informasi/hapus_informasi_session') ?>",
                type: 'post',
                data: {
                    informasiid: informasiid
                },
                success: function() {
                    document.location.href = "<?= base_url('informasi/tambah') ?>";
                }
            })
        })
    </script>