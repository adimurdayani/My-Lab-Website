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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                    <i class="fe-users font-22 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1"><span data-plugin="counterup" id="totalmahasiswa">0</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Mahasiswa</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-log-in font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup" id="totalregister"><?= $get_total_regis; ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Register</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-check-circle font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $pengunjung_online ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Visitor Online</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                    <i class="fe-eye font-22 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $total_pengunjung ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Visitor</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-lg-8">
                    <div class="card-box pb-2">

                        <h4 class="header-title mb-3">Statistik User</h4>

                        <div dir="ltr">
                            <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card-box pb-2">
                        <div class="card-widgets">
                            <a data-toggle="collapse" href="#cardCollpase8" role="button" aria-expanded="false" aria-controls="cardCollpase8"><i class="mdi mdi-minus"></i></a>
                            <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                        </div>
                        <h4 class="header-title mb-0">Browser User</h4>

                        <div id="cardCollpase8" class="collapse pt-3 show" dir="ltr">
                            <div id="apex-bar-1" class="apex-charts" data-colors="#1abc9c"></div>
                        </div> <!-- collapsed end -->
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 class="header-title mb-3">Daftar akun</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="2">Profile</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Aktivasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_register as $h) : ?>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="<?= base_url('assets/backend/') ?>images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 font-weight-normal"><?= $h->nama ?></h5>
                                                <p class="mb-0 text-muted"><small><?= $h->nim ?></small></p>
                                            </td>

                                            <td>
                                                <?= $h->phone ?>
                                            </td>

                                            <td>
                                                <?= $h->email ?>
                                            </td>

                                            <td>
                                                <?php if ($h->active == 1) : ?>
                                                    <a href="javascript:void(0);" data-target="#aktivasi<?= $h->id ?>" data-toggle="modal" class="badge badge-outline-success" title="Aktivasi user" data-plugin="tippy" data-tippy-placement="top"><i class="fa fa-check"></i></a>
                                                <?php else : ?>
                                                    <a href="javascript:void(0);" data-target="#aktivasi<?= $h->id ?>" data-toggle="modal" class="badge badge-outline-danger" title="Aktivasi user" data-plugin="tippy" data-tippy-placement="top"><i class="fe-x"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

    <?php $this->load->view('template/footer'); ?>
    <?php
    //Inisialisasi nilai variabel awal
    $tanggal = "";
    $total = null;
    foreach ($get_total_hits as $item) {
        $jum = $item->hits;
        $total .= "$jum" . ", ";

        $tang = $item->date;
        $tanggal .= "'$tang'" . ", ";
    }
    ?>
    <script>
        var dataColors;
        colors = ["#1abc9c"];
        (dataColors = $("#sales-analytics").data("colors")) && (colors = dataColors.split(","));
        var chart;
        options = {
            series: [{
                name: "Total",
                type: "column",
                data: [<?= $total ?>]
            }, {
                name: "Total Pengunjung",
                type: "line",
                data: [<?= $total ?>]
            }],
            chart: {
                height: 378,
                type: "line"
            },
            stroke: {
                width: [2, 3]
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%"
                }
            },
            colors: colors,
            dataLabels: {
                enabled: !0,
                enabledOnSeries: [1]
            },
            labels: [<?= $tanggal ?>],
            xaxis: {
                type: "datetime"
            },
            legend: {
                offsetY: 7
            },
            grid: {
                padding: {
                    bottom: 20
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: .25,
                    gradientToColors: void 0,
                    inverseColors: !0,
                    opacityFrom: .75,
                    opacityTo: .75,
                    stops: [0, 0, 0]
                }
            },
            yaxis: [{
                title: {
                    text: "Range"
                }
            }]
        };

        (chart = new ApexCharts(document.querySelector("#sales-analytics"), options)).render(), $("#dash-daterange").flatpickr({
            altInput: !0,
            mode: "range",
            altFormat: "F j, y",
            defaultDate: "today"
        });
    </script>

    <?php
    //Inisialisasi nilai variabel awal
    $browser = "";
    $total_koneksi = null;
    foreach ($get_total_userkoneksi as $koneksi) {

        $brows = $koneksi->browser;
        $browser .= "'$brows'" . ", ";

        $tot_konek = $koneksi->hits;
        $total_koneksi .= "$tot_konek" . ", ";
    }
    ?>

    <script>
        colors = ["#1abc9c"];
        (dataColors = $("#apex-bar-1").data("colors")) && (colors = dataColors.split(","));
        options = {
            chart: {
                height: 380,
                type: "bar",
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            series: [{
                name: "Total",
                data: [<?= $total_koneksi ?>]
            }],
            colors: colors,
            xaxis: {
                categories: [<?= $browser ?>]
            },
            states: {
                hover: {
                    filter: "none"
                }
            },
            grid: {
                borderColor: "#f1f3fa"
            }
        };

        (chart = new ApexCharts(document.querySelector("#apex-bar-1"), options)).render();
    </script>