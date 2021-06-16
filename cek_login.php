<?php 
include 'koneksi.php';
if(isset($_POST['login'])){
    $email    = $_POST['email'];
    $password = MD5($_POST['password']);
    $role     = $_POST['role'];

    // $secret_key = "6LdWTK0aAAAAAOgJqwpDuSAX8o_rF5mQY_YLum1j";
    // $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
    // $response = json_decode($verify);
    // if($response -> success){
        if($role == "admin"){
            $cek = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE email='$email' AND password='$password'");
            $assoc = mysqli_fetch_assoc($cek);
            if(mysqli_num_rows($cek) > 0 ){
                ob_start();
                session_start();
                $_SESSION['id']   = "$assoc[id]"; 
                $_SESSION['role'] = "admin";
                header('location:admin/index.php');
            }else{
                header('location:login.php?pesan=salah');
            }
        }elseif($role == "perusahaan"){
            $cek1  = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan WHERE email='$email' AND password='$password'");
            $assoc1 = mysqli_fetch_assoc($cek1);
            if(mysqli_num_rows($cek1) > 0 ){
                ob_start();
                session_start();
                $_SESSION['id']   = "$assoc1[id_perusahaan]";
                $_SESSION['role'] = "perusahaan";
                header('location:admin/index.php');
            }else{
                header('location:login.php?pesan=salah');
            }
        }
    // }else{
    //     header('location:login.php?pesan=chaptca');
    // }

    
}

if(isset($_POST['loginuser'])){
    include 'koneksi.php';
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $cek = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email' AND password='$password'");
    // $secret_key = "6LdWTK0aAAAAAOgJqwpDuSAX8o_rF5mQY_YLum1j";
    // $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
    // $response = json_decode($verify);
    // if($response -> success){
        if(mysqli_num_rows($cek) > 0 ){
            ob_start();
            session_start();
            $_SESSION['email'] = "$email";
            $_SESSION['login'] = "login";
            header('location:user/index.php');
        }else{
            header('location:loginn.php?pesan=passwordatauemailsalah');
        }
    // }else{
    //     header('location:loginn.php?pesan=chaptcha');
    // }
    
}
?>