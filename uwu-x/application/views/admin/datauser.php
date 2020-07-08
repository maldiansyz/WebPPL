<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Isi Konten -->
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>

            <!-- <a href="<?= base_url('admin/tambahuser'); ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#adduser"> + Add User </a> -->

            <a href="<?= base_url('admin/tambahuser'); ?>" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#adduser">
                <span class="icon text-white-5-0">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Add User</span>
            </a>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_user as $user) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['role_id']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/detailuser/<?= $user['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                                            <a href="<?= base_url(); ?>admin/edituser/<?= $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url(); ?>admin/hapususer/<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk Hapus ?');">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Isi Konten -->
</div>
<!-- add user Modal -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adduser">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/tambahuser'); ?>
                <input type="hidden" name="id">
                <div class="form-group">
                    <label class="control-label">Fullname</label>
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control" id="name" name="name" required="required" placeholder="Masukkan Nama Lengkap">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control" id="username" name="username" required="required" placeholder="Masukkan Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control" id="email" name="email" required="required" placeholder="Masukkan E-mail">

                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Role</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="role_id" id="role_id1" value="1" checked="checked">1. Administrator
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="role_id" id="role_id2" value="2">2. Member
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- detail user Modal 
<div class="modal fade" id="detailuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-8 col-sm-6">
                <?php echo $user['image']; ?>
            </div>
            <div class="col-4 col-sm-6">
            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Fullname </td>
                                        <td><?php echo $user['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $user['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $user['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp</td>
                                        <td><?php echo $user['notelp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $user['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?php echo $user['alamat']; ?></td>
                                    </tr>
                                    
                                </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

<!-- edit user Modal 
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduser">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="post">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>" >
                    <div class="form-group">
                        <label class="control-label">Fullname</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="name" name="name" required="required" value="<?= $user['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="username" name="username" required="required"value="<?= $user['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="email" name="email" required="required" value="<?= $user['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="email" name="email" required="required" value="<?= $user['alamat']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Telp</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="email" name="email" required="required" value="<?= $user['notelp']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="email" name="email" required="required" value="<?= $user['alamat']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <?php foreach ($gender as $gd) : ?>
                                <?php if ($gd = $user['gender']) : ?>
                                    <option value="<?= $gd; ?>"selected><?= $gd; ?></option>
                                <?php else : ?>
                                    <option value="<?= $gd; ?>"><?= $gd; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gambar</label>
                        <input type="file" class="fileinput btn-primary" name="image" id="image" class="form-control" title="Browse file" value="<?= $user['image']; ?>">
                        <span class="help-block">Input File Gambar</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div> -->
<!------>