<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

        <div class="content-wrapper">
        <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title float-left"><?= $pages ?></h4>
                      <div class="table-responsive">
                          <table id="table" class="display expandable-table" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Pasien</th>
                                <th>Kandungan Ke</th>
                                <th>Usia Kandungan</th>
                                <th>Berat Terbaru</th>
                                <th>Berat Awal</th>
                                <th>HPHT</th>
                                <th>Prediksi Kelahiran</th>
                                <th>Tinggi</th>
                                <th>Kondisi Kehamilan</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if($content): ?>
                            <?php 
                            $no = 1;
                            foreach($content as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->kandungan; ?></td>
                                <td><?php echo $row->usia; ?> Hari</td>
                                <td><?php echo $row->berat_terbaru; ?></td>
                                <td><?php echo $row->berat_awal; ?></td>
                                <td><?php echo $row->hpht; ?></td>
                                <td><?php echo $row->prediksi; ?></td>
                                <td><?php echo $row->tinggi; ?></td>
                                <td><?php echo $row->kondisi; ?></td>
                                <td>
                                    <a href="<?= base_url('dashboard/kandungan/edit/'.$row->id) ?>" class="btn btn-warning"><i
                                        class="far fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

            
        
                
<?= $this->endSection() ?>