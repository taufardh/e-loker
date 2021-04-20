<?php 
include '../koneksi.php';
if(isset($_GET['condition'])){
    if($_GET['condition'] == "save"){
        $idd = $_GET['idd'];
        $id  = $_GET['id'];
        $posisi = $_GET['posisi'];
        mysqli_query($koneksi,"INSERT INTO tb_simpan VALUES('','$idd','$id')");
        if($posisi == "kerja" ){
            header('location:kerja.php'); 
        }
            header('location:kerja.php');
    }
    if($_GET['condition'] == "unsave"){
        $idd = $_GET['idd'];
        $id  = $_GET['id'];
        mysqli_query($koneksi,"DELETE FROM tb_simpan WHERE id_lowongan='$idd'");
        header('location:kerja.php');
    }
} 
if(isset($_POST['kirim'])){
    $id_user = $_POST['id_user'];
    $id_lowongan = $_POST['id_lowongan'];
    $id_perusahaan = $_POST['id_perusahaan'];
    
    $ekstensi1 = array('png','jpeg','jpg','pdf');
    $namafile  = $_FILES['file']['name'];
    $x         = explode('.', $namafile);
    $ekstensi  = strtolower(end($x));
    $rand        = rand();
    $ukuran    = $_FILES['file']['size'];
    $file_tmp  = $_FILES['file']['tmp_name'];
    if(in_array($ekstensi, $ekstensi1) === true){
        if($ukuran < 104407009){
            $xx = $rand.'_'.$namafile;
            move_uploaded_file($file_tmp, 'lamaran/'.$rand.'_'.$namafile);
            $upload = mysqli_query($koneksi,"INSERT INTO tb_lamaran (id_user,id_lowongan,id_perusahaan,file,tanggal_lamar,waktu_lamar) VALUES('$id_user','$id_lowongan','$id_perusahaan','$xx','$date','$time')");
            if($upload){
                header('location:index.php?pesan=berhasil');
            }else{
                header('location:index.php?pesan=gagal');
            }
         }else{
             header('location:index.php?pesan=ukuranteraubesar');
         }
    }else{
        header('location:index.php?pesan=bukanimg/file');
    }
}
if(isset($_GET['notice'])){
    if($_GET['notice'] == "hapuspendidikan"){
        $id = $_GET['id'];
        mysqli_query($koneksi,"UPDATE tb_user SET pendidikan='' WHERE id_user='$id'");
        header('location:index.php');
    }elseif($_GET['notice'] == "hapuskerja"){
        $id = $_GET['id'];
        mysqli_query($koneksi,"UPDATE tb_user SET r_pekerjaan='' WHERE id_user='$id'");
        header('location:index.php');
    }elseif($_GET['notice'] == "hapusles"){
        $id = $_GET['id'];
        mysqli_query($koneksi,"UPDATE tb_user SET r_les='' WHERE id_user='$id'");
        header('location:index.php');
    }elseif($_GET['notice'] == "hapusharga"){
        $id = $_GET['id'];
        mysqli_query($koneksi,"UPDATE tb_user SET r_penghargaan='' WHERE id_user='$id'");
        header('location:index.php');
    }
}

?>