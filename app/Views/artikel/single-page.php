<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $title['title'] ?></h2>
          <ol>
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <?php foreach($content as $row): ?>
            <li><?= $row->cat_name ?></li>
            <?php endforeach ?>
            <li><?= $id ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <img src="<?= base_url('picture/'.$title['picture']) ?>">
        <h1><?= $title['title'] ?></h1>
        <?php foreach($content as $row): ?>
        <p><strong><a href="#"><?= strtoupper($row->username) ?></a></strong> | <?= $row->created_at ?> </p> 
        <?php endforeach ?>
        <p>
          <?= $title['content'] ?>
        </p>
      </div>
    </section>

  </main><!-- End #main -->

<?= $this->endSection() ?>