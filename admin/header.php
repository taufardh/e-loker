<?php 
ob_start();
include '../koneksi.php';
session_start();
if(!isset($_SESSION['role'])){
    header('location:../login.php?pesan=belumlogin');
}

if($_SESSION['role'] == "admin"){
        $role  = "admin";
        $cek12   = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id='$_SESSION[id]'");
        $assoc = mysqli_fetch_assoc($cek12);
    }else{
        $role  = "perusahaan";
        $cek12   = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.id_perusahaan='$_SESSION[id]'");
        $assoc = mysqli_fetch_assoc($cek12); 
}


?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title> E - LOKER | <?= ucfirst($role); ?></title>
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/feather.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome-n.min.css">

    <link rel="stylesheet" href="css/chartist.css" type="text/css" media="all">    
    <link rel="stylesheet" type="text/css" href="css/datatables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.datatables.min.css">


    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">
</head>
<style>
    .jumbotron{
        background-image:url(img/perusahaan/cover3.jpg);
    }
</style>
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
                        <a href="dashboard.html">
                            <!-- <img class="img-fluid" src="png/logo.png" alt="Theme-Logo" /> -->
                            E - LOKER 
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
                            <li>
                                <a href="#!"
                                    onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                                    class="waves-effect waves-light" data-cf-modified-2d8d78e876b340f9029c575b-="">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                            <?php if($_SESSION['role'] !== 'admin'){ ?>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">1</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Pemberitahuan</h6>
                                            <label class="label label-danger">baru</label>
                                        </li>
                                        <?php 
                                        $tgp = mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_lamaran ON tb_user.id_user=tb_lamaran.id_user INNER JOIN tb_lowongan ON tb_lamaran.id_lowongan=tb_lowongan.id_lowongan WHERE tb_lowongan.id_perusahaan='$assoc[id_perusahaan]'"); 
                                        while($t = mysqli_fetch_array($tgp)){ ?>
                                        <li>
                                            <div class="media">
                                                <?php if( $t['ft_profil'] == "" ){
                                                    echo "<img alt='User-profile-image' class='img-radius' src='../user/img/ft_profil/avatar.jpg'>";
                                                }else{
                                                    echo "<img alt='User-profile-image' class='img-radius' src='../user/img/ft_profil/$t[ft_profil]'>";
                                                } ?>
                                                <div class="media-body">
                                                    <h5 class="notification-user"> <?= $t['nama_user']; ?></h5>
                                                    <p class="notification-msg"> Mengirimkan sebuah surat lamaran untuk mengisi posisi <b style="font-weight:bold;" class="text-weight-bold"><?= $t['posisi']; ?></b> </p>
                                                    <span class="notification-time"><?= $t['tanggal_lamar']; ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <li>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if($_SESSION['role'] !== 'admin'){
                                        echo "<img src='img/perusahaan/$assoc[logo]' class='img-radius' alt='User-Profile-Image'>";    
                                    }else{
                                        echo "<img src='../user/img/ft_profil/avatar.jpg' class='img-radius' alt='User-Profile-Image'>";
                                    } ?>    
                                    
                                        <span>
                                        <?php
                                    if($_SESSION['role'] !== 'admin'){
                                        echo " $assoc[nama_perusahaan] ";
                                    }else{
                                        echo " $assoc[nama] ";
                                    } ?>
                                        </span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        
                                        <li>
                                            <a href="ubahPW.php">
                                                <i class="feather icon-settings"></i> Ganti Password
                                            </a>
                                        </li>
                                        <li>
                                            <a href="logout.php">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Fitur</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li <?php if($page == "dashboard") echo "class='active'"; ?>>
                                        <a href="index.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                    <?php if($_SESSION['role'] == 'admin'){
                                    ?>
                                    <li <?php if($page == "role") echo "class='active'"; ?>>
                                        <a href="role.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-user"></i>
                                            </span>
                                            <span class="pcoded-mtext">Role User</span>
                                        </a>
                                    </li>    
                                    <li class="<?php if($page == "laporan") echo "active"; ?>">
                                        <a href="pendaftaran.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-file"></i>
                                            </span>
                                            <span class="pcoded-mtext">Laporan Pendaftaran</span>
                                        </a>
                                    </li>
                                    <li class="<?php if($page == "perusahaan") echo "active"; ?>">
                                        <a href="data.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-briefcase"></i>
                                            </span>
                                            <span class="pcoded-mtext">Data Perusahaan</span>
                                        </a>
                                    </li>
                                    <li class="<?php if($page == "kategori") echo "active"; ?>">
                                        <a href="kategori.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-briefcase"></i>
                                            </span>
                                            <span class="pcoded-mtext">Data Kategori</span>
                                        </a>
                                    </li>
                                    <li class="<?php if($page == "posisi") echo "active"; ?>">
                                        <a href="posisi.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-briefcase"></i>
                                            </span>
                                            <span class="pcoded-mtext">Data Posisi</span>
                                        </a>
                                    </li>
                                    <li class="<?php if($page == "lokasi") echo "active"; ?>">
                                        <a href="lokasi.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-briefcase"></i>
                                            </span>
                                            <span class="pcoded-mtext">Data Lokasi</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if($_SESSION['role'] == 'perusahaan'){
                                        ?>
                                    <li class="<?php if($page == "profil") echo "active"; ?>">
                                        <a href="profile.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-edit"></i>
                                            </span>
                                            <span class="pcoded-mtext">Profil Perusahaan</span>
                                        </a>
                                    </li>    
                                    <li class="<?php if($page == "loker") echo "active"; ?>">
                                        <a href="lowongan.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-plus"></i>
                                            </span>
                                            <span class="pcoded-mtext">Lowongan Kerja</span>
                                        </a>
                                    </li>
                                    <li class="<?php if($page == "tanggapan") echo "active"; ?>">
                                        <a href="tanggapan.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-edit-1"></i>
                                            </span>
                                            <span class="pcoded-mtext">Tanggapan</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    