<?php 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN - USER</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css">

    <link rel="stylesheet" href="admin/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="admin/css/feather.css">

    <link rel="stylesheet" type="text/css" href="admin/css/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="admin/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="admin/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="pages.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body style="background-color: #e1e5e9;">

    <section class="login-block">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <form class="md-float-material form-material" method="post" action="">

                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary mt-3">DAFTAR USER </h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="nama" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Nama Lengkap</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Email</label>
                                </div>
                                
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="passwordkonfir" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Konfirmasi Password</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="signup" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">DAFTAR SEKARANG </button>
                                        <div class="forgot-phone text-center">
                                        <span class="small"> Sudah Punya Akun ?</span> <a href="loginn.php" class="text-primary"> Login</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                                <div class="small text-center mt-5 text-secondary"> Copyright &copy; E-LOKER 2021</div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        </div>

    </section>



    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/jquery.min.js"></script>
    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/jquery-ui.min.js"></script>
    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/popper.min.js"></script>
    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/bootstrap.min.js"></script>

    <script src="admin/js/waves.min.js" type="4878d7dfa7bc22a8dfa99416-text/javascript"></script>

    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/jquery.slimscroll.js"></script>

    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/modernizr.js"></script>
    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/css-scrollbars.js"></script>
    <script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="admin/js/common-pages.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="4878d7dfa7bc22a8dfa99416-text/javascript"></script>
    <script type="4878d7dfa7bc22a8dfa99416-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="admin/js/rocket-loader.min.js" data-cf-settings="4878d7dfa7bc22a8dfa99416-|49" defer=""></script>
</body>

</html>

<?php 

if(isset($_POST['signup'])){
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $pw       = MD5($_POST['passwordkonfir']);
    $password = MD5($_POST['password']);
    include 'koneksi.php';
    $cek      = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email'");
    if(mysqli_num_rows($cek) > 0 ){
        header('location:signup.php?pesan=emailsudahada');
    }else{
        if($pw == "$password"){
            $sql = mysqli_query($koneksi,"INSERT INTO tb_user (nama_user,email,password) VALUES('$nama','$email','$password')");
            if($sql){
                header('location:loginn.php?pesan=berhasil');
            }else{
                header('location:signup.php?pesan=gagal');
            }
        }else{
            header('location:signup.php?pesan=passwordsalah');
        }
        
    }
}
?>