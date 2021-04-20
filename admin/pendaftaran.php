<?php $page = "laporan"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Laporan Pendaftaran Lowongan Kerja</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.php"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Laporan Pendaftaran</a> </li>
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
                                    <h5>Data Lowongan</h5>
                                </div>
                                <?php } ?>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Logo</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Posisi</th>
                                                    <th>Jumlah Lowongan</th>
                                                    <th>Gaji</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no   = 1;
                                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan"); 
                                                    while($d = mysqli_fetch_array($data)){ ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td align="center">
                                                    <?php if( $d['logo'] == "" ){
                                                        echo "<i> Belum Diisi </i>";
                                                    }else{
                                                        echo "<img src='img/perusahaan/$d[logo]' height='50'>";
                                                    }
                                                     ?>
                                                    </td>
                                                    <td><?= $d['nama_perusahaan']; ?> </td>
                                                    <td>
                                                    <?php if( $d['posisi'] == "" ){
                                                        echo "<i> Belum Diisi </i>";
                                                    }else{
                                                        echo $d['posisi'];
                                                    } ?></td>
                                                    <td><?= $d['lowongan']; ?> Orang</td>
                                                    <td>IDR <?= number_format("$d[gaji]", 0, ",", "."); ?> , -</td>
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