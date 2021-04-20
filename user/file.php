<?php 
include '../koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM tb_tanggapan WHERE id_tanggapan='$id'");
$s   = mysqli_fetch_assoc($sql);
$file = "../admin/tanggapan/$s[tanggapan]";
header('Content-type:application/pdf');
header('Content-Disposition: inline;');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file);