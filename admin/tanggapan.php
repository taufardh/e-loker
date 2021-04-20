<?php $page = "tanggapan"; ?>
<?php include 'header.php' ?>

<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h4>Data Tanggapan</h4>
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
                                    <h5>Data Tanggapan</h5>
                                </div>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "berhasil"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Lamaran diterima. <a href="tanggapan.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                <?php if(isset($_GET['pesan'])): if($_GET['pesan'] == "tolak"): ?>
                                <div class="alert alert-success bg-success text-white m-4" role="alert">Lamaran ditolak. <a href="tanggapan.php" class="text-info float-right">Close</a></div>
                                <?php endif; endif; ?>
                                
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto KTP</th>
                                                    <th>Nama </th>
                                                    <th>Alamat</th>
                                                    <th>Surat Lamaran</th>
                                                    <th>Lowongan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no   = 1;
                                                $tgp = mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_lamaran ON tb_user.id_user=tb_lamaran.id_user INNER JOIN tb_lowongan ON tb_lamaran.id_lowongan=tb_lowongan.id_lowongan WHERE tb_lowongan.id_perusahaan='$assoc[id_perusahaan]' AND tb_lamaran.status='proses'"); 
                                                while($d = mysqli_fetch_array($tgp)){ ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td align="center">
                                                    <?php if( $d['ft_ktp'] == "" ){
                                                        echo "<img height='70' src='../user/img/ft_profil/avatar.jpg' alt=''>";
                                                    }else{
                                                        echo "<img src='../user/img/ft_ktp/$d[ft_ktp]' class='img-radius' alt='User Profile Image' height='70'>";
                                                    } ?>
                                                    </td>
                                                    <td><?= $d['nama_user']; ?> </td>
                                                    <td>
                                                    <?php if( $d['alamat'] == "" ){
                                                        echo "Belum Diisi";
                                                    }else{
                                                        echo "$d[alamat]"; 
                                                    } ?>   
                                                    </td>
                                                    <td> <a class="btn btn-secondary btn-sm" target="_blank" href="file.php?id=<?= $d['id_lamaran'] ?>"> Lihat Lamaran </a> </td>
                                                    <td><?= $d['posisi']; ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="tanggapi.php?id=<?= $d['id_lamaran'] ?>"
                                                                class="btn btn-success btn-sm fas fa-check"></a>
                                                            <a href="aksi.php?action=tolak&id=<?= $d['id_lamaran'] ?>"
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