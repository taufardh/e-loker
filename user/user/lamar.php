<?php 
include '../koneksi.php';
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    header('location:../loginn.php?pesan=belumlogin');
}
$id_user = $_SESSION['email'];
$data    = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$id_user'");
$assoc   = mysqli_fetch_assoc($data); 
$id = $_GET['id'];
$perusahaan = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.id_perusahaan='$id'");
$p = mysqli_fetch_assoc($perusahaan);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamar Perusahaan </title>
</head>
<body>
    <h2> Data Perusahaan </h2>
    <table>
        <form action="" enctype="multipart/form-data" method="post">
            <tr>
                <td>Logo</td>
                <input type="hidden" name="id_user" value="<?= $assoc['id_user'] ?>">
                <input type="hidden" name="id_perusahaan" value="<?= $id ?>">
                <td><img src="../admin/img/perusahaan/<?= $p['logo'] ?>" height="70" alt=""></td>
            </tr>
            <tr>
                <td>Nama Perusahaan</td>
                <td><?= $p['nama_perusahaan']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $p['email']; ?></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><?= $p['kategori']; ?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><?= nl2br($p['deskripsi']); ?></td>
            </tr>
            <tr>
                <td>Ijin Perusahaaan</td>
                <td><?= $p['ijin_perusahaan']; ?></td>
            </tr>
            <tr>
                <td>Lokasi Perusahaan</td>
                <td><?= nl2br($p['lokasi_perusahaan']); ?></td>
            </tr>
            <tr>
                <td>Jumlah Lowongan</td>
                <td><?= $p['lowongan']; ?> Orang</td>
            </tr>
            <tr>
                <td>Kirim Lamaran</td>
                <td><input type="file" name="file" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="kirim">Kirim</button></td>
            </tr>
        </form>
    </table>
</body>
</html>
<?php 
if(isset($_POST['kirim'])){
    $id_user = $_POST['id_user'];
    $id_perusahaan = $_POST['id_perusahaan'];
    
    $ekstensi1 = array('png','jpeg','jpg','pdf');
    $namafile  = $_FILES['file']['name'];
    $x         = explode('.', $namafile);
    $ekstensi  = strtolower(end($x));
    $rand        = rand();
    $ukuran    = $_FILES['file']['size'];
    $file_tmp  = $_FILES['file']['tmp_name'];
        if(in_array($ekstensi, $ekstensi1) === true){
            if($ukuran < 1044070){
                $xx = $rand.'_'.$namafile;
                move_uploaded_file($file_tmp, 'lamaran/'.$rand.'_'.$namafile);
                $upload = mysqli_query($koneksi,"INSERT INTO tb_lamaran (id_user,id_perusahaan,file,tanggal_lamar,waktu_lamar) VALUES('$id_user','$id_perusahaan','$xx','$date','$time')");
                if($upload){
                    header('location:index.php?pesan=berhasil');
                }else{
                    header('location:lamar.php?pesan=gagal');
                }
             }else{
                 header('location:lamar.php?pesan=ukuranteraubesar');
             }
        }else{
            header('location:lamar.php?pesan=bukanimg/file');
        }
}

?>