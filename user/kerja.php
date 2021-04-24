<?php include 'header.php';?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<?php
if(isset($_GET['nama'] )){
    $nama     = $_GET['nama'];
    $kategori = $_GET['kategori'];
    $nearby   = $_GET['nearby'];
    if($nearby == "" && $kategori == "" && $nama == ""  ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi");
    }elseif($nearby !== "" && $kategori !== "" && $nama !== ""  ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_perusahaan.lokasi_perusahaan LIKE '%$nearby%' AND tb_lowongan.posisi LIKE '%$nama%' AND tb_kategori.kategori LIKE '%$kategori%'");
    }elseif($nearby == "" && $kategori == "" ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lowongan.posisi LIKE '%$nama%'");
    }elseif($nama == "" && $nearby == "" ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_kategori.kategori='$kategori'");
    }elseif($nama == "" && $kategori == "" ){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_perusahaan.lokasi_perusahaan LIKE '%$nearby%'");
    }elseif($nearby == ""){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lowongan.posisi LIKE '%$nama%' AND tb_kategori.kategori='$kategori'");
    }elseif($kategori == ""){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_perusahaan.lokasi_perusahaan LIKE '%$nearby%' AND tb_lowongan.posisi LIKE '%$nama%'");
    }elseif($nama == ""){
        $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_perusahaan.lokasi_perusahaan LIKE '%$nearby%' AND tb_kategori.kategori='$kategori'");
    }
}else{
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi ORDER BY id_lowongan DESC"); 
}
?>
<style>
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="pcoded-content">
        <div class="page-header card">
            <div class="bg-white p-3 shadow rounded my-5">
                <form action="" method="get">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="posisi">Posisi : </label>
                                <input type="text" name="nama" id="posisi" class="form-control" placeholder="Masukan Posisi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lokasi">Lokasi : </label>
                                <input type="text" name="nearby" class="form-control" id="lokasi" placeholder="Masukan Lokasi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kategori">Kategori : </label>
                                <select name="kategori" class="form-control">
                                    <option value="">Masukan Kategori</option>
                                    <?php 
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_kategori"); 
                                    while($d = mysqli_fetch_array($data)){
                                    echo "<option value='$d[kategori]'> $d[kategori] </option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div style="margin-bottom: 30px;"></div>
                                <button type="submit" name="cari" class="btn btn-primary btn-sm btn-block">CARI</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="page-header-title">
                <div class="d-inline">
                    <?php 
                    if(isset($_GET['cari'])){
                            echo "<h5>Hasil Pencarian : ";
                        echo "<span class='font-weight-bold'> $nama $nearby $kategori </span> </h5>";
                    }else{
                        
                    ?>
                    <h5>Lowongan Kerja Terbaru di
                        <span class="font-weight-bold">
                            Semua Lokasi
                        </span></h5>
                    <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="pcoded-content">
        <div class="page-body">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h5>Rekomendasi</h5>
                    </div>
                    <div class="card-block">
                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php $work = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan ORDER BY id_lowongan DESC"); 
                                while($w = mysqli_fetch_array($work)){ ?>
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $w['nama_perusahaan']; ?></h5>
                                                <p class="card-text"><?php echo $w['gaji']; ?></p>
                                                <p><?php echo $w['lokasi']; ?></p>
                                                <p><?php echo $w['posisi']; ?></p>
                                                <p><?php echo $w['gaji']; ?></p>
                                            </div>
                                        </div> 
                                    </div>
                                <?php } ?>
                                <!-- <div class="swiper-slide"><img class="img-fluid width-100" src="https://colorlib.com/polygon/admindek/files/assets/images/task/task-u3.jpg" alt="Card image cap"></div>
                                <div class="swiper-slide"><img class="img-fluid width-100" src="https://colorlib.com/polygon/admindek/files/assets/images/task/task-u3.jpg" alt="Card image cap"></div>
                                <div class="swiper-slide"><img class="img-fluid width-100" src="https://colorlib.com/polygon/admindek/files/assets/images/task/task-u3.jpg" alt="Card image cap"></div> -->

                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <!-- <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div> -->

                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-12">

                            <div class="card">
                                <div class="card-block py-4">
                                    <div class="row">
                                        <?php if( mysqli_num_rows($sql) == 0 ){
                                        echo "Hasil Pencarian Tidak Ada";
                                    } ?>
                                        <?php 
                                                                
                                            $kerja = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan ORDER BY id_lowongan DESC"); 
                                            while($k = mysqli_fetch_array($sql)){ ?>
                                        <!-- CONTENT -->
                                        <div class="col-md-2">
                                            <div class="text-center my-4">
                                                <img src="../admin/img/perusahaan/<?= $k['logo']?>" class="img-fluid"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <ul>
                                                <div class="text-center float-right">
                                                    <?php if( $login == "belum" ){
                                                            echo "<a href='../loginn.php?pesan=logindulu' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='far fa-star'></i></a>";
                                                    }else{ ?>
                                                    <?php 
                                                                            
                                                    $cekcek = mysqli_query($koneksi,"SELECT * FROM tb_simpan WHERE id_lowongan='$k[id_lowongan]' AND id_user='$a[id_user]'");
                                                    if(mysqli_num_rows($cekcek) > 0){
                                                        echo "<a href='aksi.php?condition=unsave&idd=$k[id_lowongan]&id=$a[id_user]&posisi=kerja' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='fa fa-star'></i></a>";
                                                    }else{
                                                        echo "<a href='aksi.php?condition=save&idd=$k[id_lowongan]&id=$a[id_user]&posisi=kerja' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='far fa-star'></i></a>";
                                                    }}
                                                    ?></div>
                                                <li>
                                                    <h3 class="font-weight-bold"><?= $k['posisi']; ?></h3>
                                                </li><br>
                                                <li>
                                                    <div class="h6"><a href="#"
                                                            class="text-primary h6 font-weight-bold"><?= $k['nama_perusahaan']; ?></a>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?= $k['lokasi']; ?></div>
                                                </li><br>
                                                <li>
                                                    <div class="font-weight-normal">
                                                        <?php
                                                                        if($login !== "belum"){
                                                                            if($k['gaji'] >= $a['gaji']  ){
                                                                                echo "<i class='fas fa-level-up-alt text-success'></i>";
                                                                            }else{
                                                                                echo "<i class='fas fa-level-down-alt text-danger'></i>";
                                                                            }
                                                                        }
                                                                         ?>
                                                        <span class="text-success">IDR</span>
                                                        <?= number_format("$k[gaji]", 0, ",", "."); ?>,-</div>
                                                </li><br>

                                                <li>
                                                    <div>
                                                        <?php 
                                                                                if(strlen($k['persyaratan']) > 50){
                                                                                    $kata = substr(nl2br($k['persyaratan']),0,50);
                                                                                    echo "$kata...";
                                                                                    echo "<br>";
                                                                                    echo "<a href='detail-lowongan.php?id=$k[id_lowongan]' class='text-primary'>Tampilkan Semua</a>";    
                                                                                }else{
                                                                                    echo nl2br($k['persyaratan']);
                                                                                    echo "<br>";
                                                                                    echo "<a href='detail-lowongan.php?id=$k[id_lowongan]' class='text-primary'>Tampilkan Semua</a>";    
                                                                                }
                                                                                ?>
                                                    </div>
                                                </li><br>
                                                <?php 
                                                                            $e = substr($k['tanggal'],5,2);
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
                                                                            $m = substr($k['tanggal'],0,4);
                                                                            $y = substr($k['tanggal'],8,2);
                                                                            ?>
                                                <li>
                                                    <div class="text-secondary">Dipublikasi kan pada tanggal
                                                        <?php echo "$y $bulan $m"; ?></div>
                                                </li>
                                                <hr>
                                            </ul>
                                        </div>
                                        <!-- ENDCONTENT -->
                                        <?php } ?>
                                        <!-- CONTENT -->
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
</div>

<div id="styleSelector">
</div>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    $(".select2").select2({
        placeholder: "Contoh : Garut",
        allowClear: true
    });

const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  slidesPerView: 3,
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
</script>
<?php include 'footer.php';  ?>