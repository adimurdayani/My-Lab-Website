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
                        <form action="<?= base_url('informasi/hapus_all/') ?>" method="POST" id="form-delete">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <a href="<?= base_url('informasi/tambah') ?>" class="btn btn-outline-blue"><i class="fe-plus"></i> Tambah</a>
                                    <button type="submit" class="btn btn-danger" id="hapus"><i class="fe-trash"></i> Hapus</button>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <h4 class="header-title">Data <?= $title; ?></h4>
                                <table id="basic-datatable" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chack-all"></th>
                                            <th class="text-center">Laboratorium</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Tanggal Buka</th>
                                            <th class="text-center">Tanggal Tutup</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($get_informasi as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data['id'] ?>"></td>
                                                <td><?= $data['kategori'] ?></td>
                                                <td><?= $data['keterangan'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_buka'] ?></td>
                                                <td class="text-center"><?= $data['tanggal_tutup'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('informasi/edit/') . base64_encode($data['id']) ?>" class="btn btn-outline-warning " title=" Edit informasi" data-plugin="tippy" data-tippy-placement="top"><i class="fe-edit"></i></a>
                                                    <a href="<?= base_url('informasi/hapus/') . base64_encode($data['id']) ?>" class="btn btn-outline-danger hapus" title="Hapus informasi" data-plugin="tippy" data-tippy-placement="top"><i class="fe-trash"></i> </a>
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