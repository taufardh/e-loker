<?php include 'header.php' ; ?>

                    <div class="pcoded-content">

                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h5>Lowongan Tersimpan</h5>
                                            <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Lowongan</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Lowongan Tersimpan</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="card bg-light">
                                                                    <div class="card-block text-center text-primary font-weight-bold py-5">
                                                                        <a href="lowongan.html" class="nav-link text-primary">Lihat Lowongan Lainnya</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                            <?php 
                                                            $simpan = mysqli_query($koneksi,"SELECT * FROM tb_simpan INNER JOIN tb_lowongan ON tb_simpan.id_lowongan=tb_lowongan.id_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan WHERE tb_simpan.id_user='2'"); 
                                                            while($s = mysqli_fetch_array($simpan)){ ?>
                                                                <div class="card">
                                                                    <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <img src="../admin/img/perusahaan/<?= $s['logo'] ?>" style="height: auto; width: 70px;" alt="">
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <ul>
                                                                                    <li class="font-weight-bold"><?= $s['posisi']; ?>
                                                                                    </li><br>
                                                                                    <li class="small h6"><?= $s['nama_perusahaan']; ?></li>
                                                                                    <li class="small h6"><?= $s['gaji']; ?></li>
                                                                                    <li class="small"><?= $s['lowongan']; ?> Orang</li>
                                                                                    <li>
                                                                                        <div
                                                                                            class="btn btn-outline-secondary btn-sm">
                                                                                            Lamar Sekarang</div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
    
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-block py-4">
                                                            <div class="row">
                                                                <?php 
                                                                $simpan = mysqli_query($koneksi,"SELECT * FROM tb_simpan INNER JOIN tb_lowongan ON tb_simpan.id_lowongan=tb_lowongan.id_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan WHERE tb_simpan.id_user='$a[id_user]'"); 

                                                                while($d = mysqli_fetch_array($simpan)){
                                                                ?>
                                                                <!-- CONTENT -->
                                                                <div class="col-md-2">
                                                                    <div class="text-center my-4">
                                                                        <img src="../admin/img/perusahaan/<?= $d['logo'] ?>" class="img-fluid" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <ul>
                                                                        <div class="text-center float-right">
                                                                    <a href='aksi.php?condition=unsave&idd=<?= $d['id_lowongan'] ?>&id=<?= $a['id_user'];?>' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='fa fa-star'></i></a></div>
                                                                        <li><h3 class="font-weight-bold"><?= $d['posisi']; ?></h3></li><br>
                                                                        <li><div class="h6"><a href="#" class="text-primary h6 font-weight-bold"><?= $d['nama_perusahaan']; ?></a>  – <i class="fas fa-map-marker-alt"></i> <?= $d['lokasi_perusahaan']; ?></div></li><br>
                                                                        <li><div class="font-weight-normal"><span class="text-success">IDR</span> <?= number_format("$d[gaji]", 0, ",", "."); ?> ,-</div></li><br>
                                                                        <li>
                                                                            <div>
                                                                                <?php 
                                                                                if(strlen($d['persyaratan']) > 50){
                                                                                    $kata = substr(nl2br($d['persyaratan']),0,50);
                                                                                    echo "$kata...";
                                                                                    echo "<br>";
                                                                                    echo "<a href='detail-lowongan.php?id=$d[id_lowongan]' class='text-primary'>Tampilkan Semua</a>";    
                                                                                }else{
                                                                                    echo nl2br($d['persyaratan']);
                                                                                    echo "<br>";
                                                                                    echo "<a href='detail-lowongan.php?id=$d[id_lowongan]' class='text-primary'>Tampilkan Semua</a>";    
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </li><br>
                                                                        <li>
                                                                            <div class="text-secondary"> Dipublikasi kan pada tanggal <?= $d['tanggal']; ?></div></li>
                                                                        <hr>
                                                                    </ul>
                                                                </div>
                                                                <!-- ENDCONTENT -->
                                                                <?php } ?>
                                                            </div>
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




    <script data-cfasync="false" src="assets/js/email-decode.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/jquery-ui.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/popper.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/waves.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/jquery.slimscroll.js"></script>


    <script src="assets/js/jquery.flot.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/jquery.flot.categories.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/curvedlines.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/jquery.flot.tooltip.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script src="assets/js/chartist.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script src="assets/js/amcharts.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/serial.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/light.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script src="assets/js/pcoded.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/horizontal-layout.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/custom-dashboard.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/script.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="assets/js/rocket-loader.min.js" data-cf-settings="799ddc403e80b1cc26e7d64d-|49" defer=""></script>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/menu-horizontal-static.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:37 GMT -->

</html>