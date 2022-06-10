<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

              <form class="pt-3" method="POST" action="<?= base_url('register') ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="password_conf">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Saya setuju dengan semua Syarat & Ketentuan
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah punya Akun? <a href="<?= base_url('/') ?>" class="text-success">Masuk</a>
                </div>
              </form>

<?= $this->endSection() ?>