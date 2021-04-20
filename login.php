<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>

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

                    <form class="md-float-material form-material" method="post" action="cek_login.php">

                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary mt-3">LOGIN</h3>
                                        <?php if(isset($_GET["pesan"])):
                                            if($_GET["pesan"] == "salah"): ?>
                                                <div class="alert alert-danger bg-danger text-white m-t-30" role="alert">
                                                    Email / Password Salah
                                                    <small class="float-right text-info"><a href="login.php" class="text-info">Close</a></small>
                                                </div>
                                                <?php
                                            endif;
                                        endif; ?>
                                        <?php if(isset($_GET["pesan"])):
                                            if($_GET["pesan"] == "chaptca"): ?>
                                                <div class="alert alert-danger bg-danger text-white m-t-30" role="alert">
                                                    CAPTCHA salah. Coba lagi
                                                    <small class="float-right text-info"><a href="login.php" class="text-info">Close</a></small>
                                                </div>
                                                <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Email</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="inputState">Role </label>
                                    <select id="inputState" name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="perusahaan">Perusahaan</option>
                                    </select>
                                </div>
                                <div class="form-group" style="text-align:center;">
                                <center>
                                    <div class="g-recaptcha text-center" data-sitekey="6LdWTK0aAAAAAAXXBo_R41M9LbNsxCinW_tru2mf"></div>
                                </center>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="small text-center mt-5 text-secondary"> Copyright &copy; <a href="index.php" class="text-secondary">E-LOKER</a> 2021</div>
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

<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <table>
        <tr>
            <td> Email </td>
            <td> <input type="email" name="email" id=""> </td>
        </tr>
        <tr>
            <td> Password </td>
            <td> <input type="password" name="password" id=""> </td>
        </tr>
        <tr>
            <td> Role </td>
            <td> <select name="role" id="">
                <option value="admin"> Admin </option>
                <option value="perusahaan"> Perusahaan </option>
            </select> </td>
        </tr>
        <tr>
            <td></td>
            <td><button name="login" type="submit"> Login </button></td>
        </tr>
    </table>
    </form>
</body>
</html> -->
