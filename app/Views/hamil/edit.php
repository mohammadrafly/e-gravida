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
                    <input type="hidden" class="form-control" id="exampleInputEmail2" name="id" value="<?= $content->id ?>">
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kehamilan Ke</label>
                      <div class="col-sm-9">
                        <input name="kandungan" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->kandungan ?>" placeholder="Masukkan Kandungan Ke.." >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Usia Kandungan/Minggu Ke</label>
                      <div class="col-sm-9">
                        <input name="usia" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->usia ?>" placeholder="Masukkan Usia Kandungan" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Berat Badan (Awal Kehamilan)</label>
                      <div class="col-sm-9">
                        <input name="berat_awal" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->berat_awal ?>" placeholder="Masukkan Berat Awal" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Berat Badan (Terbaru)</label>
                      <div class="col-sm-9">
                        <input name="berat_terbaru" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->berat_terbaru ?>" placeholder="Masukkan Berat Terbaru" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tinggi Badan</label>
                      <div class="col-sm-9">
                        <input name="tinggi" type="number" class="form-control" id="exampleInputEmail2" value="<?= $content->tinggi ?>" placeholder="Masukkan Tinggi Badan" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kondisi Kandungan</label>
                      <div class="col-sm-9">
                        <input name="kondisi" type="text" class="form-control" id="exampleInputEmail2" value="<?= $content->kondisi ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Hari Pertama Haid Terakhir (HPHT)</label>
                      <div class="col-sm-9">
                        <input name="hpht" type="date" class="form-control" id="exampleInputEmail2" value="<?= $content->hpht ?>" placeholder="Masukkan Hari Pertama Haid Terakhir (HPHT)"  >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Prediksi Kelahiran</label>
                      <div class="col-sm-9">
                        <input name="prediksi" type="date" class="form-control" id="exampleInputEmail2" value="<?= $content->prediksi ?>" disabled>
                      </div>
                    </div>
                    <?php endforeach ?>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?= $this->endSection() ?>