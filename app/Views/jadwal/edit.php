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
                                <form method="POST" action="<?= base_url('dashboard/jadwal/update') ?>" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                    <div class="form-body">
                                    <input type="text" name="id" class="form-control" placeholder="Judul" value="<?= $content['id'] ?>" hidden>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Judul" value="<?= $content['title'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="date" name="date" class="form-control" placeholder="Judul" value="<?= $content['date'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Status Jadwal</label>
                                                    <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected value="<?= $content['status'] ?>"><?= $content['status'] ?></option>
                                                        <option value="undone">UNDONE</option>
                                                        <option value="done">DONE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Update Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?= $this->endSection() ?>