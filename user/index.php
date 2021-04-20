<?php include 'header.php'; ?>
<?php if($login == "belum"){
    header('location:../loginn.php');
} ?>
                    <div class="pcoded-content">
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h5>Profil</h5>
                                            <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.php"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Profil</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card proj-progress-card">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12">
                                                                <h6>Kelengkapan Profil</h6>
                                                                <h5 class="m-b-20 f-w-700"><span
                                                                        class="text-c-green m-l-10"><?= $persen2; ?>%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-red"
                                                                        style="width:<?= $persen2; ?>%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- If Isset Ubah Profil -->
                                            <?php 
                                            if(isset($_GET['notice'])){
                                                if($_GET['notice'] == "ubahprofil"){
                                            ?>
                                            <div class="col-md-12 col-xl-12">
                                                <form method="post" enctype="multipart/form-data">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Lengkapi Profil</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-md-2 text-center">
                                                                
                                                                <label for=""> Foto Profil </label> <br>
                                                                <?php 
                                                                if( mysqli_num_rows($ft_profiln) == 0 ){ 
                                                                    echo "<img class='mb-2' src='img/ft_profil/$a[ft_profil]' height='100' alt=''>";
                                                                }else{ 
                                                                    echo "Belum Ada Foto";
                                                                } ?>

                                                                <input type="hidden" name="id" value="<?= $a['id_user'] ?>">
                                                                <input type="file" name="ft_profil" class="mb-3" id="foto"><br>
                                                                <label for="foto" class="btn btn-primary btn-sm px-2">
                                                                Upload Foto Profil
                                                                </label>
                                                                <br>
                                                                <label for=""> Foto KTP </label> <br>
                                                                <?php 
                                                                if( mysqli_num_rows($f_ktpn) == 0 ){
                                                                    echo "<img class='mb-2' src='img/ft_ktp/$a[ft_ktp]' height='100' alt=''>";
                                                                }else{
                                                                    echo "Belum Ada Foto";
                                                                } ?>
                                                                <input type="file" name="ft_ktp" class="mb-3 form-control" id="ktp"><br>
                                                                <label for="ktp" class="btn btn-primary btn-sm px-2">Upload Foto KTP</label>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for=""> Nama Lengkap </label>
                                                                <h5 class="mb-4"> <input type="text" name="nama" id="" class="form-control" value="<?= $a['nama_user']; ?>"></h5>
                                                                <label for="">Jenis Kelamin <span class="text-danger"></span></label>
                                                                        <div class="mb-4 form-check">
                                                                            <?php if( $a['jk'] == "laki laki" ){
                                                                                echo "<input type='radio' name='jk' id='laki laki' value='laki laki' checked class='form-check-input'>";
                                                                                echo "<label for='laki' class='form-check-label'>Laki - Laki</label> <span class='ml-5 mr-5'></span>";
                                                                                echo "<input type='radio' name='jk' id='perempuan' value='perempuan' class='form-check-input'>";
                                                                                echo "<label for='laki' class='form-check-label'>Perempuan</label> <span class='ml-5 mr-5'></span>";
                                                                            }else{
                                                                                echo "<input type='radio' name='jk' id='laki laki' value='laki laki' class='form-check-input'>";
                                                                                echo "<label for='laki' class='form-check-label'>Laki - Laki</label> <span class='ml-5 mr-5'></span>";
                                                                                echo "<input type='radio' name='jk' id='perempuan' value='perempuan' checked class='form-check-input'>";
                                                                                echo "<label for='laki' class='form-check-label'>Perempuan</label> <span class='ml-5 mr-5'></span>";
                                                                                
                                                                            } ?>
                                                                        </div>
                                                                
                                                                <label for=""> Agama </label>
                                                                <h5 class="mb-4"> <input type="text" name="agama" class="form-control" value="<?= $a['agama'] ?>" id="">  </h5>
                                                                <label for=""> Bidang Keahlian </label>
                                                                <h5 class="mb-4">
                                                                    <!-- <select class="form-control" name="konsentrasi" id="">
                                                                        <option value="<?= $a['konsentrasi'] ?>" > <?= $a['konsentrasi']; ?></option>
                                                                        <?php 
                                                                        $kk = mysqli_query($koneksi,"SELECT * FROM tb_kategori"); 
                                                                        while($kkk = mysqli_fetch_array($kk)){
                                                                            echo "<option value='$kkk[kategori]'> $kkk[kategori] </option>";
                                                                        } ?>
                                                                    </select> -->
                                                                    <input type="text" name="konsentrasi" id="konsentrasi" class="form-control" value="<?= $a['konsentrasi']; ?>" placeholder="Masukan Bidang Keahlian">
                                                                </h5>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for="">Email</label>
                                                                <h5 class="mb-4"><input type="email" name="email" value="<?= $a['email']; ?>" class="form-control" id=""> </h5>
                                                                <label for=""> Tanggal Lahir </label>
                                                                <h5 class="mb-4"> <input type="date" name="ttl" value="<?= $a['ttl']; ?>" class="form-control" id=""></h5>
                                                                <label for=""> Alamat Tempat Tinggal </label>
                                                                <h5 class="mb-4"><textarea name="alamat" class="form-control"><?= $a['alamat']; ?></textarea> </h5>
                                                                <label for=""> Gaji Yang diinginkan </label>
                                                                <h5 class="mb-4"> 
                                                                <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="bas">IDR</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="gaji" value="<?= $a['gaji'] ?>">
                                                                    </div>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer"> 
                                                        <h5 style="float:right;" class="float-right">
                                                                <a class="btn btn-danger" href="index.php"> Kembali </a>        
                                                                <button type="submit" name="ubahprofil" class="btn btn-primary" href="?notice=ubahprofil"> Simpan </button>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                </form>
                                            </div>
                                            <?php         
                                                }elseif($_GET['notice'] == "ubahkerja"){?>
                                            <!-- If Isset Pengalaman Kerja  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4> Ubah Pengalaman Kerja</h4>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post">
                                                        <input type="hidden" name="id" value="<?= $a['id_user']; ?>">    
                                                        <textarea name="r_pekerjaan" id="" cols="30" rows="10" class="form-control"><?=  preg_replace("#</?(br).*?>#","",nl2br($a['r_pekerjaan'])) ; ?></textarea>
                                                        
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <button type="submit" name='ubahkerja' class="btn btn-primary">Simpan</button> 
                                                    <a href="index.php" class='btn btn-danger'> Kembali </a> </h5>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End If Isset Pengalaman Kerja  -->
                                            <?php
                                                }elseif($_GET['notice'] == "ubahpendidikan"){?>
                                            <!-- If Isset Pendidikan  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4> Ubah Riwayat Pendidikan</h4>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post">
                                                        <input type="hidden" name="id" value="<?= $a['id_user']; ?>">    
                                                        <textarea name="r_pendidikan" id="" cols="30" rows="10" class="form-control"><?=  preg_replace("#</?(br).*?>#","",nl2br($a['pendidikan'])) ; ?></textarea>
                                                        
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <button type="submit" name='ubahpendidikan' class="btn btn-primary">Simpan</button> 
                                                    <a href="index.php" class='btn btn-danger'> Kembali </a> </h5>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End If Isset Pendidikan  -->        
                                            <?php    
                                                }elseif($_GET['notice'] == "ubahharga"){?>

                                            <!-- If Isset Penghargaan  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4> Ubah Riwayat Penghargaan</h4>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post">
                                                        <input type="hidden" name="id" value="<?= $a['id_user']; ?>">    
                                                        <textarea name="r_penghargaan" id="" cols="30" rows="10" class="form-control"><?=  preg_replace("#</?(br).*?>#","",nl2br($a['r_penghargaan'])) ; ?></textarea>
                                                        
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <button type="submit" name='ubahharga' class="btn btn-primary">Simpan</button> 
                                                    <a href="index.php" class='btn btn-danger'> Kembali </a> </h5>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End If Isset Penghargaan  -->
                                            <?php 
                                                }elseif($_GET['notice'] == "ubahles"){?>
                                            <!-- If Isset les  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4> Ubah Riwayat Les</h4>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post">
                                                        <input type="hidden" name="id" value="<?= $a['id_user']; ?>">    
                                                        <textarea name="r_les" id="" cols="30" rows="10" class="form-control"><?=  preg_replace("#</?(br).*?>#","",nl2br($a['r_les'])) ; ?></textarea>
                                                        
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <button type="submit" name='ubahles' class="btn btn-primary">Simpan</button> 
                                                    <a href="index.php" class='btn btn-danger'> Kembali </a> </h5>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End If Isset les  -->
                                            <?php        
                                                }
                                            }
                                            ?>
                                            <!-- End If isset ubah profil  -->
                                            
                                            <!-- Profil -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Profil Anda </h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-md-2 text-center" >
                                                                <label for=""> Foto Profil </label> <br>
                                                                <?php if( mysqli_num_rows($ft_profiln) == 0 ){ echo "<img class='mb-5' src='img/ft_profil/$a[ft_profil]' height='100' alt=''>"; }else{ echo "--------";} ?>
                                                                <br>
                                                                <label for=""> Foto KTP </label> <br>
                                                                <?php if( mysqli_num_rows($f_ktpn) == 0 ){ echo "<img class='mb-5' src='img/ft_ktp/$a[ft_ktp]' height='100' alt=''>"; }else{ echo "--------";} ?>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for=""> Nama Lengkap </label>
                                                                <h5 class="mb-4"><?= $a['nama_user']; ?></h5>  
                                                                <label for=""> Jenis Kelamin </label>
                                                                <h5 class="mb-4"> <?= $a['jk']; ?> </h5>
                                                                <label for=""> Agama </label>
                                                                <h5 class="mb-4"> <?php if($a['agama'] == "" ){echo "--------";}else{echo $a['agama'];} ?> </h5>
                                                                <label for=""> Konsentrasi Dalam Bidang </label>
                                                                <h5 class="mb-4"> <?php if( $a['konsentrasi'] == "" ){echo "--------";}else{ echo $a['konsentrasi'];} ?></h5>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for="">Email</label>
                                                                <h5 class="mb-4"> <?= $a['email']; ?> </h5>
                                                                <label for=""> Tanggal Lahir </label>
                                                                <?php
                                                                if($a['ttl'] !== "0000-00-00"){ 
                                                                $e = substr($a['ttl'],5,2);
                                                                if($e == 12){
                                                                    $bulan = "Desember";
                                                                }elseif($e == 11){
                                                                    $bulan = "November";
                                                                }elseif($e == 10){
                                                                    $bulan = "Oktober";
                                                                }elseif($e == 9){
                                                                    $bulan = "September";
                                                                }elseif($e == 8){
                                                                    $bulan = "Agustus";
                                                                }elseif($e == 7){
                                                                    $bulan = "Juli";
                                                                }elseif($e == 6){
                                                                    $bulan = "Juni";
                                                                }elseif($e == 5){
                                                                    $bulan = "Mei";
                                                                }elseif($e == 4){
                                                                    $bulan = "April";
                                                                }elseif($e == 3){
                                                                    $bulan = "Maret";
                                                                }elseif($e == 2){
                                                                    $bulan = "Februari";
                                                                }elseif($e == 1){
                                                                    $bulan = "Januari";
                                                                }elseif($e == 0){
                                                                    $bulan = "0";
                                                                }
                                                                    $m = substr($a['ttl'],0,4);
                                                                    $y = substr($a['ttl'],8,2);
                                                                    $hasill = "$y $bulan $m "; 
                                                                }else{
                                                                    $hasill = "--------";    
                                                                }
                                                                ?>
                                                                <h5 class="mb-4"><?php echo $hasill; ?></h5>
                                                                <label for=""> Alamat Tempat Tinggal </label>
                                                                <h5 class="mb-4"><?php if( $a['alamat'] == "" ){ echo "--------";}else{echo $a['alamat'];} ?> </h5>
                                                                <label for=""> Gaji Yang diinginkan </label>
                                                                <h5 class="mb-4"> <?php if( $a['gaji'] == 0 ){echo "--------";}else{echo "IDR ".number_format("$a[gaji]", 0, ",", ".").", -"; } ?> </h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer"> 
                                                        <h5 style="float:right;" class="float-right">
                                                                <a class="btn btn-success" href="?notice=ubahprofil"> Lengkapi Profil </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profil  -->

                                            <!-- Pengalaman Kerja  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Pengalaman Kerja</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <?= nl2br($a['r_pekerjaan']); ?>
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <a href="?notice=ubahkerja" class="btn btn-primary">Ubah </a> 
                                                    <a href="aksi.php?notice=hapuskerja&id=<?=  $a['id_user']?>" class='btn btn-danger'> Hapus </a> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Pengalaman Kerja  -->

                                            <!-- Riwayat Pendidikan -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Riwayat Pendidikan</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <?= nl2br($a['pendidikan']); ?>
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <a href="?notice=ubahpendidikan" class="btn btn-primary">Ubah </a>
                                                    <a href="aksi.php?notice=hapuspendidikan&id=<?=  $a['id_user']?>" class='btn btn-danger'> Hapus </a> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Riwayat Pendidikan  -->

                                            <!-- Riwayat Penghargaan  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Riwayat Penghargaan</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <?= nl2br($a['r_penghargaan']); ?>
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <a href="?notice=ubahharga" class="btn btn-primary">Ubah </a> 
                                                    <a href="aksi.php?notice=hapusharga&id=<?=  $a['id_user']?>" class='btn btn-danger'> Hapus </a> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Riwayat Penghargaan  -->

                                            <!-- Riwayat les  -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Riwayat Les</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <?= nl2br($a['r_les']); ?>
                                                    </div>
                                                    <div class="card-footer">
                                                    <h5 class="float-right">
                                                    <a href="?notice=ubahles" class="btn btn-primary">Ubah </a> 
                                                    <a href="aksi.php?notice=hapusles&id=<?=  $a['id_user']?>" class='btn btn-danger'> Hapus </a> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Riwayat les  -->
                                            
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
<?php include 'footer.php'; ?>
<!-- Mirrored from colorlib.com/polygon/admindek/default/menu-horizontal-static.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:37 GMT -->
<?php 
if(isset($_POST['ubahprofil'])){
    $id2 = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $ttl = $_POST['ttl'];
    $agama = $_POST['agama'];
    $gaji = $_POST['gaji'];
    $konsentrasi = $_POST['konsentrasi'];
    $email = $_POST['email'];

    $rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename1 = $_FILES['ft_ktp']['name'];
	$ukuran1 = $_FILES['ft_ktp']['size'];
	$ext = pathinfo($filename1, PATHINFO_EXTENSION);

    $filename2 = $_FILES['ft_profil']['name'];
	$ukuran2 = $_FILES['ft_profil']['size'];
	$ext = pathinfo($filename2, PATHINFO_EXTENSION);
    $sql1 = mysqli_query($koneksi,"UPDATE tb_user SET nama_user='$nama',gaji='$gaji', ttl='$ttl', alamat='$alamat', jk='$jk',agama='$agama',konsentrasi='$konsentrasi',email='$email' WHERE id_user='$id2'");

    if($filename1 !== ""){
        if($ukuran < 91044070){		
            $xx = $rand.'_'.$filename1;
            move_uploaded_file($_FILES['ft_ktp']['tmp_name'], 'img/ft_ktp/'.$rand.'_'.$filename1);
            $gambar2 = mysqli_query($koneksi,"UPDATE tb_user SET ft_ktp='$xx' WHERE id_user='$id2'");
        }else{
            header('location:profil.php?notice=ubahprofil&pesan=gambarterlalubesar');
        }
    }

    if($filename2 !== ""){
        if($ukuran < 91044070){		
            $xx2 = $rand.'_'.$filename2;
            move_uploaded_file($_FILES['ft_profil']['tmp_name'], 'img/ft_profil/'.$rand.'_'.$filename2);
            $gambar1 = mysqli_query($koneksi,"UPDATE tb_user SET ft_profil='$xx2' WHERE id_user='$id2'");
        }else{
            header('location:index.php?notice=ubahprofil&pesan=gambarterlalubesar');
        }
    }
    if($sql1){
        header('location:index.php?pesan=berhasil');
    }
}

