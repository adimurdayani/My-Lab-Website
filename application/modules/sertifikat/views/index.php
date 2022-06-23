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
                                    <a href="<?= base_url('sertifikat/tambah') ?>" class="btn btn-outline-blue"><i class="fe-plus"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <h4 class="header-title">Data <?= $title; ?></h4>
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chack-all"></th>
                                            <th class="text-center">NIM</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Laboratorium</th>
                                            <th class="text-center">Praktikum</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($get_sertifikat as $data) :
                                            $nilai_hardware  = $this->db->get_where('tb_nilai_h', ['id' => $data['nilai_hard_id']])->row_array();
                                            $register_dua = $this->db->get_where('tb_register', ['nim' => $nilai_hardware['nim']])->row_array();
                                            $kategori_lab_dua  = $this->db->get_where('tb_kategori_register', ['id' => $nilai_hardware['kategori_lab']])->row_array();
                                            $kategori_praktikum_dua  = $this->db->get_where('tb_kategori_praktikum', ['id' => $nilai_hardware['kategori_praktikum_id']])->row_array();

                                            $nilai_soft  = $this->db->get_where('tb_nilai_s', ['id' => $data['nilai_soft_id']])->row_array();
                                            $register_satu = $this->db->get_where('tb_register', ['nim' => $nilai_soft['nim']])->row_array();
                                            $kategori_lab_satu  = $this->db->get_where('tb_kategori_register', ['id' => $nilai_soft['kategori_lab']])->row_array();
                                            $kategori_praktikum_satu  = $this->db->get_where('tb_kategori_praktikum', ['id' => $nilai_soft['kategori_praktikum_id']])->row_array();
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data['id'] ?>"></td>
                                                <td>
                                                    <?php if ($data['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                                                        <?= $register_dua['nim'] ?>
                                                    <?php endif; ?>

                                                    <?php if ($data['nilai_soft_id'] == $nilai_soft['id']) : ?>
                                                        <?= $register_satu['nim'] ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($data['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                                                        <?= $register_dua['nama'] ?>
                                                    <?php endif; ?>

                                                    <?php if ($data['nilai_soft_id'] == $nilai_soft['id']) : ?>
                                                        <?= $register_satu['nama'] ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($data['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                                                        <?= $kategori_lab_dua['kategori'] ?>
                                                    <?php endif; ?>

                                                    <?php if ($data['nilai_soft_id'] == $nilai_soft['id']) : ?>
                                                        <?= $kategori_lab_satu['kategori'] ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($data['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                                                        <?= $kategori_praktikum_dua['kategori'] ?>
                                                    <?php endif; ?>

                                                    <?php if ($data['nilai_soft_id'] == $nilai_soft['id']) : ?>
                                                        <?= $kategori_praktikum_satu['kategori'] ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('sertifikat/cetak_sertifikat/') . base64_encode($data['id']) ?>" target="_blank" class="btn btn-outline-success" title="Cetak sertifikat" data-plugin="tippy" data-tippy-placement="top"><i class="fe-printer"></i></a>
                                                    <a href="<?= base_url('sertifikat/detail/') . base64_encode($data['id']) ?>" class="btn btn-outline-info" title="Detail sertifikat" data-plugin="tippy" data-tippy-placement="top"><i class="fe-eye"></i></a>
                                                    <a href="<?= base_url('sertifikat/edit/') . base64_encode($data['id']) ?>" class=" btn btn-outline-warning" title="Edit data" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('sertifikat/hapus/') . base64_encode($data['id']) ?>" class="btn btn-outline-danger hapus" title="Hapus data" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
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