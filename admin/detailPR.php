<?php 
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
        $cek12   = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan WHERE id_perusahaan='$_SESSION[id]'");
        $assoc = mysqli_fetch_assoc($cek12); 
}
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan WHERE id_perusahaan='$id'");
$d    = mysqli_fetch_assoc($data);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perusahaan</title>
</head>
<body>
    <h4>Detail Perusahaan</h4>
    <table>
        <tr>
            <td> Nama Perusahaan </td>
            <td> <?= $d['nama_perusahaan']; ?></td>
        </tr>
        <tr>
            <td>Logo</td>
            <td><img src="img/perusahaan/<?= $d['logo'] ?>" height="70" alt=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td> <?= $d['email']; ?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?= $d['id_kategori']; ?></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><?= nl2br($d['deskripsi']); ?></td>
        </tr>
        <tr>
            <td>Ijin Perusahaan</td>
            <td><?= $d['ijin_perusahaan']; ?></td>
        </tr>
        <tr>
            <td> Lokasi  </td>
            <td><?= $d['lokasi_perusahaan']; ?></td>
        </tr>
        <tr>
            <td>Jumlah Lowongan</td>
            <td><?= $d['lowongan'] ?> Orang</td>
        </tr>
        <tr>
            <td></td>
            <td><a href="index.php"> Kembali </a></td>
        </tr>
    </table>
    </form>
</body>
</html>