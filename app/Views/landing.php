<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Pendaftaran Magang Puskesmas</title>
  <link rel="shortcut icon" href="<?= base_url(); ?>/landing/assets/images/1.png" type="image/x-icon">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">

  <!-- Additional CSS Files -->

  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
  <!-- TemplateMo 574 Mexant https://templatemo.com/tm-574-mexant -->
  <link rel="stylesheet" href="<?= base_url('landing/assets/css/animate.css') ?>">
  <link rel="stylesheet" href="<?= base_url('landing/assets/css/flex-slider.css') ?>">
  <link rel="stylesheet" href="<?= base_url('landing/assets/css/fontawesome.css') ?>">
  <link rel="stylesheet" href="<?= base_url('landing/assets/css/owl.css') ?>">
  <link rel="stylesheet" href="<?= base_url('landing/assets/css/templatemo-574-mexant.css') ?>">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>

<body>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-fixed">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <ul class="nav">
              <li class="scroll-to-section"><a href="#about">Pendaftaran</a></li>
              <li><a href="<?= base_url('/login') ?>">Login</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="swiper-container" id="top">
    <div class="swiper-wrapper">
      
      <div class="swiper-slide">
        <div class="slide-inner" style="background-image:url(<?= base_url(); ?>landing/assets/images/puskesmas.png)">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2>Selamat Datang di <em>website</em> magang<br>Puskesmas<em> Cicalengka</em></h2>
                  <div class="div-dec"></div>
                  <p>Puskesmas Cicalengka DTP membuka kesempatan untuk magang, PKL dan penelitian</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="#about">Daftar Sekarang</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <!-- ***** Main Banner Area End ***** -->

  <!-- P E N D A F T A R A N -->
  <section class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="active gradient-border"><span>Pendaftaran</span></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <!-- Form Pengajuan Start -->
                    <li class="active">
                      <!-- Show validation errors if available -->
                      <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                          <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                              <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      <?php endif; ?>

                      <!-- Show success message if available -->
                      <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                          <?= session()->getFlashdata('message') ?>
                        </div>
                      <?php endif; ?>

                      <form action="<?= base_url('/internship/submit'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" class="form-control" value="<?= old('nama') ?>" required>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="no_telepon">No Telepon:</label>
                            <input type="text" name="no_telepon" class="form-control" value="<?= old('no_telepon') ?>" required>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="instansi">Instansi:</label>
                            <input type="text" name="instansi" class="form-control" value="<?= old('instansi') ?>" required>
                          </div>
                          <div class=" col-lg-6 mb-3">
                            <label for="mulai">Tanggal Mulai:</label>
                            <input type="date" name="mulai" class="form-control" value="<?= old('mulai') ?>" required>
                          </div>
                          <div class=" col-lg-6 mb-3">
                            <label for="selesai">Tanggal Selasai:</label>
                            <input type="date" name="selesai" class="form-control" value="<?= old('selesai') ?>" required>
                          </div>
                          <div class="col-lg-6 mb-5">
                            <label for="surat">Surat Permohonan (PDF, maksimal 2MB):</label>
                            <input type="file" name="surat" class="form-control" accept=".pdf" required>
                          </div>
                          <div class="col-lg-6 mb-5">
                            <label for="rekomendasi">Surat Rekomendasi (PDF, maksimal 2MB):</label>
                            <input type="file" name="rekomendasi" class="form-control" accept=".pdf" required>
                          </div>
                          <div class="col-lg-12 ">
                            <button type="submit" class="btn btn-primary">Ajukan Magang</button>
                          </div>
                        </div>
                      </form>
                    </li>
                    <!-- Form Pengajuan End -->

                    <!-- Status Pengajuan Start -->

                    <!-- Status Pengajuan End -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="right-content">
            <div class="section-heading">
              <h6>Informasi Penting!</h6>
              <h4>Pendaftaran Siswa Magang</h4>
            </div>
            <div>
              <ol type="1">
                <li>✅Sebelum melakukan pendaftaran siapkan berkas persyaratan yaitu Surat Permohonan dari sekolah serta Surat Rekomendasi dari Dinas Kesehatan Kab. Bandung.</li>
                <li>✅Pastikan Data yang anda kirimkan Valid.</li>
                <li>✅Simpan Kode Pendaftaran yang akan muncul.</li>
                <li>✅Cek pendaftaran melalui form dibawwah secara berkala.</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
  </section>
  <section class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="active gradient-border"><span>Status Pendaftaran</span></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <!-- Status Pengajuan Start -->
                    <li>
                      <div class="section-heading" id="status">
                        <h4>Status Pendaftaran Magang</h4>
                      </div>
                      <form action="<?= base_url('/internship/check_status'); ?>" method="POST">
                        <div class="mb-3">
                          <label for="kode_pendaftaran" class="form-label">Masukkan Kode Pendaftaran</label>
                          <input type="text" name="kode_pendaftaran" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Check</button>
                      </form>

                    </li>
                    <!-- Status Pengajuan End -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="right-content">
            <div class="section-heading">
              <h6>Informasi Penting!</h6>
              <!-- <h4>Pendaftaran Siswa Magang</h4> -->
            </div>
            <div>
              <ul>
                <li>Pendaftaran akan diproses min 1x24 jam harap bersabar🫶🙏</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </section>


  <!-- F O O T E R -->
  <footer class="footer">
    <div class="footer">
      <p>2024 &#169; Lina D Yanti &#128526; 🤩
      </p>
    </div>
  </footer>

  </div>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= base_url(); ?>/landing/assets/js/isotope.min.js"></script>
  <script src="<?= base_url(); ?>/landing/assets/js/owl-carousel.js"></script>

  <script src="<?= base_url(); ?>/landing/assets/js/tabs.js"></script>
  <script src="<?= base_url(); ?>/landing/assets/js/swiper.js"></script>
  <script src="<?= base_url(); ?>/landing/assets/js/custom.js"></script>
  <script>
    var interleaveOffset = 0.5;

    var swiperOptions = {
      loop: true,
      speed: 1000,
      grabCursor: true,
      watchSlidesProgress: true,
      mousewheelControl: true,
      keyboardControl: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        progress: function() {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress;
            var innerOffset = swiper.width * interleaveOffset;
            var innerTranslate = slideProgress * innerOffset;
            swiper.slides[i].querySelector(".slide-inner").style.transform =
              "translate3d(" + innerTranslate + "px, 0, 0)";
          }
        },
        touchStart: function() {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = "";
          }
        },
        setTransition: function(speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".slide-inner").style.transition =
              speed + "ms";
          }
        }
      }
    };

    var swiper = new Swiper(".swiper-container", swiperOptions);
  </script>

  <!-- Tambahkan SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Cek apakah ada flashdata
    <?php if (session()->getFlashdata('message')): ?>
      Swal.fire({
        title: 'Berhasil!',
        text: '<?= session()->getFlashdata('message'); ?>',
        icon: 'success',
        confirmButtonText: 'OK'
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      Swal.fire({
        title: 'Gagal!',
        text: '<?= implode(", ", session()->getFlashdata('errors')); ?>',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    <?php endif; ?>
  </script>

</body>

</html>