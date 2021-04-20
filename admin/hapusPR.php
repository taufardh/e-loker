<?php 
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi,"DELETE FROM tb_perusahaan WHERE id_perusahaan='$id'");
if($sql){
    header('location:data.php?pesan=hapus');
}else{
    header('location:data.php?pesan=gagald');
}
?>