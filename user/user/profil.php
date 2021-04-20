<?php 
include '../koneksi.php';
ob_start();
session_start();
if(!isset($_SESSION['login'])){
    header('location:../loginn.php?pesan=belumlogin');
}
$datauser  = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$_SESSION[email]'");
$d        = mysqli_fetch_assoc($datauser);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil user</title>
</head>
<body>
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td><?= $d['nama_user']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $d['email']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> <?= $d['alamat']; ?> </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?= $d['ttl']; ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><?= $d['agama']; ?></td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td><?= nl2br($d['pendidikan']); ?></td>
        </tr>
        <tr>
            <td>Konsentrasi</td>
            <td><?= $d['konsentrasi']; ?></td>
        </tr>
        <tr>
            <td>Riwayat Pekerjaan</td>
            <td><?= nl2br($d['r_pekerjaan']); ?></td>
        </tr>
        <tr>
            <td>Riwayat Penghargaan</td>
            <td><?= nl2br($d['r_penghargaan']); ?></td>
        </tr>
        <tr>
            <td>Riwayat Les</td>
            <td> <?= nl2br($d['r_les']); ?> </td>
        </tr>
        <tr>
            <td>Foto Profil</td>
            <td><img height="30" src="img/ft_profil/<?= $d['ft_profil'] ?>" alt=""></td>
        </tr>
        <tr>
            <td>Foto Ktp</td>
            <td><img height="30" src="img/ft_ktp/<?= $d['ft_ktp'] ?>" alt=""></td>
        </tr>
    </table>
    <h5> Edit Profil </h5>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <input type="hidden" name="id" value="<?= $d['id_user'] ?> ">
            <td> <input type="text" name="nama" value="<?= $d['nama_user']; ?>" id=""> </td>
        </tr>
        <tr>
            <td>Email</td>
            <td> <input type="email" name="email" value="<?= $d['email']; ?>" id=""></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>  <textarea name="alamat" id="" cols="30" rows="10"><?= $d['alamat']; ?></textarea> </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td> <input type="date" name="ttl" value="<?= $d['ttl']; ?>" id=""></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><input type="text" name="agama" value="<?= $d['agama']; ?>" id=""></td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td><textarea name="pendidikan" id="" cols="30" rows="10"><?= $d['pendidikan']; ?></textarea></td>
        </tr>
        <tr>
            <td>Konsentrasi</td>
            <td> <input type="text" value="<?= $d['konsentrasi']; ?>" name="konsentrasi" id=""></td>
        </tr>
        <tr>
            <td>Riwayat Pekerjaan</td>
            <td><textarea name="r_pekerjaan" id="" cols="30" rows="10"><?= $d['r_pekerjaan']; ?></textarea></td>
        </tr>
        <tr>
            <td>Riwayat Penghargaan</td>
            <td><textarea name="r_penghargaan" id="" cols="30" rows="10"><?= $d['r_penghargaan']; ?></textarea></td>
        </tr>
        <tr>
            <td>Riwayat Les</td>
            <td>  <textarea name="r_les" id="" cols="30" rows="10"><?= $d['r_les']; ?></textarea> </td>
        </tr>
        <tr>
            <td>Foto Profil</td>
            <td><input type="file" name="ft_profil" id=""></td>
        </tr>
        <tr>
            <td>Foto Ktp</td>
            <td><input type="file" name="ft_ktp" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="edit"> Edit </button></td>
        </tr>
    </table>
    </form>
</body>
</html>
<?php 
if(isset($_POST['edit'])){
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $alamat  = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $agama  = $_POST['agama'];
    $pendidikan = $_POST['pendidikan'];
    $konsentrasi  = $_POST['konsentrasi'];
    $r_pekerjaan = $_POST['r_pekerjaan'];
    $r_penghargaan  = $_POST['r_penghargaan'];
    $r_les = $_POST['r_les'];
    $id = $_POST['id'];

    $rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename1 = $_FILES['ft_ktp']['name'];
	$ukuran1 = $_FILES['ft_ktp']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

    $filename2 = $_FILES['ft_profil']['name'];
	$ukuran2 = $_FILES['ft_profil']['size'];
	$ext = pathinfo($filename2, PATHINFO_EXTENSION);

    $sql1 = mysqli_query($koneksi,"UPDATE tb_user SET nama_user='$nama',agama='$agama',pendidikan='$pendidikan',konsentrasi='$konsentrasi',r_pekerjaan='$r_pekerjaan',alamat='$alamat',
    r_penghargaan='$r_penghargaan',r_les='$r_les' WHERE id_user='$id'");
    
    if($filename1 !== ""){
        if($ukuran < 91044070){		
            $xx = $rand.'_'.$filename1;
            move_uploaded_file($_FILES['ft_ktp']['tmp_name'], 'img/ft_ktp/'.$rand.'_'.$filename1);
            $gambar2 = mysqli_query($koneksi,"UPDATE tb_user SET ft_ktp='$xx' WHERE id_user='$id'");
        }else{
            header('location:profil.php?pesan=gambarterlalubesar');
        }
    }

    if($filename2 !== ""){
        if($ukuran < 91044070){		
            $xx2 = $rand.'_'.$filename2;
            move_uploaded_file($_FILES['ft_profil']['tmp_name'], 'img/ft_profil/'.$rand.'_'.$filename2);
            $gambar1 = mysqli_query($koneksi,"UPDATE tb_user SET ft_profil='$xx2' WHERE id_user='$id'");
        }else{
            header('location:profil.php?pesan=gambarterlalubesar');
        }
    }

    if($ttl !== ""){
        $sv = mysqli_query($koneksi,"UPDATE tb_user SET ttl='$ttl'");
    }

    $all = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email'");
    
    if(mysqli_num_rows($all) > 0){
        header('location:profil.php?pesan=emailsudahada');
    }else{
        $emailkuy = mysqli_query($koneksi,"UPDATE tb_user SET email='$email'");
    }
    header('location:profil.php?pesan=sukses');
}
?>