<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- App css -->
    <link href="<?= base_url('assets/backend/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <style>
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/opensans/v29/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVc.ttf) format('truetype');
        }

        .title {
            font-family: arial;
        }

        body {
            padding: 20px 0;
            background: #ccc;
        }

        .bg-sertifikat {
            position: relative;
            width: 900px;
            height: 670px;
            padding: 0px;
            background-color: #FFFFFF;
            color: #333;
            font-family: 'Open Sans', sans-serif;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .img-sertifikat {
            position: relative;
            height: 670px;
            padding: 0px;
            background-image: url('<?= base_url() ?>assets/backend/images/curve.svg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat, repeat;
        }

        .horizontal-center {
            /*mengatur border bagian kiri tag div */
            border-bottom: 2px solid black;
            /* mengatur tinggi tag div*/
            height: 2px;
            /*mengatur lebar tag div*/
            width: auto;
        }

        @media print {
            @page {
                size: 330mm 210mm;
                margin: 20px;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                /*Chrome, Safari */
                color-adjust: exact !important;
                /*Firefox*/
            }
        }
    </style>
</head>

<body>
    <div class="container bg-sertifikat text-center">
        <div class="img-sertifikat p-3">
            <div class="row">
                <div class="col-md-2">

                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/backend/images/logo-2.svg') ?>" alt="" width="45px">
                        </div>

                        <div class="col-md-8">
                            <h4 class="title">Yayasan Tociung Luwu</h4>
                            <h3 class="title">UNIVERSTIAS ANDI DJEMMA</h3>
                        </div>

                        <div class="col-md-2">
                            <img src="<?= base_url('assets/backend/images/logo-1.svg') ?>" alt="" width="60px">
                        </div>

                    </div>
                    <div class="horizontal-center"></div>
                </div>

                <div class="col-md-2">

                </div>
            </div>
            <?php
            $nilai_hardware  = $this->db->get_where('tb_nilai_h', ['id' => $get_sertifikat['nilai_hard_id']])->row_array();
            $register_dua = $this->db->get_where('tb_register', ['nim' => $nilai_hardware['nim']])->row_array();
            $kategori_lab_dua  = $this->db->get_where('tb_kategori_register', ['id' => $nilai_hardware['kategori_lab']])->row_array();
            $kategori_praktikum_dua  = $this->db->get_where('tb_kategori_praktikum', ['id' => $nilai_hardware['kategori_praktikum_id']])->row_array();

            $nilai_soft  = $this->db->get_where('tb_nilai_s', ['id' => $get_sertifikat['nilai_soft_id']])->row_array();
            $register_satu = $this->db->get_where('tb_register', ['nim' => $nilai_soft['nim']])->row_array();
            $kategori_lab_satu  = $this->db->get_where('tb_kategori_register', ['id' => $nilai_soft['kategori_lab']])->row_array();
            $kategori_praktikum_satu  = $this->db->get_where('tb_kategori_praktikum', ['id' => $nilai_soft['kategori_praktikum_id']])->row_array();
            ?>
            <div class="row">
                <div class="col-lg">
                    <p>
                    <h1 class="text-danger pb-0"><strong>SERTIFIKAT</strong></h1>
                    <strong class="font-17">NO. <?= $get_sertifikat['no_sertifikat'] ?>/LAB-ELEKTRO/TI/<?= date("Y") ?></strong>
                    <br>
                    <strong>DIBERIKAN KEPADA :</strong>
                    <br>
                    <br>
                    <?php if ($get_sertifikat['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                        <strong class="mt-2"><?= $register_dua['nama'] ?></strong>
                    <?php elseif ($get_sertifikat['nilai_soft_id'] == $nilai_soft['id']) : ?>
                        <strong class="mt-2"><?= $register_dua['nama'] ?></strong>
                    <?php endif; ?>
                    </p>
                    <p class="text-center">Sebagai peserta <strong class="text-danger">
                            <?php if ($get_sertifikat['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                                <?= $kategori_praktikum_dua['kategori'] ?>
                            <?php elseif ($get_sertifikat['nilai_soft_id'] == $nilai_soft['id']) : ?>
                                <?= $kategori_praktikum_satu['kategori'] ?>
                            <?php endif; ?>

                        </strong> yang diselenggarakan oleh Laboratorium

                        <?php if ($get_sertifikat['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                            <?= $kategori_lab_dua['kategori'] ?>
                        <?php elseif ($get_sertifikat['nilai_soft_id'] == $nilai_soft['id']) : ?>
                            <?= $kategori_lab_satu['kategori'] ?>
                            <?php endif; ?>,

                            <br> Program Studi Teknik Informatika, Fakultas Teknik, Universitas Andi Djemma, dari tanggal <?= $get_sertifikat['created_at'] ?> <br> s/d <?= date('d M Y') ?> dan memperoleh nilai
                    </p>
                    <?php if ($get_sertifikat['nilai_hard_id'] == $nilai_hardware['id']) : ?>
                        <?php if ($nilai_hardware['nilai_uas'] >= 50) : ?>
                            <h1><strong>"SANGAT MEMUASKAN"</strong></h1>
                        <?php else : ?>
                            <h1><strong>"MENGECEWAKAN"</strong></h1>
                        <?php endif; ?>
                    <?php elseif ($get_sertifikat['nilai_soft_id'] == $nilai_soft['id']) : ?>
                        <?php if ($nilai_soft['nilai_uas'] >= 50) : ?>
                            <h1><strong>"SANGAT MEMUASKAN"</strong></h1>
                        <?php else : ?>
                            <h1><strong>"MENGECEWAKAN"</strong></h1>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <p><small>KETUA PROGRAM STUDI</small></p>
                            <br>
                            <br>
                            <div class="horizontal-center"></div>
                            <P><small class="text-center">Ahamad Ali Hakam Dani, S.Si., M.T.I. <br> NIDN : 0923019001</small></P>
                        </div>
                        <div class="col-md-6">
                            <p><small>KETUA PROGRAM STUDI</small> </p>
                            <br>
                            <br>
                            <div class="horizontal-center"></div>
                            <p><small class="text-center">Muhlis Muhalim, S.Kom., M.Cs. <br> NIDN : 0925018502</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window: print()
    </script>
</body>

</html>