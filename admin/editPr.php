<?php $page = "perusahaan"; ?>
<?php include 'header.php'; ?>
<?php 
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori WHERE tb_perusahaan.id_perusahaan='$id'");
$d = mysqli_fetch_assoc($data);
?>
<div class="pcoded-content">

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Edit Perusahaan</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Edit Perusahaan</a> </li>
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
                                            <input type="text" value="<?= $d['nama_perusahaan'] ?>" class="form-control" autocomplete="off" name="nama"
                                                placeholder="Masukan Nama Perusahaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Logo Perusahaan</label>
                                        <div class="col-sm-10">
                                        <input type="hidden" name="id_perusahaan" value="<?= $d['id_perusahaan'] ?>">
                                            <input type="file" class="form-control" autocomplete="off" name="logo"
                                                placeholder="Masukan Nama Perusahaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control"
                                                name="kategori">
                                                <option value="<?= $d['id_kategori'] ?>"> <?= $d['kategori']; ?> </option>
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
                                        <label class="col-sm-2 col-form-label">Izin Perusahaan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= $d['ijin_perusahaan'] ?>" autocomplete="off" name="ijin"
                                                placeholder="Izin Perusahaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Lokasi Perusahaan</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control" autocomplete="off"
                                                name="lokasi" placeholder="Default textarea"><?= $d['lokasi_perusahaan']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" name="edit" class="btn btn-success btn-sm"
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
<?php include 'footer.php'; ?>
<?php 
if(isset($_POST['edit'])){
    $id2   = $_POST['id_perusahaan'];
    $nama = $_POST['nama'];
    $ijin = $_POST['ijin'];
    $lokasi = $_POST['lokasi'];
    $kategori = $_POST['kategori'];
    
    $rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['logo']['name'];
	$ukuran = $_FILES['logo']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
    if($filename == ""){
        mysqli_query($koneksi,"UPDATE tb_perusahaan SET nama_perusahaan='$nama',ijin_perusahaan='$ijin',lokasi_perusahaan='$lokasi'
        , id_kategori='$kategori' WHERE id_perusahaan='$id2'");
        header('location:data.php?pesan=update');
    }else{
        if($ukuran < 91044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['logo']['tmp_name'], 'img/perusahaan/'.$rand.'_'.$filename);
            $gambar = mysqli_query($koneksi,"UPDATE tb_perusahaan SET nama_perusahaan='$nama',ijin_perusahaan='$ijin',lokasi_perusahaan='$lokasi'
            , id_kategori='$kategori',logo='$xx' WHERE id_perusahaan='$id2' ");
            header('location:data.php?pesan=update');
        }else{
            header('location:editPR.php?pesan=gambarterlalubesar');
        }
    } 
}
?>