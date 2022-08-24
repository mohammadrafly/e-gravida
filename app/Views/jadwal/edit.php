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
                                                    <label>Tanggal</label>
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
                                            <?php if($content['status'] === 'done'): ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lila (Lingkar Lengan Atas)</label>
                                                    <input type="number" name="lila" class="form-control" placeholder="Lingkar Lengan Atas" value="<?= $content['lila'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PMT Pemulihan</label>
                                                    <input type="text" name="pmt_pemulihan" class="form-control" placeholder="PMT Pemulihan" value="<?= $content['pmt_pemulihan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Tambah Darah</label>
                                                    <select name="tambah_darah" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected value="<?= $content['tambah_darah'] ?>"><?= $content['tambah_darah'] ?></option>
                                                        <option value="undone">UNDONE</option>
                                                        <option value="done">DONE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Imunisasi TT</label>
                                                    <select name="imunisasi_tt" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected value="<?= $content['imunisasi_tt'] ?>"><?= $content['imunisasi_tt'] ?></option>
                                                        <option value="undone">UNDONE</option>
                                                        <option value="done">DONE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Kapsul Yodium</label>
                                                    <select name="kapsul_yodium" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected value="<?= $content['kapsul_yodium'] ?>"><?= $content['kapsul_yodium'] ?></option>
                                                        <option value="undone">UNDONE</option>
                                                        <option value="done">DONE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hasil Penimbangan</label>
                                                    <input type="text" name="hasil_penimbangan" class="form-control" placeholder="Hasil Penimbangan" value="<?= $content['hasil_penimbangan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Resiko</label>
                                                    <input type="text" name="resiko" class="form-control" placeholder="Resiko.." value="<?= $content['resiko'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hasil Pemeriksaan</label>
                                                    <input type="text" name="hasil_pemeriksaan" class="form-control" placeholder="Hasil Pemerikasaan" value="<?= $content['hasil_pemeriksaan'] ?>">
                                                </div>
                                            </div>
                                            <?php elseif($content['status'] === 'undone'): ?>
                                            <?php endif ?>
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