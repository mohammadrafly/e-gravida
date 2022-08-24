<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Kandungan</h4>
                  <?php if (!empty(session()->getFlashdata('success'))) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('success'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (!empty(session()->getFlashdata('error'))) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('error'); ?>
                      </div>
                  <?php endif; ?>
                  <form action="<?= base_url('Hamil/storeAdmin'); ?>" class="forms-sample" method="post"> 
                  <?= csrf_field(); ?>
                  <?php foreach($content as $content): ?>
                    <input name="id" class="form-control" value="<?= $content->id ?>" hidden>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Hari Pertama Haid Terakhir (HPHT)</label>
                      <div class="col-sm-9">
                      <input name="hpht" type="date" id="hpht" class="form-control" onchange="myFunction(event)" value="<?php echo $content->hpht ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label fo r="exampleInputEmail2" class="col-sm-3 col-form-label">Kehamilan Ke</label>
                      <div class="col-sm-9">
                        <input name="kandungan" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->kandungan ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Usia Kandungan(Minggu)</label>
                      <div class="col-sm-9">
                        <input name="usia" type="text" class="form-control" id="usiaKandungan" value="<?= $content->usia ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Berat Badan (Awal Kehamilan)</label>
                      <div class="col-sm-9">
                        <input name="berat_awal" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->berat_awal ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Berat Badan (Terbaru)</label>
                      <div class="col-sm-9">
                        <input name="berat_terbaru" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->berat_terbaru ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tinggi Badan</label>
                      <div class="col-sm-9">
                        <input name="tinggi" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->tinggi ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kondisi Kandungan</label>
                      <div class="col-sm-9">
                        <input name="kondisi" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content->kondisi ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Prediksi Kelahiran</label>
                      <div class="col-sm-9">
                        <input name="prediksi" type="text" class="form-control" value="<?= $content->prediksi ?>" id="hpl" readonly>
                      </div>
                    </div>
                    <?php if($content->tanggal_persalinan): ?>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Persalinan</label>
                      <div class="col-sm-9">
                        <input name="tanggal_persalinan" type="date" class="form-control" value="<?= $content->tanggal_persalinan ?>" readonly>
                      </div>
                    </div>
                    <?php elseif($content->tanggal_persalinan === NULL): ?>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Persalinan</label>
                      <div class="col-sm-9">
                        <input name="tanggal_persalinan" type="date" class="form-control" value="<?= $content->tanggal_persalinan ?>">
                      </div>
                    </div>
                    <?php endif ?>
                    <?php if($content->tanggal_persalinan): ?>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kondisi Bayi</label>
                        <div class="col-sm-9">
                          <select name="kondisi_bayi" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected value="<?= $content->kondisi_bayi ?>"><?= $content->kondisi_bayi ?></option>
                            <option value="<2000 gr">< 2000 gr</option>
                            <option value="2000-25000 gr">2000 - 25000 gr</option>
                            <option value="normal">Normal</option>
                            <option value="meninggal">Meninggal</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Persalinan Di tolong oleh</label>
                        <div class="col-sm-9">
                          <select name="persalinan" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected value="<?= $content->persalinan ?>"><?= $content->persalinan ?></option>
                            <option value="nakes">Nakes</option>
                            <option value="dukun">Dukun</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kodisi Ibu</label>
                        <div class="col-sm-9">
                          <select name="kondisi_ibu" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected value="<?= $content->kondisi_ibu ?>"><?= $content->kondisi_ibu ?></option>
                            <option value="hidup">Hidup</option>
                            <option value="meninggal">Meninggal</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                          <input name="keterangan" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content->keterangan ?>">
                        </div>
                      </div>
                    <?php elseif($content->tanggal_persalinan === NULL): ?>
                    <?php endif ?>
                    <?php endforeach ?>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection() ?>