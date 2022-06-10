<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

              <form class="pt-3" method="POST" action="<?= base_url('login') ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">MASUK</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">           
                        Biarkan saya tetap masuk
                    </label>
                  </div>
                  <!--<a href="#" class="auth-link text-black">Lupa Password?</a>-->
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum punya Akun? <a href="<?= base_url('register') ?>" class="text-success">Daftar</a>
                </div>
              </form>

<?= $this->endSection() ?>