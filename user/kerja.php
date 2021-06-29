<?php include 'header.php';?>
<link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<?php
if(isset($_GET['search'] )){
    $search = strtoupper($_GET['search']);
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE UPPER(tb_posisi.posisi) like '%$search%' or UPPER(tb_kategori.kategori) like '%$search%' or UPPER(tb_lokasi.lokasi) like '%$search%'");
    
    // $posisi     = $_GET['posisi'];
    // $kategori = $_GET['kategori'];
    // $lokasi   = $_GET['lokasi'];
    // if($lokasi == "all" && $kategori == "all" && $posisi == "all"  ){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi");
    // }elseif($lokasi !== "all" && $kategori !== "all" && $posisi !== "all"  ){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lokasi.id_lokasi = '$lokasi' AND tb_posisi.id_posisi = '$posisi' AND tb_kategori.id_kategori = '$kategori'");
    // }elseif($lokasi == "all" && $kategori == "all" ){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_posisi.id_posisi = '$posisi'");
    // }elseif($posisi == "all" && $lokasi == "all" ){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_kategori.id_kategori='$kategori'");
    // }elseif($posisi == "all" && $kategori == "all" ){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lokasi.id_lokasi = '$lokasi'");
    // }elseif($lokasi == "all"){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_posisi.id_posisi = '$posisi' AND tb_kategori.id_kategori='$kategori'");
    // }elseif($kategori == "all"){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lokasi.id_lokasi = '$lokasi' AND tb_posisi.id_posisi = '$posisi'");
    // }elseif($posisi == "all"){
    //     $sql = mysqli_query($koneksi,"SELECT * FROM tb_perusahaan INNER JOIN tb_kategori ON tb_perusahaan.id_kategori=tb_kategori.id_kategori INNER JOIN tb_lowongan ON tb_perusahaan.id_perusahaan=tb_lowongan.id_perusahaan INNER JOIN tb_posisi ON tb_posisi.id_posisi=tb_lowongan.posisi INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi=tb_lowongan.lokasi WHERE tb_lokasi.id_lokasi = '$lokasi' AND tb_kategori.id_kategori='$kategori'");
    // }
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
                        <!-- <div class="col-md-4">
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
                        </div> -->
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="posisi">Posisi : </label>
                                <select name="posisi" class="form-control">
                                    <option value="all">Masukan Posisi</option>
                                    <option value="all">Semua Posisi</option>
                                    <?php 
                                    $data_pos = mysqli_query($koneksi,"SELECT * FROM tb_posisi"); 
                                    while($pos = mysqli_fetch_array($data_pos)){
                                    echo "<option value='$pos[id_posisi]'> $pos[posisi] </option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokasi">Lokasi : </label>
                                <select name="lokasi" class="form-control">
                                    <option value="all">Masukan Lokasi</option>
                                    <option value="all">Semua Lokasi</option>
                                    <?php 
                                    $data_lok = mysqli_query($koneksi,"SELECT * FROM tb_lokasi"); 
                                    while($lok = mysqli_fetch_array($data_lok)){
                                    echo "<option value='$lok[id_lokasi]'> $lok[lokasi] </option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kategori">Kategori : </label>
                                <select name="kategori" class="form-control">
                                    <option value="all">Masukan Kategori</option>
                                    <option value="all">Semua Kategori</option>
                                    <?php 
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_kategori"); 
                                    while($d = mysqli_fetch_array($data)){
                                    echo "<option value='$d[id_kategori]'> $d[kategori] </option>";
                                    } ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-10">
                            <div class="form-group">
                                    <div class="textfield-search one-third">
                                    <input type="text" name="search" class="form-control">
                                    </div> 
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <!-- <div style="margin-bottom: 30px;"></div> -->
                                <button type="submit" class="btn btn-primary btn-sm btn-block">CARI</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="page-header-title">
                
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
                                <?php 
                                $favorit = array();
                                $get_fav = mysqli_query($koneksi, "select id_lowongan, count(id_lowongan) as jml from tb_simpan group by id_lowongan order by jml desc limit 15"); 
                                while($res_fav = mysqli_fetch_array($get_fav)){ 
                                    array_push($favorit, $res_fav['id_lowongan']);
                                }  
                                ?>
                                <?php 
                                $qwry = '';
                                $qwry .= 'select * from tb_lowongan ';
                                $qwry .= 'inner join tb_perusahaan on tb_lowongan.id_perusahaan = tb_perusahaan.id_perusahaan ';
                                $qwry .= 'inner join tb_kategori on tb_perusahaan.id_kategori = tb_kategori.id_kategori ';
                                $qwry .= 'inner join tb_posisi on tb_lowongan.posisi = tb_posisi.id_posisi ';
                                $qwry .= 'inner join tb_lokasi on tb_lowongan.lokasi = tb_lokasi.id_lokasi';
                                $rekomendasi = mysqli_query($koneksi, $qwry); 
                                while($rek = mysqli_fetch_array($rekomendasi)){ ?>
                                    <?php foreach($favorit as $f){
                                        if($rek['id_lowongan'] == $f){    
                                    ?>
                                    <?php 
                                        $fav_btn = '';
                                        if(isset($a)){                              
                                            $fav = mysqli_query($koneksi,"SELECT * FROM tb_simpan WHERE id_lowongan='$rek[id_lowongan]' AND id_user='$a[id_user]'");
                                            if(mysqli_num_rows($fav) > 0){
                                                $fav_btn = "<a href='aksi.php?condition=unsave&idd=$rek[id_lowongan]&id=$a[id_user]&posisi=kerja' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='fa fa-star'></i></a>";
                                            }else{
                                                $fav_btn = "<a href='aksi.php?condition=save&idd=$rek[id_lowongan]&id=$a[id_user]&posisi=kerja' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='far fa-star'></i></a>";
                                            }
                                        }
                                        else{
                                            $fav = mysqli_query($koneksi,"SELECT * FROM tb_simpan WHERE id_lowongan='$rek[id_lowongan]'");
                                            if(mysqli_num_rows($fav) > 0){
                                                $fav_btn = "<a href='aksi.php?condition=unsave&idd=$rek[id_lowongan]&posisi=kerja' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='fa fa-star'></i></a>";
                                            }else{
                                                $fav_btn = "<a href='aksi.php?condition=save&idd=$rek[id_lowongan]&posisi=kerja' class='btn btn-outline-primary btn-sm px-3'><i style='font-size: 16px; margin-left:5px;' class='far fa-star'></i></a>";
                                            }
                                        }
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $rek['nama_perusahaan']; ?> <?php echo $fav_btn; ?></h5>
                                                <p class="card-text">IDR. <?php echo number_format("$rek[gaji]", 0, ",", "."); ?></p>
                                                <p><?php echo $rek['lokasi']; ?></p>
                                                <p><?php echo $rek['posisi']; ?></p>
                                                <p><?php echo $rek['kategori']; ?></p>
                                                <a href='detail-lowongan.php?id=<?php echo $rek['id_lowongan']; ?>' class='btn btn-success'>Lihat</a>
                                            </div>
                                        </div> 
                                    </div>
                                <?php } ?>
                                <?php }
                                } ?>
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
                                            <!-- <div class="row"> -->
                                            <table id="tabel_kerja" class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if( mysqli_num_rows($sql) == 0 ){
                                                echo "Hasil Pencarian Tidak Ada";
                                            } ?>
                                                <?php 
                                                    $kerja = mysqli_query($koneksi,"SELECT * FROM tb_lowongan INNER JOIN tb_perusahaan ON tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan ORDER BY id_lowongan DESC"); 
                                                    while($k = mysqli_fetch_array($sql)){ ?>
                                                        <tr>
                                                            <td>
                                                        <!-- CONTENT -->
                                                        <!-- <div class="col-md-2"> -->
                                                            <div class="text-center my-4">
                                                                <img src="../admin/img/perusahaan/<?= $k['logo']?>" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        <!-- </div> -->
                                                            </td>
                                                        <!-- <div class="col-md-10"> -->
                                                            <td>
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
                                                            </td>
                                                        <!-- </div> -->
                                                        <!-- ENDCONTENT -->
                                                            </td>
                                                        </tr>
                                                <?php } ?>
                                                <!-- CONTENT -->
                                                <tbody>
                                            </table>
                                        <!-- </div> -->
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
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/pagination.min.js"></script>
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
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
$('#tabel_kerja').DataTable( {
  pageLength: 10,
  info: false,
  sort: false,
  lengthChange: false
} );
</script>