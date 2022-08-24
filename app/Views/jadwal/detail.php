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
                                <form>
                                <?= csrf_field() ?>
                                    <div class="form-body">
                                    <input type="text" name="id" class="form-control"  value="<?= $content['id'] ?>" hidden>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control"  value="<?= $content['title'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="date" class="form-control"  value="<?= $content['date'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status Jadwal</label>
                                                    <input type="text" name="status" class="form-control" value="<?= $content['status'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lila (Lingkar Lengan Atas)</label>
                                                    <input type="number" name="lila" class="form-control" value="<?= $content['lila'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PMT Pemulihan</label>
                                                    <input type="text" name="pmt_pemulihan" class="form-control" value="<?= $content['pmt_pemulihan'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tambah Darah</label>
                                                    <input type="text" name="tambah_darah" class="form-control" value="<?= $content['tambah_darah'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Imunisasi TT</label>
                                                    <input type="text" name="imunisasi_tt" class="form-control" value="<?= $content['imunisasi_tt'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kapsul Yodium</label>
                                                    <input type="text" name="kapsul_yodium" class="form-control" value="<?= $content['kapsul_yodium'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hasil Penimbangan</label>
                                                    <input type="text" name="hasil_penimbangan" class="form-control" value="<?= $content['hasil_penimbangan'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Resiko</label>
                                                    <input type="text" name="resiko" class="form-control" value="<?= $content['resiko'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hasil Pemeriksaan</label>
                                                    <input type="text" name="hasil_pemeriksaan" class="form-control" value="<?= $content['hasil_pemeriksaan'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?= $this->endSection() ?>