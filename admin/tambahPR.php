<?php $page = "perusahaan"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
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

                            <div class="card">
                                <div class="card-header">
                                    <h5>Tambah Data Perusahaan</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" autocomplete="off" name="nama"
                                                    placeholder="Masukan Nama Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Logo Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" autocomplete="off" name="logo"
                                                    placeholder="Masukan Nama Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">E-mail Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" autocomplete="off" name="email"
                                                    placeholder="Masukan Email Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" autocomplete="off"
                                                    name="password" placeholder="Password Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                                <select class="form-control"
                                                    name="kategori">
                                                    <option value="">- Pilih Salah Satu -
                                                    </option>
                                                    <?php 
                                            $kategori2 = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
                                            while($k2 = mysqli_fetch_array($kategori2)){ ?>
                                                    <option value="<?= $k2['id_kategori'] ?>"> <?= $k2['kategori']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control" autocomplete="off"
                                                    name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Izin Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" autocomplete="off" name="ijin"
                                                    placeholder="Izin Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lokasi Perusahaan</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control" autocomplete="off"
                                                    name="lokasi" placeholder="Masukan Lokasi"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Loker Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" autocomplete="off"
                                                    name="lowongan" placeholder="Loker Perusahaan">
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" name="tambah" class="btn btn-success btn-sm"
                                                value="Tambah"> Simpan </button>
                                            <a href="data.php" class="btn btn-danger btn-sm">Kembali</a>

                                        </div>
                                    </form>
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
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $kategori = $_POST['kategori'];
    $ijin = $_POST['ijin'];
    $lokasi = $_POST['lokasi'];
     $rand = rand();
	 $ekstensi =  array('png','jpg','jpeg','gif');
	 $filename = $_FILES['logo']['name'];
	 $ukuran = $_FILES['logo']['size'];
	 $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($filename == ""){
        mysqli_query($koneksi,"INSERT INTO tb_perusahaan VALUES('','$nama','$email','$password','$kategori','','$ijin','$lokasi') ");
        header('location:index.php?pesan=sukses');
    }else{
        if($ukuran < 91044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['logo']['tmp_name'], 'img/perusahaan/'.$rand.'_'.$filename);
            $gambar = mysqli_query($koneksi,"INSERT INTO tb_perusahaan VALUES('','$nama','$email','$password','$kategori','$xx','$ijin','$lokasi') ");
            if($gambar){
                header('location:data.php?pesan=sukses');
            }else{
                header('location:data.php?pesan=gagal');
            }
        }else{
            header('location:tambahPR.php?pesan=gambarterlalubesar');
        }
    }
}
?>
<?php include 'footer.php' ?>