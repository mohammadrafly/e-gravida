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
                                    <a href="<?= base_url('dashboard/user/add') ?>" class="btn btn-primary btn-md"><i
                                                    class="far fa-user-plus"></i> Tambah User</a>
                                </div>
                      <div class="table-responsive">
                          <table id="table" class="display expandable-table" style="width:100%">
                            <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Username</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Role</th>
                                  <th>Suami</th>
                                  <th>Tempat Lahir</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Alamat</th>
                                  <th>Umur</th>
                                  <th>Join</th>    
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
                                  <td><?php echo $row->name; ?></td>
                                  <td><?php echo $row->email; ?></td>
                                  <td><?php echo $row->phone; ?></td>
                                  <td><?php echo $row->role; ?></td>
                                  <td><?php echo $row->suami; ?></td>
                                  <td><?php echo $row->tempatlahir; ?></td>
                                  <td><?php echo $row->tanggallahir; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                  <td><?php echo $row->umur; ?></td>
                                  <td><?php echo $row->created_at; ?></td>
                                  <td>
                                    <a href="<?= base_url('dashboard/user/edit/'.$row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url('dashboard/user/delete/'.$row->id) ?>" class="btn btn-danger btn-sm">Delete</a>
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