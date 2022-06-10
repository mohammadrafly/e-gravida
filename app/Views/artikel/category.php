<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $catsbyid['title'] ?></h2>
          <ol>
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <li>Kategori</li>
            <li><?= $catsbyid['title'] ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">

        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2><?= $catsbyid['title'] ?></h2>
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

      </div>
    </section>

  </main><!-- End #main -->

<?= $this->endSection() ?>