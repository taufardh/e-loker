<?php $page = "loker"; ?>
<?php include 'header.php' ?>

<?php 
if(isset($_GET['edit'] )){
    $edit = $_GET['edit'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_lowongan where id_lowongan = '$edit'");
    $res = mysqli_fetch_array($sql);
}
?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Edit Lowongan</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="lowongan.php">Lowongan Kerja</a> </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Lowongan</a> </li>
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
                                    <h5>Edit Lowongan Kerja</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action=""  method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Posisi</label>
                                            <div class="col-sm-10">
                                                <!-- <input type="text" class="form-control" autocomplete="off" name="posisi" -->
                                                <select class="form-control" autocomplete="off" name="posisi">
                                                    <?php 
                                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_posisi"); 
                                                    while($d = mysqli_fetch_array($data)){ ?>
                                                        <?php if($d['id_posisi'] == $res['posisi']){ ?>
                                                            <option value="<?php echo $d['id_posisi'] ?>" selected><?php echo $d['posisi'] ?></option>
                                                        <?php }else{ ?>
                                                            <option value="<?php echo $d['id_posisi'] ?>"><?php echo $d['posisi'] ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                                    <!-- placeholder="Masukan Posisi Pekerjaan"> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" autocomplete="off" name="lokasi">
                                                    <?php 
                                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_lokasi"); 
                                                    while($d = mysqli_fetch_array($data)){ ?>
                                                        <?php if($d['id_lokasi'] == $res['lokasi']){ ?>
                                                            <option value="<?php echo $d['id_lokasi'] ?>" selected><?php echo $d['lokasi'] ?></option>
                                                        <?php }else{ ?>
                                                            <option value="<?php echo $d['id_lokasi'] ?>"><?php echo $d['lokasi'] ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Gaji </label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="id_low" value="<?php echo $res['id_lowongan'] ?>">
                                                <input type="hidden" name="id" value="<?= $assoc['id_perusahaan'] ?>">
                                                <input type="text" class="form-control" value="<?php echo $res['gaji'] ?>" autocomplete="off" name="gaji"
                                                    placeholder="Exp : 4.000.000">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Persyaratan</label>
                                            <div class="col-sm-10">
                                                <textarea name="persyaratan" rows="5" cols="5" class="form-control" placeholder="Masukkan Persyaratan "><?php echo $res['persyaratan'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Deskripsi Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control" autocomplete="off"
                                                    name="deskripsi" placeholder="Deskripsikan Posisi pekerjaan"><?php echo $res['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Lowongan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $res['lowongan'] ?>" autocomplete="off" name="jumlah"
                                                    placeholder="Masukan jumlah orang yang di butuhkan">
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" name="update" class="btn btn-success btn-sm"
                                                value="Update"> Update </button>
                                            <a href="lowongan.php" class="btn btn-danger btn-sm">Kembali</a>

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
include '../koneksi.php';
if(isset($_POST['update'])){
    $id_low = $_POST['id_low'];
    $id     = $_POST['id'];
    $posisi = $_POST['posisi'];
    $lokasi = $_POST['lokasi'];
    $gaji   = $_POST['gaji'];
    $persyaratan = $_POST['persyaratan'];
    $deskripsi   = $_POST['deskripsi'];
    $jumlah      = $_POST['jumlah'];
    $sql = mysqli_query($koneksi,"UPDATE tb_lowongan SET id_perusahaan = '$id', gaji = '$gaji', posisi = '$posisi', lokasi = '$lokasi', deskripsi = '$deskripsi', persyaratan = '$persyaratan', tanggal = '$date', lowongan = '$jumlah' where id_lowongan='$id_low'");
    // $sql = mysqli_query($koneksi,"INSERT INTO tb_lowongan VALUES('','$id','$gaji','$posisi','$lokasi','$deskripsi','$persyaratan','$date','buka','$jumlah')");
    if($sql){
        header('location:lowongan.php?pesan=berhasil');
    }else{
        header('location:tambahLW.php?pesan=gagal');
    }
}
?>
<?php include 'footer.php' ?>