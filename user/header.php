<?php 
include '../koneksi.php';
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    $login = "belum";
}else{
    $login = "sudah";
    $akun = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$_SESSION[email]'");
    $a    = mysqli_fetch_assoc($akun);
    
$alamatn = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND alamat=''");
$agaman  = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND agama=''");
$gajin   = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND gaji='0'");
$gajih = mysqli_num_rows($gajin);
$pendidikann = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND pendidikan=''");
$konsentrasin = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND konsentrasi=''");
$r_pekerjaann = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND r_pekerjaan=''");
$r_penghargaann = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND r_penghargaan=''");
$r_lesn = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND r_les=''");
$f_ktpn = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND ft_ktp=''");
$ft_profiln = mysqli_query($koneksi,"SELECT * from tb_user WHERE id_user='$a[id_user]' AND ft_profil=''");
$jum = mysqli_num_rows($alamatn) + mysqli_num_rows($pendidikann) + mysqli_num_rows($konsentrasin) + mysqli_num_rows($r_pekerjaann) + 
       mysqli_num_rows($r_penghargaann) + mysqli_num_rows($r_lesn) + mysqli_num_rows($ft_profiln) + mysqli_num_rows($agaman) + mysqli_num_rows($f_ktpn);
       $h = $jum + $gajih;
       $persen = 10 - $h;
       $persen2 = $persen * 100 / 10 ;
    
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/menu-horizontal-static.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:35 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>E-LOKER</title>


    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.assets/js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    <style>
        input[type=file] {
            display: none;
        }

        .custom-file-input {
            border: 1px solid #000;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>

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
                        <a href="../">
                            <!-- <img class="img-fluid" src="png/logo.png" alt="Theme-Logo" /> --> E-LOKER
                        </a>
                        <?php if($login == "belum"): ?>
                        <?php else: ?>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <?php endif; ?>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                        </ul>
                        <?php if($login  == "sudah" ){ ?>
                        <ul class="nav-right">

                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <?php 
                                        $tanggapan1 = mysqli_query($koneksi,"SELECT * FROM tb_tanggapan INNER JOIN tb_lowongan ON tb_tanggapan.id_lowongan=tb_lowongan.id_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan INNER JOIN tb_lamaran ON tb_lowongan.id_lowongan=tb_lamaran.id_lowongan WHERE tb_tanggapan.id_user='$a[id_user]' AND tb_lamaran.status='tanggapan'"); 
                                        $tanggapan2 = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan INNER JOIN tb_lamaran ON tb_lowongan.id_lowongan=tb_lamaran.id_lowongan WHERE tb_lamaran.id_user='$a[id_user]' AND tb_lamaran.status='selesai'"); 
                                        
                                        if($persen2 < 100){
                                            $jumlah = mysqli_num_rows($tanggapan1) + 1 + mysqli_num_rows($tanggapan2);
                                        }else{
                                            $jumlah = mysqli_num_rows($tanggapan1) + mysqli_num_rows($tanggapan2);
                                        }
                                        if($jumlah > 0 ){
                                            echo "<span class='badge bg-c-red'>$jumlah</span>";
                                        }
                                        ?>

                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Pemberitahuan</h6>
                                            <label class="label label-danger">Baru</label>
                                        </li>
                                        <li>
                                            <?php 
                                        if( $persen2 < 100 ){ ?>
                                            <div class="media">
                                                <?php 
                                                if( $a['ft_profil'] == "" ){
                                                    echo "<img class='img-radius' src='img/ft_profil/avatar.jpg' alt='Generic placeholder image'>";
                                                }else{
                                                    echo "<img class='img-radius' src='img/ft_profil/$a[ft_profil]' alt='Generic placeholder image'>";
                                                } ?>
                                                <div class="media-body">
                                                    <h5 class="notification-user">kelengkapan Profil Anda
                                                        <?= $persen2 ?>%</h5>
                                                    <p class="notification-msg">Lengkapi profil anda untuk menarik lebih
                                                        banyak perekrut</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php } ?>
                                            <?php 
                                        while($t1 = mysqli_fetch_array($tanggapan1)){ ?>
                                            <div class="media mb-2">
                                                <?php 
                                                    if( $t1['logo'] == "" ){
                                                        echo "<img class='img-radius' src='img/ft_profil/avatar.jpg' alt='Generic placeholder image'>";
                                                    }else{
                                                        echo "<img class='img-radius' src='../admin/img/perusahaan/$t1[logo]' alt='Generic placeholder image'>";
                                                } ?>
                                                <div class="media-body">
                                                    <h5 class="notification-user font-weight-bold">
                                                        <?= $t1['nama_perusahaan']; ?> </h5>
                                                    <p class="notification-msg">Menanggapi Surat Lamaran anda dan
                                                        mengirimkan sebuah surat tanggapan </p>
                                                    <p> <a class="btn btn-xs btn-primary text-white" target="_blank"
                                                            href="file.php?id=<?= $t1['id_tanggapan'] ?>"> Lihat
                                                            Tanggapan </a> </p>
                                                    <span class="notification-time"><?= $t1['tgl_tanggapan']; ?></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php } ?>
                                            <?php 
                                        while($t2 = mysqli_fetch_array($tanggapan2)){?>
                                            <div class="media mb-2">
                                                <?php 
                                                    if( $t2['logo'] == "" ){
                                                        echo "<img class='img-radius' src='img/ft_profil/avatar.jpg' alt='Generic placeholder image'>";
                                                    }else{
                                                        echo "<img class='img-radius' src='../admin/img/perusahaan/$t2[logo]' alt='Generic placeholder image'>";
                                                } ?>
                                                <div class="media-body">
                                                    <h5 class="notification-user font-weight-bold">
                                                        <?= $t2['nama_perusahaan']; ?> </h5>
                                                    <p class="notification-msg">Menolak Surat Lamaran anda </p>
                                                    <!-- <span class="notification-time"><?= $t2['tgl_tanggapan']; ?></span> -->
                                                </div>
                                            </div>
                                            <hr>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>

                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <?php if( $a['ft_profil'] == "" ){
                                            echo "<img src='img/ft_profil/avatar.jpg' class='img-radius' alt='User-Profile-Image'>";
                                        }else{
                                          echo "<img src='img/ft_profil/$a[ft_profil]' class='img-radius' alt='User-Profile-Image'>";
                                        } ?>
                                        <span><?= $a['nama_user']; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                        <li>
                                            <a href="logout.php">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <?php }else{ ?>
                            <ul class="nav-right">
                                <li><a href="../loginn.php" class="text-white">Masuk</a></li>
                                <li><a href="../signup.php" class="text-white">Daftar</a></li>
                                <li class="text-white"> | </li>
                                <li><a href="../login.php" class="text-white">Perusahaan</a></li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </nav>


            <?php if( $login  ==  "belum"){ ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">


                    <!-- <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar">
                            <ul class="pcoded-item">
                                <li class="">
                                    <a href="index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="kerja.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Lowongan Kerja</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="tersimpan.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                        <span class="pcoded-mtext">Lowongan Tersimpan</span>
                                        <?php 
                                        $cekf = mysqli_query($koneksi,"SELECT * FROM tb_simpan WHERE id_user='$a[id_user]'"); 
                                        $num = mysqli_num_rows($cekf);
                                        if($num > 0){?>
                                        <span class='badge bg-c-red text-white'><?= $num; ?></span>

                                        <?php }
                                        ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav> -->
                    <?php }else{ ?>
                    <div class="pcoded-main-container">
                        <div class="pcoded-wrapper">


                            <nav class="pcoded-navbar">
                                <div class="pcoded-inner-navbar">
                                    <ul class="pcoded-item">
                                        <li class="">
                                            <a href="index.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                                <span class="pcoded-mtext">Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="kerja.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                                <span class="pcoded-mtext">Lowongan Kerja</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="tersimpan.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                                                <span class="pcoded-mtext">Lowongan Tersimpan</span>
                                                <?php 
                                        $cekf = mysqli_query($koneksi,"SELECT * FROM tb_simpan WHERE id_user='$a[id_user]'"); 
                                        $num = mysqli_num_rows($cekf);
                                        if($num > 0){?>
                                                <span class='badge bg-c-red text-white'><?= $num; ?></span>

                                                <?php }
                                        ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <?php } ?>