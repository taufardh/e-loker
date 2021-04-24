<?php 
include '../koneksi.php';
if(!isset($_SESSION['login'])){
    $login = "belum";
}else{
    $login = "sudah";
}
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan INNER JOIN tb_kategori ON tb_kategori.id_kategori=tb_perusahaan.id_kategori INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lowongan.id_lowongan='$id'");
$d    = mysqli_fetch_assoc($data);
?>
<?php include 'header.php'; ?>
                        <div class="pcoded-content">
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h5>Detail Lowongan</h5>
                                            <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Lowongan</a></li>
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
                                            <div class="col-xl-8">  
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="text-center float-right">
                                                        <?php if( $login == "sudah" ){ ?>
                                                            <?php 
                                                            $cekcek = mysqli_query($koneksi,"SELECT * FROM tb_simpan WHERE id_lowongan='$id' AND id_user='$a[id_user]'");
                                                            if(mysqli_num_rows($cekcek) > 0){
                                                                echo "<a href='aksi.php?condition=unsave&idd=$d[id_lowongan]&id=$a[id_user]' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='fa fa-star'></i></a>";
                                                            }else{
                                                                echo "<a href='aksi.php?condition=save&idd=$d[id_lowongan]&id=$a[id_user]' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='far fa-star'></i></a>";
                                                            }
                                                        }else{
                                                            echo "<a href='../loginn.php?pesan=logindulu&condition=save&idd=$d[id_lowongan]' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='far fa-star'></i></a>";
                                                        }
                                                            ?>
                                                        </div>
                                                        <div class="h3 font-weight-bold"><?= $d['posisi']; ?></div>
                                                        <br>
                                                        <div><span class="font-weight-bold text-secondary">
                                                                <?= $d['nama_perusahaan']; ?></span> - <i
                                                                class="fas fa-map-marker-alt"></i> <?= $d['lokasi_perusahaan']; ?> </div>
                                                        <br>
                                                        <hr>
                                                        <div class="row py-4">
                                                            <div class="col-md-2">
                                                                <small class="text-secondary">Jumlah Lowongan  :
                                                                </small><br>
                                                                <strong class="text-uppercase"><span class="font-weight-bold"><?= $d['lowongan']; ?></span> Orang </strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <small class="text-secondary">Status Lowongan
                                                                </small><br>
                                                                <strong class="font-weight-bold "><a href="#"
                                                                        class="text-dark">DI<?= strtoUpper($d['status']); ?></a></strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <small class="text-secondary">Penempatan
                                                                </small><br>
                                                                <strong class="font-weight-bold "><a href="#"
                                                                        class="text-dark"><?= strtoUpper($d['lokasi']); ?></a></strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <small class="text-secondary">Posisi
                                                                </small><br>
                                                                <strong class="font-weight-bold "><a href="#"
                                                                        class="text-dark"><?= strtoUpper($d['posisi']); ?></a></strong>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <small class="text-secondary">Gaji : </small><br>
                                                                <?php if( $d['gaji'] == "0" ){?>
                                                                    <strong class="font-weight-bold">Gaji Dirahasiakan</strong>
                                                                <?php }else{ ?>
                                                                    <strong> <span class="font-weight-bold">IDR</span>  <?= number_format("$d[gaji]", 0, ",", "."); ?> ,&ndash; </strong>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="py-3">
                                                            <div class="h4">Deskripsi Pekerjaan</div>
                                                               <div class="ml-4">
                                                                    <?= nl2br($d['deskripsi']); ?>
                                                               </div>     
                                                        </div>
                                                        <div class="py-3">
                                                            <div class="h4">Persyaratan</div>
                                                            <div class="ml-4"> <?= nl2br($d['persyaratan']); ?> </div>
                                                        </div>
                                                        <div class="float-left">
                                                        <?php 
                                                                $e = substr($d['tanggal'],5,2);
                                                                if($e == 12){
                                                                    $bulan = "Desember";
                                                                }elseif($e == 11){
                                                                    $bulan = "November";
                                                                }elseif($e == 10){
                                                                    $bulan = "Oktober";
                                                                }elseif($e == 9){
                                                                    $bulan = "September";
                                                                }elseif($e == 8){
                                                                    $bulan = "Agustus";
                                                                }elseif($e == 7){
                                                                    $bulan = "Juli";
                                                                }elseif($e == 6){
                                                                    $bulan = "Juni";
                                                                }elseif($e == 5){
                                                                    $bulan = "Mei";
                                                                }elseif($e == 4){
                                                                    $bulan = "April";
                                                                }elseif($e == 3){
                                                                    $bulan = "Maret";
                                                                }elseif($e == 2){
                                                                    $bulan = "Februari";
                                                                }elseif($e == 1){
                                                                    $bulan = "Januari";
                                                                }
                                                                $m = substr($d['tanggal'],0,4);
                                                                $y = substr($d['tanggal'],8,2);
                                                                ?>
                                                            Diiklankan sejak <?php echo "$y $bulan $m"; ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer ">
                                                    <?php 
                                                    if($d['lowongan'] !== 0 OR $d['status'] !== "tutup" ){?>

                                                    
                                                         <?php if( $login == "belum"){
                                                            echo "<a href='../loginn.php?pesan=logindulu' class='float-right btn btn-primary'> Lamar Sekarang </a>";
                                                         }else{ ?>           
                                                        <button type="button" class="float-right btn btn-primary"
                                                            data-toggle="modal" data-target="#exampleModal">
                                                            Lamar Sekarang
                                                        </button>
                                                        <?php } }else{
                                                            echo "<button disabled class='btn btn-secondary float-right'> Lamar Sekarang </button>";
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL -->
                                            <!-- Button trigger modal -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <button type="button" class="close " data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" enctype="multipart/form-data" action="aksi.php">
                                                        <div class="modal-body">
                                                            
                                                            <div class="text-center">
                                                                <?php if( $a['ft_profil'] !== "" ){
                                                                    echo "<img src='img/ft_profil/$a[ft_profil]' style='height: 100px; width: 100px; border-radius: 5px;' alt=''>";
                                                                }else{
                                                                    echo "<img src='img/ft_profil/avatar.jpg' class='rounded-circle' style='height: 100px; width: 100px; border-radius: 5px;' alt=''>";

                                                                } ?>
                                                                
                                                                <div class="h4 my-2"><?= $a['nama_user']; ?></div>
                                                                <div class="h6 text-secondary"><?= $a['alamat']; ?></div>
                                                                <div><a href="index.php" class="text-primary">Lihat Profil Anda
                                                                        <i class="fas fa-chevron-right"></i></a></div>
                                                            </div>
                                                            <div>
                                                                <div class="font-weight-bold my-3">Kontak Informasi</div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div>Email</div>
                                                                    <div><?= $a['email']; ?></div>
                                                                </div>
                                                                <hr>
                                                                <div class="d-flex justify-content-between">
                                                                    <div>Alamat</div>
                                                                    <div><?= $a['alamat']; ?></div>
                                                                </div>
                                                                <hr>
                                                                <div class="text-center">
                                                                    <input type="hidden" name="id_perusahaan" value="<?= $d['id_perusahaan'] ?>" >
                                                                    <input type="hidden" name="id_lowongan" value="<?= $id ?>">
                                                                    <input type="hidden" name="id_user" value="<?= $a['id_user'] ?>">
                                                                    <label class="btn btn-success btn-sm" for="cv">Upload CV<input type="file" name="file" class="form-control" required id="cv" accept="application/pdf"> </label><br>

                                                                    <small class="text-secondary"   >Wajib diisi</small><br>
                                                                    <small class="text-secondary">Hanya mendukung pdf</small><br><br>
                                                                </div>
                                                                <div class="text-center">
                                                                    <div style="font: italic; font-size: small; color:darkgrey">
                                                                        * Melamar lowongan di E-Loker tidak dipungut biaya
                                                                    </div>
                                                                    <br>
                                                                    <?php if($d['status'] == "tutup"): ?>
                                                                        <button type="submit"  disabled name="kirim" class="btn btn-primary px-5">Kirim Lamaran</button>
                                                                    <?php else: ?>
                                                                        <button type="submit" name="kirim" class="btn btn-primary px-5">Kirim Lamaran</button>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ENDMODAL -->
                                            <div class="col-xl-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Profil Perusahaan</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="text-center">
                                                            <img src="../admin/img/perusahaan/<?= $d['logo'] ?>" class="img-fluid rounded" alt="">
                                                        </div>
                                                        <div class="py-4">
                                                            <h3 class="font-weight-bold"><?= $d['nama_perusahaan']; ?></h3>
                                                        </div>
                                                        <hr>
                                                        <div class="py-3">
                                                            <small class="text-secondary h6">Kategori : </small><br>
                                                            <strong><a href="#"
                                                                    class="font-weight-bold h5 text-primary"><?= $d['kategori']; ?></a></strong>
                                                        </div>
                                                        <div class="py-3">
                                                            <small class="text-secondary h6">Ijin Perusahaan : </small><br>
                                                            <strong><a href="#"
                                                                    class="font-weight-bold h5 "><?= $d['ijin_perusahaan']; ?></a></strong>
                                                        </div>
                                                        <!-- <hr> -->
                                                        <div class="py-3">
                                                            <small class="text-secondary h6">Kantor Pusat : </small><br>
                                                            <strong class="font-weight-bold h5"><?= $d['lokasi_perusahaan']; ?></strong>
                                                        </div>
                                                        <div class="py-3">
                                                            <!-- <iframe
                                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7345348763547!2d107.61665420000001!3d-6.9223045999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e62f68a04a57%3A0xa7e52c498441baae!2sWisma%20Bumiputera%20Bandung!5e0!3m2!1sid!2sid!4v1618472869603!5m2!1sid!2sid"
                                                                width="100%" height="300px" style="border:0;"
                                                                allowfullscreen="" loading="lazy"></iframe> -->
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




    <script data-cfasync="false" src="assets/js/email-decode.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/jquery-ui.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/popper.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/waves.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/jquery.slimscroll.js"></script>


    <script src="assets/js/jquery.flot.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/jquery.flot.categories.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/curvedlines.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/jquery.flot.tooltip.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script src="assets/js/chartist.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script src="assets/js/amcharts.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/serial.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/light.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>

    <script src="assets/js/pcoded.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script src="assets/js/horizontal-layout.min.js" type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/custom-dashboard.min.js"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript" src="assets/js/script.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="799ddc403e80b1cc26e7d64d-text/javascript"></script>
    <script type="799ddc403e80b1cc26e7d64d-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="assets/js/rocket-loader.min.js" data-cf-settings="799ddc403e80b1cc26e7d64d-|49" defer=""></script>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/menu-horizontal-static.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:37 GMT -->

</html>