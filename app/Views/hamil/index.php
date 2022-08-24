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
                  <form action="<?= base_url('dashboard/kondisikehamilan/store'); ?>" class="forms-sample" method="post"> 
                  <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="exampleInputEmail2" name="user" value="<?= session()->get('id') ?>">
                    <input name="id" class="form-control" value="<?= $content['id'] ?>" hidden>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Hari Pertama Haid Terakhir (HPHT)</label>
                      <div class="col-sm-9">
                        <input name="test" type="date" id="hpht" class="form-control" onchange="myFunction(event)" value="<?php echo $content['hpht'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kehamilan Ke</label>
                      <div class="col-sm-9">
                        <input name="kandungan" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content['kandungan'] ?>" placeholder="Masukkan Kandungan Ke.." >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Usia Kandungan(Minggu)</label>
                      <div class="col-sm-9">
                        <input name="usia" type="text" class="form-control" id="usiaKandungan"  value="<?= $content['usia'] ?>" placeholder="Usia Kandungan" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Berat Badan (Awal Kehamilan)</label>
                      <div class="col-sm-9">
                        <input name="berat_awal" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content['berat_awal'] ?>" placeholder="Masukkan Berat Awal" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Berat Badan (Terbaru)</label>
                      <div class="col-sm-9">
                        <input name="berat_terbaru" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content['berat_terbaru'] ?>" placeholder="Masukkan Berat Terbaru" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tinggi Badan</label>
                      <div class="col-sm-9">
                        <input name="tinggi" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content['tinggi'] ?>" placeholder="Masukkan Tinggi Badan" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kondisi Kandungan</label>
                      <div class="col-sm-9">
                        <input name="kondisi" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content['kondisi'] ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Prediksi Kelahiran</label>
                      <div class="col-sm-9">
                        <input name="prediksi" type="text" class="form-control" value="<?= $content['prediksi'] ?>" id="hpl" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Persalinan</label>
                      <div class="col-sm-9">
                        <input name="hpht" type="date" class="form-control" value="<?php echo $content['tanggal_persalinan'] ?>" readonly>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection() ?>