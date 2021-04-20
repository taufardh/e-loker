<?php 
include '../koneksi.php';
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    header('location:../loginn.php?pesan=belumlogin');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - E - LOKER</title>
</head>
<body>
    <h4> <?= $_SESSION['email']; ?> </h4>
    <a href="profil.php"> <button> Lengkapi Profil </button> </a>
    <br> <br>
    <h5 style="float:right;"> <a href="logout.php"> <button type="submit"> Logout </button> </a> </h5>
    <!-- Form Input search -->
    <form action="" method="get">
    <select name="nama" id="">
        <option value=""> -- Pilih Perusahaan -- </option>
        <?php 
        $d1 = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan"); 
        while($d11 = mysqli_fetch_array($d1)){
            echo "<option value='$d11[nama_perusahaan]'> $d11[nama_perusahaan] </option>";
        } ?>
    </select>
    <select name="kategori" id="">
        <option value=""> -- Pilih Kategori --</option>
        <?php 
        $d2 = mysqli_query($koneksi,"SELECT * FROM tb_kategori"); 
        while($d22 = mysqli_fetch_array($d2)){
            echo "<option value='$d22[kategori]'> $d22[kategori] </option>";
        } ?>
    </select>
    <select name="nearby" id="">
        <option value=""> -- Pilih Nearby </option>
        <?php 
        $d3 = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan"); 
        while($d33 = mysqli_fetch_array($d3)){
            echo "<option value='$d33[lokasi_perusahaan]'> $d33[lokasi_perusahaan] </option>";
        } ?>
    </select>
    <button type="submit" name="cari"> Cari </button>
    </form>
    <!-- End Input Form Search -->

    <!-- Tabel yang sudah di cari -->
    <table border="1">
        <tr>
            <td>No</td>
            <td>Logo</td>
            <td>Nama Perusahaan</td>
            <td>Kategori</td>
            <td>Lokasi</td>
            <td>Jumlah Lowongan</td>
            <td>Opsi</td>
        </tr>

        <?php 
            if(isset($_GET['cari'])){
                $nama     = $_GET['nama'];
                $kategori = $_GET['kategori'];
                $nearby   = $_GET['nearby'];
                if($nearby == "" && $kategori == "" && $nama == ""  ){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori ");
                }elseif($nearby !== "" && $kategori !== "" && $nama !== ""  ){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.lokasi_perusahaan='$nearby' AND tb_perusahaan.nama_perusahaan='$nama' AND tb_kategori.kategori='$kategori'");
                }elseif($nearby == "" && $kategori == "" ){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.nama_perusahaan='$nama'");
                }elseif($nama == "" && $nearby == "" ){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_kategori.kategori='$kategori'");
                }elseif($nama == "" && $kategori == "" ){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.lokasi_perusahaan='$nearby'");
                }elseif($nearby == ""){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.nama_perusahaan='$nama' AND tb_kategori.kategori='$kategori'");
                }elseif($kategori == ""){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.lokasi_perusahaan='$nearby' AND tb_perusahaan.nama_perusahaan='$nama'");
                }elseif($nama == ""){
                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.lokasi_perusahaan='$nearby' AND tb_kategori.kategori='$kategori'");
                }    
                $no = 1;
                while($d = mysqli_fetch_array($sql)){?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td><img height="70" src="../admin/img/perusahaan/<?= $d['logo'] ?>" alt=""></td>
                    <td> <?= $d['nama_perusahaan']; ?> </td>
                    <td><?= $d['kategori']; ?></td>
                    <td><?= $d['lokasi_perusahaan']; ?></td>
                    <td><?= $d['lowongan']; ?> Orang</td>
                    <td><a href="lamar.php?id=<?= $d['id_perusahaan'] ?>"><button>Kirim Lamaran</button></a></td>
                </tr>
            <!-- Jika tidak ada input -->
                <?php }   
            }else{
                $no = 1;
                $query = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori ");
                while($d = mysqli_fetch_array($query)){
            ?>
            <tr align="center">
                <td><?= $no++; ?></td>
                <td><img height="70" src="../admin/img/perusahaan/<?= $d['logo'] ?>" alt=""></td>
                <td> <?= $d['nama_perusahaan']; ?> </td>
                <td><?= $d['kategori']; ?></td>
                <td><?= $d['lokasi_perusahaan']; ?></td>
                <td><?= $d['lowongan']; ?> Orang</td>
                <td><a href="lamar.php?id=<?= $d['id_perusahaan'] ?>"> <button>Kirim Lamaran</button> </a></td>
            </tr>        
            <?php
            }
            ?>
            <!-- End Jika tidak ada input -->
        <?php } ?>
    </table>
    <!-- End Table  -->
</body>
</html>