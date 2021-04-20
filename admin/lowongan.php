<?php $page = "loker"; ?>
<?php include 'header.php'; ?>
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Lowongan Kerja</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.php"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Lowongan kerja</a> </li>
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
                                    <?php if($_SESSION['role'] == 'admin'){?>
                                    <h5>Data Perusahaan</h5>
                                    <a href="tambahPR.php" class="btn btn-success btn-sm float-right">Tambah
                                        Perusahaan</a>
                                </div>
                                <?php } ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "berhasil"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil ditambahkan. <a href="lowongan.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "dibuka"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Lowongan dibuka. <a href="lowongan.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "ditutup"): ?>
                                <div class="alert alert-danger bg-danger text-white m-4" role="alert">Lowongan ditutup. <a href="lowongan.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>

                                <div class="card-block">
                                    <div class="table-responsive">
                                        <a href="tambahLW.php" class="btn btn-primary btn-sm mb-3"> Tambah Lowongan </a>
                                        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Posisi</th>
                                                    <th>Gaji</th>
                                                    <th>Persyaratan</th>
                                                    <th>Jumlah Lowongan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                            $no = 1;
                                            $data = mysqli_query($koneksi,"SELECT * FROM tb_lowongan WHERE id_perusahaan='$assoc[id_perusahaan]'");
                                            while($d = mysqli_fetch_array($data)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $d['posisi']; ?></td>
                                                    <td>Rp.<?= number_format("$d[gaji]", 0, ",", ".");?>,-</td>
                                                    <td><?= nl2br($d['persyaratan']); ?></td>
                                                    <td><?= $d['lowongan']; ?> Orang</td>
                                                    <td>
                                                    <?php if( $d['status'] == "buka" ){
                                                        echo "<a href='aksi.php?auction=off&id=$d[id_lowongan]' class='btn btn-primary btn-sm' > Dibuka </a>";
                                                    }else{
                                                        echo "<a href='aksi.php?auction=on&id=$d[id_lowongan]' class='btn btn-danger btn-sm' > Ditutup </a>";

                                                    } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
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
if(isset($_POST['statusoff'])){
    $id  = $_POST['id'];
    mysqli_query($koneksi,"UPDATE tb_lowongan SET status='tutup' WHERE id_lowongan='$id'");
    header('location:lowongan.php');
}
?>

<?php include 'footer.php'; ?>