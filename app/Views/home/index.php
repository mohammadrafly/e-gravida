<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Selamat datang di E-GRAVIDA</h1>
      <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
            <div class="content">
              <h3>Layanan yang kami sediakan</h3>
              <p>
               </p>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-user"></i>
                  <h4>Konsultasi Private</h4>
                  <p></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-group"></i>
                  <h4>Konsultasi Bersama/Group</h4>
                  <p></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-plus-medical"></i>
                  <h4>Booking Periksa untuk Kandungan</h4>
                  <p></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-search"></i>
                  <h4>Fitur Cari tahu Kondisi Kandungan</h4>
                  <p></p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <!-- End Counts Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Pengen Tahu Kondisi Kesehatan Kandunganmu?</h3>
          <p> Yuk! Daftar di KKIH, gampang kok! klik tombol berikut.</p>
          <a class="cta-btn" href="<?= base_url('register') ?>">Daftar</a>
        </div>

      </div>
    </section><!-- End Cta Section -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Artikel</h2>
          <p>Yuk baca fakta menarik mengenai kandungan ibu hamil.</p>
        </div>

        <div class="row">
            <?php if($content): ?>
            <?php foreach($content as $row): ?>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <img class="title" src="<?= base_url('picture/'.$row->picture) ?>" width="300px">
              <h4 class="title"><a href="<?= base_url('artikel/'.$row->id) ?>"><?= $row->title ?></a></h4>
              <p class="description"><?= character_limiter($row->content, 50) ?></p>
              <p class="description"><a href="<?= base_url('artikel/'.$row->id) ?>"></a></p>
            </div>
          </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><

<?= $this->endSection() ?>