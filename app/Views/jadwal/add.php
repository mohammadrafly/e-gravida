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
                                <form method="POST" action="<?= base_url('dashboard/jadwal/add') ?>">
                                <?= csrf_field() ?>     
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Judul" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="date" class="form-control" placeholder="Tanggal" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Assign User</label>
                                                    <select name="user" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected>Pilih User..</option>
                                                        <?php 
                                                        foreach($user as $row): ?>
                                                            <?php if($row['role'] === 'admin'): ?>
                                                            <?php elseif($row['role'] === 'customer'): ?>
                                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                            <?php endif ?>
                                                        <?php endforeach; ?>
                                                    </select>
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