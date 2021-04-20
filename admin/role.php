<?php $page = "role"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Data User</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Data User</a> </li>
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
                                    <h5>Data User</h5>
                                </div>
                                <?php } ?>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto Profil</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Email</th>
                                                    <th>Alamat</th>
                                                    <th>Agama</th>
                                                    <th>Jenis Kelamin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no   = 1;
                                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_user"); 
                                                    while($d = mysqli_fetch_array($data)){ ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td align="center">
                                                    <?php if( $d['ft_profil'] == "" ){
                                                        echo "<i> Belum Diisi </i>";
                                                    }else{
                                                        echo "<img src='../user/img/ft_profil/$d[ft_profil]' height='50'>";
                                                    }
                                                     ?>
                                                    </td>
                                                    <td><?= $d['nama_user']; ?> </td>
                                                    <td><?= $d['email']; ?></td>
                                                    <td>
                                                    <?php if(  $d['alamat'] == "" ){
                                                        echo "<i> Belum Diisi </i>";
                                                    }else{
                                                        echo $d['alamat'];
                                                    } ?></td>
                                                    <td>
                                                    <?php if( $d['agama'] == "" ){
                                                        echo "<i> Belum Diisi </i>";
                                                    }else{
                                                        echo $d['agama'];
                                                    } ?></td>
                                                    <td><?= $d['jk']; ?></td>
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