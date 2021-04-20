<?php 
include '../koneksi.php';
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    $login = "belum";
}else{
    $login = "sudah";
}
if(isset($_GET['cari'])){
    $nama     = $_GET['nama'];
    $kategori = $_GET['kategori'];
    $nearby   = $_GET['nearby'];
    if($nearby == "" && $kategori == "" && $nama == ""  ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan");
    }elseif($nearby !== "" && $kategori !== "" && $nama !== ""  ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_perusahaan.lokasi_perusahaan='$nearby' AND tb_perusahaan.nama_perusahaan='$nama' AND tb_kategori.kategori='$kategori'");
    }elseif($nearby == "" && $kategori == "" ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_perusahaan.nama_perusahaan='$nama'");
    }elseif($nama == "" && $nearby == "" ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_kategori.kategori='$kategori'");
    }elseif($nama == "" && $kategori == "" ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_perusahaan.lokasi_perusahaan='$nearby'");
    }elseif($nearby == ""){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_perusahaan.nama_perusahaan='$nama' AND tb_kategori.kategori='$kategori'");
    }elseif($kategori == ""){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_perusahaan.lokasi_perusahaan='$nearby' AND tb_perusahaan.nama_perusahaan='$nama'");
    }elseif($nama == ""){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan WHERE tb_perusahaan.lokasi_perusahaan='$nearby' AND tb_kategori.kategori='$kategori'");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Admindek | Admin Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="assets/css/feather.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="assets/css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/widget.css">
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <link rel="stylesheet" href="build/css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index.html">
                            E-LOKER
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!"
                                    onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                                    class="waves-effect waves-light" data-cf-modified-799ddc403e80b1cc26e7d64d-="">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <?php if( $login == "sudah" ){ ?>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="../images/person_1.jpg"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">kelengkapan Profil Anda 20%</h5>
                                                    <p class="notification-msg">Lengkapi profil anda untuk menarik lebih
                                                        banyak perekrut</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../assets/images/person_1.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>Steve Jobs</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Pengaturan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-sign-in-social.html">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </nav>


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar">
                            <ul class="pcoded-item">
                                <?php if( $login  ==  "belum"){ ?>
                                <li class="">
                                    <a href="../loginn.php?pesan=logindulu" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="../loginn.php?pesan=logindulu" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                        <span class="pcoded-mtext">Lowongan Tersimpan</span>
                                        <span class="badge bg-c-red text-white">1</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="pcoded-content">
    
                            <div class="page-header card">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            <i class="feather icon-clipboard bg-c-blue"></i>
                                            <div class="d-inline">
                                                <h5>Lowongan Kerja Terbaru di <span class="font-weight-bold"><?= $kategori; ?></span></h5>
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
                                                <li class="breadcrumb-item"><a href="#!">Lowongan Kerja</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
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
                                                                while($d = mysqli_fetch_array($sql)){
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
                                                                            <a href="#" class="btn btn-outline-secondary btn-sm px-3"><i style="font-size: 16px; margin-left:5px;" class="far fa-bookmark"></i></a>
                                                                        </div>
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