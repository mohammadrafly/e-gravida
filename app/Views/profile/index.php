<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Detail</h4>
                  <?php if (!empty(session()->getFlashdata('success_profile'))) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('success_profile'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (!empty(session()->getFlashdata('error_profile'))) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('error_profile'); ?>
                      </div>
                  <?php endif; ?>
                  <form action="<?= base_url('dashboard/profile/detail'); ?>" class="forms-sample" method="post" enctype="multipart/form-data"> 
                  <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="exampleInputEmail2" name="id" value="<?= $content['id'] ?>">
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Foto Profile</label>
                          <div class="col-sm-9">
                          <?php if($content['profile'] === NULL): ?>
                            <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('assets/images/default.png') ;?>" width="100px">
                          <?php elseif($content['profile'] ): ?>
                            <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('profile/'.$content['profile']) ?>" width="100px">
                          <?php endif ?>
                            <input class="form-control" type="file" name="profile" value="<?= $content['profile'] ?>"/>
                          </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input name="username" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['username'] ?>" placeholder="Masukkan Username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input name="email" type="email" class="form-control" id="exampleInputEmail2" value="<?= $content['email'] ?>" placeholder="Masukkan Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input name="name" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['name'] ?>" placeholder="Masukkan Nama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input name="phone" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content['phone'] ?>" placeholder="Masukkan Phone Number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Suami</label>
                      <div class="col-sm-9">
                        <input name="suami" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['suami'] ?>" placeholder="Masukkan Nama Suami">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input name="tempatlahir" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['tempatlahir'] ?>" placeholder="Masukkan Tempat Lahir">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input name="tanggallahir" type="date" class="form-control" id="ttl" onchange="Ages(event)" value="<?= $content['tanggallahir'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Umur</label>
                      <div class="col-sm-9">
                        <input name="umur" type="number" class="form-control" id="umur" value="<?= $content['umur'] ?>" placeholder="Masukkan Umur" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea name="alamat" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['alamat'] ?>" placeholder="Masukkan Alamat" rows="5"><?= $content['alamat'] ?></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Password</h4>
                  <?php if (!empty(session()->getFlashdata('success_password'))) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('success_password'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (!empty(session()->getFlashdata('error_password'))) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('error_password'); ?>
                      </div>
                  <?php endif; ?>
                  <form action="<?= base_url('dashboard/profile/password'); ?>" class="forms-sample" method="post">
                  <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="exampleInputEmail2" name="id_user" value="<?= session()->get('id_user'); ?>">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password Lama</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputUsername2" name="old_password" placeholder="Password Lama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Password Baru</label>
                      <div class="col-sm-9">
                        <input type="password" name="new_password" class="form-control" id="exampleInputEmail2" placeholder="Password Baru">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                      <div class="col-sm-9">
                        <input type="password" name="new_password_conf" class="form-control" id="exampleInputEmail2" placeholder="Konfirmasi Password Baru">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Others</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Joined</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['created_at'] ?>" disabled/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Updated</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['updated_at'] ?>" disabled/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Role</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['role'] ?>" disabled/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection() ?>