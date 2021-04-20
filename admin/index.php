<?php 
$page = "dashboard";
?>
<?php include 'header.php' ?>

                    <div class="pcoded-content">

                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h4>Dashboard</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                    $user = mysqli_query($koneksi,"SELECT * FROM tb_user");
                    $perusahaan = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan");
                    $lowongan = mysqli_query($koneksi,"SELECT * FROM tb_lowongan");
                    $simpan = mysqli_query($koneksi,"SELECT * FROM tb_simpan");
                    ?>
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card prod-p-card card-red">
                                                    <div class="card-body">
                                                        <div class="row align-items-center m-b-30">
                                                            <div class="col">
                                                                <h6 class="m-b-5 text-white">Pelamar</h6>
                                                                <h3 class="m-b-0 f-w-700 text-white"><?= mysqli_num_rows($user); ?></h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-users text-c-red f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="m-b-0 text-white"><span
                                                                class="label label-danger m-r-10">Terbaru</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card prod-p-card card-blue">
                                                    <div class="card-body">
                                                        <div class="row align-items-center m-b-30">
                                                            <div class="col">
                                                                <h6 class="m-b-5 text-white">Perusahaan</h6>
                                                                <h3 class="m-b-0 f-w-700 text-white"><?= mysqli_num_rows($perusahaan); ?></h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-building text-c-blue f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="m-b-0 text-white"><span
                                                                class="label label-primary m-r-10">Terbaru</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card prod-p-card card-green">
                                                    <div class="card-body">
                                                        <div class="row align-items-center m-b-30">
                                                            <div class="col">
                                                                <h6 class="m-b-5 text-white">Lowongan Kerja</h6>
                                                                <h3 class="m-b-0 f-w-700 text-white"><?= mysqli_num_rows($lowongan); ?></h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-user-plus text-c-green f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="m-b-0 text-white"><span
                                                                class="label label-success m-r-10">Terbaru</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card prod-p-card card-yellow">
                                                    <div class="card-body">
                                                        <div class="row align-items-center m-b-30">
                                                            <div class="col">
                                                                <h6 class="m-b-5 text-white">Tersimpan</h6>
                                                                <h3 class="m-b-0 f-w-700 text-white"><?= mysqli_num_rows($simpan); ?></h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-tags text-c-yellow f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="m-b-0 text-white"><span
                                                                class="label label-warning m-r-10">Terbaru</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>
