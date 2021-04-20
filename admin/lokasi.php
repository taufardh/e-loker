<?php $page = "lokasi"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Data Lokasi</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Data Lokasi</a> </li>
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
                            <?php if(isset($_GET['page'])){
                            if($_GET['page'] == "editkt"){
                            $idkt = $_GET['id'];
                            $sql = mysqli_query($koneksi,"select * from tb_lokasi where id_lokasi='$idkt'");
                            foreach ($sql as $kt):
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Lokasi</h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="kt">Lokasi</label>
                                            <input type="hidden" name="id" value="<?= $idkt ?>">
                                            <input type="text" value="<?= $kt['lokasi'] ?>" name="lokasi"
                                                class="form-control" placeholder="Masukan Lokasi">
                                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "lokasisudahada"): ?>
                                                <small class="text-danger">lokasi sudah ada</small>
                                                <?php endif; endif; ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm float-right" name="update">Update</button>
                                    </form>
                                    <?php
                                    if(isset($_POST['update'])){
                                        $lokasi = $_POST['lokasi'];
                                        $idkt = $_POST['id'];
                                        $cek = mysqli_query($koneksi,"SELECt * FROM tb_lokasi WHERE lokasi='$lokasi'");
                                        if(mysqli_num_rows($cek) > 0 ){
                                            header('location:?pesan=gagal');
                                        }else{
                                            $sql = mysqli_query($koneksi,"update tb_lokasi set lokasi='$lokasi' WHERE id_lokasi='$idkt'");
                                        if($sql){
                                            header('location:?pesan=update');
                                        }else{
                                            header('location:?pesan=gagal');
                                        }
                                        }
                                        
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php }
                            } ?>
                            <?php if(isset($_GET['page'])){
                            if($_GET['page'] == "tambah"){ ?>
                            <div class="card">
                                <div class="card-header">
                                    <?php if($_SESSION['role'] == 'admin'){?>
                                    <h5>Tambah Lokasi</h5>
                                    <?php } ?>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama">Nama Lokasi</label>
                                            <input type="text" name="lokasi" id="nama" class="form-control"
                                                placeholder="Masukan Lokasi">
                                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "lokasisudahada"): ?>
                                                <small class="text-danger">lokasi sudah ada</small>
                                                <?php endif; endif; ?>
                                        </div>
                                        <button type="submit" name="simpan"
                                            class="btn btn-primary btn-sm float-right px-5">Simpan</button>
                                    </form>
                                    <?php 
                                    if(isset($_POST['simpan'])){
                                        $lokasi = $_POST['lokasi'];
                                        $cek = mysqli_query($koneksi,"SELECt * FROM tb_lokasi WHERE lokasi='$lokasi'");
                                        if(mysqli_num_rows($cek) > 0 ){
                                            header('location:?page=tambah&pesan=lokasisudahada');
                                        } else {
                                        $sql = mysqli_query($koneksi,"insert into tb_lokasi values('','$lokasi')");
                                        if($sql){
                                            header("Location: ?pesan=berhasil");
                                        } else {
                                            header("Location: ?pesan=gagal");
                                        }}
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php }
                        } ?>
                            <div class="card">
                                <div class="card-header">
                                    <?php if($_SESSION['role'] == 'admin'){?>
                                    <h5>Data Lokasi</h5>
                                    <a href="?page=tambah" class="btn btn-success btn-sm float-right">Tambah
                                        Lokasi</a>
                                </div>
                                <?php } ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "berhasil"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil ditambahkan. <a href="lokasi.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "update"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil diupdate. <a href="lokasi.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "gagal"): ?>
                                <div class="alert alert-danger bg-danger text-white m-4" role="alert">Data telah ada. <a href="lokasi.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "hapus"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil dihapus. <a href="lokasi.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lokasi</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                    $no   = 1;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_lokasi"); 
                                    while($d = mysqli_fetch_array($data)){ ?>
                                                <tr>
                                                    <td width="30px;"><?= $no++; ?></td>
                                                    <td><?= $d['lokasi']; ?></td>
                                                    <td width="120px">
                                                        <div class="btn-group">
                                                            <!-- <a href="detailPR.php?id=<?= $d['id_perusahaan'] ?>"
                                                                class="btn btn-success btn-sm fas fa-eye"></a> -->
                                                            <a href="?page=editkt&id=<?= $d['id_lokasi'] ?>"
                                                                class="btn btn-primary fas fa-edit btn-sm"></a>
                                                                
                                                            <a href="?action=hapus&id=<?= $d['id_lokasi'] ?>"
                                                                class="btn btn-danger btn-sm fas fa-trash"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                        </table>
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
if(isset($_GET['action'])){
    if($_GET['action'] == "hapus"){
        $idk = $_GET['id'];
        $sql = mysqli_query($koneksi,"DELETE FROM tb_lokasi WHERE id_lokasi='$idk'");
        if($sql){
            header('location:lokasi.php?pesan=hapus');
        }else{
            header('location:lokasi.php?pesan=gagalhapus');
        }
    }
}
?>
<?php include 'footer.php'; ?>