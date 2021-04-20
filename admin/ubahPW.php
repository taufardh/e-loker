<?php $page = "dashboard"; ?>
<?php 
ob_start();
include 'header.php'; ?>
<div class="pcoded-content">
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-settings bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Ganti Password</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Ganti Password</a> </li>
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
                    <div class="col-sm-12">
                        <?php if( $role == "admin" ){?>
                        <div class="card">
                            <div class="card-header">
                                <h5>Ganti Password</h5>
                            </div>
                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "pwkonfir"): ?>
                            <div class="alert alert-danger bg-danger text-white m-4" role="alert">Konfirmasi password tidak sesuai. <a href="ubahpw.php" class="text-info float-right">Close</a></div>
                            <?php endif; endif; ?>
                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "pwlamasalah"): ?>
                            <div class="alert alert-danger bg-danger text-white m-4" role="alert">Password lama salah. <a href="ubahpw.php" class="text-info float-right">Close</a></div>
                            <?php endif; endif; ?>
                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "berhasil"): ?>
                            <div class="alert alert-success bg-success text-white m-4" role="alert">Password berhasil diupdate. <a href="ubahpw.php" class="text-info float-right">Close</a></div>
                            <?php endif; endif; ?>

                            <div class="card-block">
                                <form action="" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password Lama</label>
                                        <div class="col-sm-10">
                                        <input type="hidden" name="id" value="<?= $assoc['id']?>">
                                            <input type="password" class="form-control" autocomplete="off" name="pwlama" placeholder="Masukan Password Lama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password Baru</label>
                                        <div class="col-sm-10">
                                        <input type="hidden" name="id_perusahaan" value="">
                                            <input type="password" class="form-control" autocomplete="off" name="pwbaru" placeholder="Masukan Password Baru">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" value="" autocomplete="off" name="pwkonfir"
                                                placeholder="Masukan Konfirmasi Password">
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" name="ganti" class="btn btn-success btn-sm"
                                            value="Tambah"> Simpan </button>
                                        <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php }else{ ?>
                            <div class="card">
                            <div class="card-header">
                                <h5>Ganti Password</h5>
                            </div>
                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "pwkonfir"): ?>
                            <div class="alert alert-danger bg-danger text-white m-4" role="alert">Konfirmasi password tidak sesuai. <a href="ubahpw.php" class="text-info float-right">Close</a></div>
                            <?php endif; endif; ?>
                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "pwlamasalah"): ?>
                            <div class="alert alert-danger bg-danger text-white m-4" role="alert">Password lama salah. <a href="ubahpw.php" class="text-info float-right">Close</a></div>
                            <?php endif; endif; ?>
                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "berhasil"): ?>
                            <div class="alert alert-success bg-success text-white m-4" role="alert">Password berhasil diupdate. <a href="ubahpw.php" class="text-info float-right">Close</a></div>
                            <?php endif; endif; ?>
                            <div class="card-block">
                                <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password Lama</label>
                                        <div class="col-sm-10">
                                        <input type="hidden" name="id2" value="<?= $assoc['id_perusahaan']?>">
                                            <input type="password" class="form-control" autocomplete="off" name="pwlama2" placeholder="Masukan password lama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password Baru</label>
                                        <div class="col-sm-10">
                                        <input type="hidden" name="id_perusahaan" value="">
                                            <input type="password" class="form-control" autocomplete="off" name="pwbaru2" placeholder="Masukan password lama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" value="" autocomplete="off" name="pwkonfir2"
                                                placeholder="Masukan konfirmasi password">
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" name="ganti2" class="btn btn-success btn-sm"
                                            value="Tambah"> Simpan </button>
                                        <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <?php } ?>       
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
ob_start();
if(isset($_POST['ganti'])){
    $id_admin = $_POST['id'];
    $pwlama = MD5($_POST['pwlama']);
    $pwbaru = MD5($_POST['pwbaru']);
    $pwkonfir = MD5($_POST['pwkonfir']);
    $cek = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE password='$pwlama'");
    if(mysqli_num_rows($cek) > 0){
        if($pwbaru == $pwkonfir){
            $sql = mysqli_query($koneksi,"UPDATE tb_admin SET password='$pwbaru' WHERE id='$id_admin'");
            if($sql){
                header('location:ubahPW.php?pesan=berhasil');
            }
        }else{
            header('location:ubahPW.php?pesan=pwkonfir');
        }
    }else{
        header('location:ubahPW.php?pesan=pwlamasalah');
    }
}elseif(isset($_POST['ganti2'])){
    $id_perusahaan = $_POST['id2'];
    $pwlama2 = MD5($_POST['pwlama2']);
    $pwbaru2 = MD5($_POST['pwbaru2']);
    $pwkonfir2 = MD5($_POST['pwkonfir2']);
    $cek2 = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan WHERE password='$pwlama2'");
    if(mysqli_num_rows($cek2) > 0){
        if($pwbaru2 == $pwkonfir2){
            $sql2 = mysqli_query($koneksi,"UPDATE tb_perusahaan SET password='$pwbaru2' WHERE id_perusahaan='$id_perusahaan'");
            if($sql2){
                header('location:ubahPW.php?pesan=berhasil');
            }
        }else{
            header('location:ubahPW.php?pesan=pwkonfir');
        }
    }else{
        header('location:ubahPW.php?pesan=pwlamasalah');
    }
}

?>
<?php include 'footer.php'; ?>
