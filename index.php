<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>LOWONGAN KERJA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">

  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">

  <link rel="stylesheet" href="assets/css/aos.css">

  <link rel="stylesheet" href="assets/css/ionicons.min.css">

  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="assets/css/jquery.timepicker.css">


  <link rel="stylesheet" href="assets/css/flaticon.css">
  <link rel="stylesheet" href="assets/css/icomoon.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet">
  </link>
  </link>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">E-LOKER.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="loginn.php" class="nav-link">Masuk</a></li>
          <li class="nav-item"><a href="signup.php" class="nav-link">Daftar</a></li>
          <li class="nav-item cta"><a href="login.php" class="nav-link"><span>Perusahaan</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="hero-wrap js-fullheight" style="background-image: url('pex.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
        data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Cari Kerja? <br> di
            <strong>E-LOKER</strong> aja.</h1>
          <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Masukan lowongan disini yang anda butuhkan.</p>
          <div class="block-17 my-4">
            <form action="user/kerja.php" method="get" class="d-block d-flex">
              <div class="fields d-block d-flex">
                <div class="textfield-search one-third">
                  <!-- <input type="text" class="form-control" name="nama" placeholder="Masukan Posisi"> -->
                  <select name="posisi" class="form-control">
                    <option value="">Masukan Posisi</option>
                    <?php 
                    $data = mysqli_query($koneksi,"SELECT * FROM tb_posisi"); 
                    while($d = mysqli_fetch_array($data)){
                      echo "<option value='$d[id_posisi]'> $d[posisi] </option>";
                    } ?>
                  </select>
                </div>
                <div class="textfield-search one-third">
                  <!-- <input type="text" name="nearby" class="form-control" placeholder="Masukan Kota"> -->
                  <select name="lokasi" class="form-control">
                    <option value="">Masukan Lokasi</option>
                    <?php 
                    $data = mysqli_query($koneksi,"SELECT * FROM tb_lokasi"); 
                    while($d = mysqli_fetch_array($data)){
                      echo "<option value='$d[id_lokasi]'> $d[lokasi] </option>";
                    } ?>
                  </select>
                </div>
                <div class="select-wrap one-third">
                  <select name="kategori" class="form-control">
                    <option value="">Masukan Kategori</option>
                    <?php 
                    $data = mysqli_query($koneksi,"SELECT * FROM tb_kategori"); 
                    while($d = mysqli_fetch_array($data)){
                      echo "<option value='$d[id_kategori]'> $d[kategori] </option>";
                    } ?>
                  </select>
                </div>
              </div>
              <input type="submit" name="cari" class="search-submit btn btn-primary" value="Search">
            </form>
          </div>
          <p>Lowongan terbaru</p>
          <p class="browse d-md-flex">
            <?php 
            $query = mysqli_query($koneksi,"SELECT * FROM tb_lowongan join tb_posisi on tb_posisi.id_posisi = tb_lowongan.posisi ORDER BY id_lowongan DESC LIMIT 3");
            while($q = mysqli_fetch_array($query)){
            ?>
            <span class="d-flex justify-content-md-center align-items-md-center"><a
                href="user/kerja.php?posisi=<?= $q['id_posisi'] ?>&lokasi=all&kategori=all&cari="><?= $q['posisi']; ?></a></span>
            <?php } ?>
            <span class="d-flex justify-content-md-center align-items-md-center"><a href="user/kerja.php">Lainnya ...</a></span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-white">
    <div class="container">
      <div class="row justify-content-start mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate">
          <h2 class="mb-4"> Perusahaan Ternama </h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/abc.jpg" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/oke.jpg" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/cepat.png" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/pnm.png" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/indomart.jpg" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/mitra.jpg" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="d-flex justify-content-center">
              <img src="assets/images/pas.png" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="destination d-flex justify-content-center">
            <a href="">
              <img src="assets/images/pass.png" alt="" style="width: 120px; height: auto;">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section" style="padding-bottom: 60px;">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">LowKer</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis beatae laudantium debitis nobis
              explicabo officia ea amet ipsum deleniti?</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Tentang Kami</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Latar Belakang</a></li>
              <li><a href="#" class="py-2 d-block">Berkarir Bersama Kami</a></li>
              <li><a href="#" class="py-2 d-block">Lowongan Lainnya</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Pencari Kerja</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Berdasarkan Posisi</a></li>
              <li><a href="#" class="py-2 d-block">Berdasarkan Lokasi</a></li>
              <li><a href="#" class="py-2 d-block">Berdasarkan Perusahaan</a></li>
              <li><a href="#" class="py-2 d-block">Berdasarkan Bidang</a></li>
              <li><a href="#" class="py-2 d-block">Berdasarkan Industri</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Lokasi Kami</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Garut</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@lowker.com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <div style="margin-bottom: -500px;">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright © E-LOKER 2021.
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" /></svg></div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/jquery.timepicker.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="assets/js/google-map.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
  <script>
    new SlimSelect({
      select: '#single'
    })
  </script>
</body>

</html>