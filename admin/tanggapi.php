<?php $page = "tanggapan"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Data Tanggapan</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Data Perusahaan</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
<?php 
$id_lamaran = $_GET['id'];
$tgp = mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_lamaran ON tb_user.id_user=tb_lamaran.id_user INNER JOIN tb_lowongan ON tb_lamaran.id_lowongan=tb_lowongan.id_lowongan WHERE tb_lamaran.id_lamaran='$id_lamaran'"); 
$a = mysqli_fetch_assoc($tgp);
?>
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <?php if($_SESSION['role'] == 'admin'){?>
                                    <h5>Data Perusahaan</h5>
                                    <a href="tambahPR.php" class="btn btn-success btn-sm float-right">Tambah
                                        Perusahaan</a>
                                </div>
                                <?php } ?>
                                <form action="" enctype="multipart/form-data" method="post">
                                <div class="card-block">
                                      <div class="row">
                                          <div class="col-md-2 text-center">
                                            <h5 class="mb-3">Foto KTP</h5>
                                            <?php if( $a['ft_ktp'] == "" ){
                                                echo "<img src='../user/img/ft_profil/avatar.jpg' height='100'>";
                                                echo "<br/>";
                                                echo "Belum Diisi";
                                            }else{
                                                echo "<img src='../user/img/ft_ktp/$a[ft_ktp]' height='100'>";
                                            } ?>
                                            
                                          </div>
                                            <input type="hidden" name="id_user" value="<?= $a['id_user'] ?>" >
                                            <input type="hidden" name="id_lamaran" value="<?= $a['id_lamaran'] ?>">
                                            <input type="hidden" name="id_lowongan" value="<?= $a['id_lowongan'] ?>">
                                              <div class="col-md-5">
                                                  <label for="" class="font-weight-bold"> Nama Lengkap </label> <br>
                                                  <div class="mb-3"> <?= $a['nama_user']; ?> </div>
                                                  <label for="" class="font-weight-bold"> Alamat </label> <br>
                                                  <div class="mb-3">
                                                  <?php if( $a['alamat'] == "" ){
                                                      echo "Belum Diisi";
                                                  }else{
                                                      echo nl2br($a['alamat']);
                                                  } ?>    
                                                  </div>
                                                  <label for="" class="font-weight-bold"> Posisi Melamar </label> <br>
                                                  <div> <?= $a['posisi']; ?> </div>
                                              </div>
                                              <div class="col-md-5">
                                                  <label class="font-weight-bold" for=""> Tanggal Lahir </label> <br>
                                                  <div class="mb-3">  <?= $a['ttl']; ?> </div>
                                                  <label class="font-weight-bold" for=""> Jenis Kelamin </label> <br>
                                                  <div class="mb-3">  <?= $a['jk']; ?> </div>
                                                  <label class="font-weight-bold" for=""> Tanggapi Surat </label> <br>
                                                  <div class="mb-3">  <input type="file" name="file" class="form-input-file" id="" accept="application/pdf" required></div>
                                              </div>
                                              <div class="text-right" style="float:right;">
                                                    <button type="submit" name="kirim" class="btn btn-success">  Kirim Tanggapan </button>  
                                              </div>
                                        </div>
                                      </div>  
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>
<?php 
if(isset($_POST['kirim'])){
    $id_lamaran  = $_POST['id_lamaran'];
    $id_user     = $_POST['id_user'];
    $id_lowongan = $_POST['id_lowongan'];
    
    $ekstensi1 = array('pdf');
    $namafile  = $_FILES['file']['name'];
    $x         = explode('.', $namafile);
    $ekstensi  = strtolower(end($x));
    $rand        = rand();
    $ukuran    = $_FILES['file']['size'];
    $file_tmp  = $_FILES['file']['tmp_name'];
        if(in_array($ekstensi, $ekstensi1) === true){
            if($ukuran < 1044070){
                $xx = $rand.'_'.$namafile;
                move_uploaded_file($file_tmp, 'tanggapan/'.$rand.'_'.$namafile);
                $upload = mysqli_query($koneksi,"INSERT INTO tb_tanggapan (id_user,id_lowongan,tanggapan,tgl_tanggapan) VALUES('$id_user','$id_lowongan','$xx','$date')");
                if($upload){
                    $update = mysqli_query($koneksi,"UPDATE tb_lamaran SET status='tanggapan' WHERE id_lamaran='$id_lamaran'");
                    $kurang = mysqli_query($koneksi,"SELECT * FROM tb_lowongan WHERE id_lowongan='$id_lowongan'");
                    $kkk = mysqli_fetch_assoc($kurang);
                    $jum = $kkk['lowongan']  -  1 ;
                    $ubah = mysqli_query($koneksi,"UPDATE tb_lowongan SET lowongan='$jum' WHERE id_lowongan='$id_lowongan'");        
                    header('location:tanggapan.php?pesan=berhasil');
                }else{
                    header('location:tanggapi.php?pesan=gagal');
                }
             }else{
                 header('location:tanggapi.php?pesan=ukuranteraubesar');
             }
        }else{
            header('location:tanggapi.php?pesan=bukanpdf');
        }
}

?>

<?php include 'footer.php'; ?>