<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

        <div class="content-wrapper">
        <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
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
                              <h4 class="card-title float-left"><?= $pages ?></h4>
                                <div class="card-title float-right">
                                    <a href="<?= base_url('dashboard/jadwal/add') ?>" class="btn btn-primary btn-md"><i
                                                    class="far fa-user-plus"></i> Tambah Jadwal</a>
                                </div>
                      <div class="table-responsive">
                          <table id="table" class="display expandable-table" style="width:100%">
                            <thead>
                              <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Waktu</th>
                                                <th>User</th>
                                                <th>Status</th>
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
                                                <td><?php echo $row->title; ?></td>
                                                <td><?php echo $row->date; ?></td>
                                                <td><?php echo $row->username ?></td>
                                                <td>
                                                    <?php if($row->status === 'done'): ?>
                                                        <!--do something-->
                                                        <label class="badge badge-warning"><?= strtoupper($row->status) ?></label>
                                                    <?php elseif($row->status === 'undone'): ?>
                                                        <!--do something-->
                                                        <label class="badge badge-danger"><?= strtoupper($row->status) ?></label>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/jadwal/detail/'.$row->id) ?>" class="btn btn-primary"><i
                                                    class="far fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url('dashboard/jadwal/edit/'.$row->id) ?>" class="btn btn-warning"><i
                                                    class="far fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('dashboard/jadwal/delete/'.$row->id) ?>" class="btn btn-danger"><i
                                                    class="far fa-trash"></i> Delete</a>
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