if(isset($_POST['ubahkerja'])){
    $id2 = $_POST['id'];
    $r_pekerjaan = $_POST['r_pekerjaan'];
    $sql1 = mysqli_query($koneksi,"UPDATE tb_user SET r_pekerjaan='$r_pekerjaan' WHERE id_user='$id2'");
    if($sql1){
        header('location:index.php?pesan=berhasil');
    }else{
        header('location:?notice=ubahkerja&pesan=gagal');
    }
}

if(isset($_POST['ubahpendidikan'])){
    $id2 = $_POST['id'];
    $r_pekerjaan = $_POST['r_pendidikan'];
    $sql1 = mysqli_query($koneksi,"UPDATE tb_user SET pendidikan='$r_pekerjaan' WHERE id_user='$id2'");
    if($sql1){
        header('location:index.php?pesan=berhasil');
    }else{
        header('location:?notice=ubahpendidikan&pesan=gagal');
    }
}

if(isset($_POST['ubahharga'])){
    $id2 = $_POST['id'];
    $r_pekerjaan = $_POST['r_penghargaan'];
    $sql1 = mysqli_query($koneksi,"UPDATE tb_user SET r_penghargaan='$r_pekerjaan' WHERE id_user='$id2'");
    if($sql1){
        header('location:index.php?pesan=berhasil');
    }else{
        header('location:?notice=ubahharga&pesan=gagal');
    }
}

if(isset($_POST['ubahles'])){
    $id2 = $_POST['id'];
    $r_pekerjaan = $_POST['r_les'];
    $sql1 = mysqli_query($koneksi,"UPDATE tb_user SET r_les='$r_pekerjaan' WHERE id_user='$id2'");
    if($sql1){
        header('location:index.php?pesan=berhasil');
    }else{
        header('location:?notice=ubahles&pesan=gagal');
    }
}

?>
</html>