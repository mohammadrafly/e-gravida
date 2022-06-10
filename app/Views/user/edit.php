<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                            <div class="card-body">
                                <h4 class="card-title"><?= $pages ?></h4>
                                <form method="POST" action="<?= base_url('dashboard/user/update') ?>">
                                <?= csrf_field() ?>     
                                <input type="text" name="id" class="form-control" value="<?= $content['id'] ?>" hidden>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?= $content['username'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?= $content['name'] ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Masukkan Email" value="<?= $content['email'] ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nomor HP</label>
                                                    <input type="number" name="phone" class="form-control" placeholder="Masukkan Nomor HP" value="<?= $content['phone'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Role</label>
                                                    <select name="role" class="form-control" id="exampleFormControlSelect2">
                                                    <option selected value="<?= $content['role'] ?>"><?= $content['role'] ?></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="customer">Customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name Suami</label>
                                                    <input type="text" name="suami" class="form-control" placeholder="Masukkan Nama Suami" value="<?= $content['suami'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempatlahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?= $content['tempatlahir'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="tanggallahir" class="form-control" placeholder="Tanggal" value="<?= $content['tanggallahir'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" row="5" value="<?= $content['alamat'] ?>"><?= $content['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info"><?= $pages ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?= $this->endSection() ?>