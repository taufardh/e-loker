<?php $page = "profil"; ?>
<?php include 'header.php' ?>

                    <div class="pcoded-content">

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        <div class="row">
                                        <?php if(isset($_GET['notice'])){?>
                                            <div class="col-xl-12 col-sm-12 col-md-12">
                                                <div class="card prod-p-card">
                                                    <div class="card-title">
                                                        <h3 class="text-center font-weight-bold p-4"> EDIT PROFIL PERUSAHAAN </h3>
                                                    </div>
                                                    <div class="card-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td>Logo</td>
                                                                <td><input type="file" name="file" class="form-control" id=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Perusahaan</td>
                                                                <td><input type="text" name="nama" value="<?= $assoc['nama_perusahaan'] ?>" class="form-control" autocomplete="off" id=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td><input type="email" name="email" class="form-control" value="<?= $assoc['email'] ?>" autocomplete="off" id=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kategori</td>
                                                                <td>
                                                                <select name="kategori" class="form-control" id="">
                                                                    <option value="<?= $assoc['id_kategori'] ?>"><?= $assoc['kategori']; ?></option>
                                                                    <option value=""> -- Pilih Kategori --</option>
                                                                    <?php 
                                                                    $kategori = mysqli_query($koneksi,"SELECT * FROM tb_kategori"); 
                                                                    while($kk = mysqli_fetch_array($kategori)){
                                                                        echo "<option value='$kk[id_kategori]'> $kk[kategori] </option>";
                                                                    }?>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Izin Perusahaan</td>
                                                                <td><input type="text" name="izin" class="form-control" autocomplete="off" value="<?= $assoc['ijin_perusahaan'] ?>" id=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lokasi Perusahaan</td>
                                                                <td><input type="text" name="lokasi" class="form-control" autocomplete="off" id="" value="<?= $assoc['lokasi_perusahaan'] ?>"></td>
                                                            </tr>
                                                        </table>
                                                        <a href="profile.php" class="btn btn-danger"> Kembali </a>
                                                        <button type="submit" class='btn btn-success' name="ubah"> Simpan Perubahan </button>
                                                    </form>                                                  
                                                    </div>
                                                </div>
                                            </div>        
                                        <?php } ?>    
                                            <div class="col-xl-12 col-sm-12 col-md-12">
                                                <div class="card prod-p-card">
                                                    <div class="card-body">
                                                        <div class="jumbotron">
                                                        <div class="d-flex align-items-baseline">
                                                        <div class="d-flex justify-content-center">
                                                            <ul class="list-view">
                                                                <li>
                                                                <div class="media">
                                                                <a class="media-left" href="#">
                                                                <img class="media-object card-list-img img-fluid img-thumbnail" width="200" style="border-radius:10px;" src="img/perusahaan/<?= $assoc['logo'] ?>" alt="Generic placeholder image">
                                                                </a>
                                                                <div class="media-body">
                                                                <div class="col-xs-12">
                                                                <h2 class="d-inline-block text-white font-weight-bold"><?= $assoc['nama_perusahaan']; ?></h2>
                                                                </div>
                                                                <div class="f-13 text-muted m-b-15">
                                                                <?= $assoc['kategori']; ?></div>
                                                                </div>
                                                                </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title font-weight-bold mb-2">PROFIL PERUSAHAAN</h3>
                                                        </div>
                                                            <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "sukses"): ?>
                                                            <div class="alert alert-success bg-success text-white " role="alert">Profil berhasil diupdate. <a href="profile.php" class="text-info float-right">Close</a></div>
                                                            <?php endif; endif; ?>

                                                        <table class="p-4 table table-borderless">
                                                            <tr>
                                                                <td>Nama Perusahaan</td>
                                                                <td>: <?= $assoc['nama_perusahaan']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>: <?= $assoc['email']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kategori</td>
                                                                <td>: <?= $assoc['kategori']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Izin Perusahaan</td>
                                                                <td>: <?= $assoc['ijin_perusahaan']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lokasi Perusahaan</td>
                                                                <td>: <?= $assoc['lokasi_perusahaan']; ?></td>
                                                            </tr>
                                                        </table>
                                                        <div class="card-body text-center">
                                                        <span class="f-12"></span>
                                                            <a href="?notice=edit" class="btn btn-primary btn-sm rounded-pill">Edit Profil</a>
                                                        </div>
                                                        </div>                                                    
                                                    </div>
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
if(isset($_POST['ubah'])){
    $id_perusahaan = $assoc['id_perusahaan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kategori = $_POST['kategori'];
    $ijin = $_POST['izin'];
    $lokasi = $_POST['lokasi'];

    $rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['logo']['name'];
	$ukuran = $_FILES['logo']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($filename == ""){
        mysqli_query($koneksi,"UPDATE tb_perusahaan SET nama_perusahaan='$nama',ijin_perusahaan='$ijin',lokasi_perusahaan='$lokasi'
        , id_kategori='$kategori' WHERE id_perusahaan='$id_perusahaan'");
        header('location:profile.php?pesan=sukses');
    }else{
        if($ukuran < 91044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['logo']['tmp_name'], 'img/perusahaan/'.$rand.'_'.$filename);
            $gambar = mysqli_query($koneksi,"UPDATE tb_perusahaan SET nama_perusahaan='$nama',ijin_perusahaan='$ijin',lokasi_perusahaan='$lokasi'
            , id_kategori='$kategori',logo='$xx' WHERE id_perusahaan='$id_perusahaan' ");
            header('location:profile.php?pesan=sukses');
        }else{
            header('location:profile.php?pesan=gambarterlalubesar');
        }
    }
}
?>
<?php include 'footer.php' ?>
