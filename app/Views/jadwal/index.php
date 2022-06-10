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
                                <th>Judul</th>
                                <th>Waktu</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if($content): ?>
                            <?php 
                            $no = 1;
                            foreach($content as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td>
                                                    <?php if($row->status === 'done'): ?>
                                                        <!--do something-->
                                                        <label class="badge badge-warning"><?= strtoupper($row->status) ?></label>
                                                    <?php elseif($row->status === 'undone'): ?>
                                                        <!--do something-->
                                                        <label class="badge badge-danger"><?= strtoupper($row->status) ?></label>
                                                    <?php endif ?>  
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