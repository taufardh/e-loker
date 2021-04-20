<?php 
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM tb_lamaran WHERE id_lamaran='$id'");
$s   = mysqli_fetch_assoc($sql);
$file = "../user/lamaran/$s[file]";
header('Content-type:application/pdf');
header('Content-Disposition: inline;');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file);