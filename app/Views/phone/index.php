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
                                        <a href="<?= base_url('dashboard/phone/add') ?>" class="btn btn-primary btn-md"><i
                                                    class="far fa-user-plus"></i> Tambah</a>           
                                </div>
                      <div class="table-responsive">
                          <table id="table" class="display expandable-table" style="width:100%">
                            <thead>
                              <tr>
                                                <th>No</th>
                                                <th>Link</th>
                                                <th>Kategori</th>
                                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                                        <?php if($content): ?>
                                        <?php 
                                        $no = 1;
                                        foreach($content as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <td><?= $row['kategori'] ?></td>
                                                <td>
                                                <a href="<?= base_url('dashboard/phone/edit/'.$row['id']) ?>" class="btn btn-warning"><i
                                                    class="far fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('dashboard/phone/delete/'.$row['id']) ?>" class="btn btn-danger"><i
                                                    class="far fa-trash-alt"></i> Delete</a>
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