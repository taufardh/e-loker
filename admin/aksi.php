<?php 
include '../koneksi.php';
if(isset($_GET['auction'])){
    if($_GET['auction'] == "on"){
        $id = $_GET['id'];
        mysqli_query($koneksi,"UPDATE tb_lowongan SET status='buka' WHERE id_lowongan='$id'");
        header('location:lowongan.php?pesan=ditutup');
    }elseif($_GET['auction'] == "off"){
        $id = $_GET['id'];
        mysqli_query($koneksi,"UPDATE tb_lowongan SET status='tutup' WHERE id_lowongan='$id'");
        header('location:lowongan.php?pesan=dibuka');
    }
}
if(isset($_GET['action'])){
    if($_GET['action'] == "tolak"){
        $id_l = $_GET['id'];
        $date = date('Y-m-d');
        $sqli = mysqli_query($koneksi,"UPDATE tb_lamaran SET status='selesai',tanggal_selesai='$date' WHERE id_lamaran='$id_l' ");
        header('location:tanggapan.php?pesan=tolak');
    }
}
?>