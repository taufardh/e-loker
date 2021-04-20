<?php $page = "perusahaan"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Data Perusahaan</h4>
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
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "sukses"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil ditambahkan. <a href="data.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "update"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil diupdate. <a href="data.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "gagal"): ?>
                                <div class="alert alert-danger bg-danger text-white m-4" role="alert">Data gagal ditambahkan. <a href="data.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "gagald"): ?>
                                <div class="alert alert-danger bg-danger text-white m-4" role="alert">Data gagal dihapus. <a href="data.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "hapus"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Data berhasil dihapus. <a href="data.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>

                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Logo</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Kategori</th>
                                                    <th>Lokasi</th>
                                                    <th>Ijin Perusahaan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                    $no   = 1;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan inner join tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori"); 
                                    while($d = mysqli_fetch_array($data)){ ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td align="center"><img height="50" src="img/perusahaan/<?= $d['logo']; ?>" alt="">
                                                    </td>
                                                    <td><?= $d['nama_perusahaan']; ?> </td>
                                                    <td><?= $d['kategori']; ?></td>
                                                    <td><?= $d['lokasi_perusahaan']; ?></td>
                                                    <td><?= $d['ijin_perusahaan']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <!-- <a href="detailPR.php?id=<?= $d['id_perusahaan'] ?>"
                                                                class="btn btn-success btn-sm fas fa-eye"></a> -->
                                                            <a href="editPR.php?id=<?= $d['id_perusahaan'] ?>"
                                                                class="btn btn-primary fas fa-edit btn-sm"></a>
                                                            <a href="hapusPR.php?id=<?= $d['id_perusahaan'] ?>"
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


<?php include 'footer.php'; ?>