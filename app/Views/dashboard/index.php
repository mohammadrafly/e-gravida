<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat datang <?= session()->get('username') ?></h3>
                  <h6 class="font-weight-normal mb-0">Semua sistem berjalan lancar!</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?= base_url('assets/images/dashboard/people.svg') ?>" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h4 class="location font-weight-normal"><?php echo date("l d M Y") ;?></h4>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if(session()->get('role') === 'customer'): ?>
                <?php if($hamil['tanggal_persalinan']): ?>
                <div class="col-md-6 grid-margin transparent">
                  <div class="row">
                    <div class="col-md-12 mb-4 stretch-card transparent">
                      <div class="card card-tale">
                        <div class="card-body">
                          <p class="mb-4">Selamat anda telah melahirkan pada:</p>
                          <p class="fs-30 mb-2"><?= $hamil['tanggal_persalinan'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php elseif($hamil['tanggal_persalinan'] === NULL): ?>
                <?php endif ?>
              <?php elseif(session()->get('role') === 'admin'): ?>
              <?php endif ?>
            </div>
          </div>
        </div>

<?= $this->endSection() ?>