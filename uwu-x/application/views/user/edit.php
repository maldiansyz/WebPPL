<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Isi Konten Disini -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Edit Profile</h6>
                </div>
                <div class="card-body border-bottom-primary ">
                    <!--  Isi Konten -->
                    <?= form_open_multipart('user/edit'); ?>
                    <div class="form-group ">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $tb_user['email']; ?>" readonly>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $tb_user['name']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $tb_user['username']; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="email">Address</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tb_user['alamat']; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="email">No Telp.</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $tb_user['notelp']; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="email">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <?php foreach ($gender as $gd) : ?>
                                <?php if ($gd == $tb_user['gender']) : ?>
                                    <option value="<?= $gd; ?>" selected><?= $gd; ?></option>
                                <?php else : ?>
                                    <option value="<?= $gd; ?>"><?= $gd; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="email">Picture</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
</div>