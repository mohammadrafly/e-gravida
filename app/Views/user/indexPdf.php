<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
        
                <div class="card-body">
                  <h4 class="card-title"><?= $pages; ?></h4>
                  <form class="forms-sample" method="GET" action="<?= base_url('Users/exportPdf'); ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Mulai</label>
                      <input type="date" name="tgl_mulai" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Akhir</label>
                      <input type="date" name="tgl_akhir" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                  </form>
                </div>
                
<?= $this->endSection() ?>