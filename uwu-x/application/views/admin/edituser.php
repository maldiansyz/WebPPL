<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- Isi Konten -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
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
                <input type="text" class="form-control" id="username" name="username" required="required" value="<?= $user['username']; ?>">
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
                <input type="text" class="form-control" id="alamat" name="alamat" required="required" value="<?= $user['alamat']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">No Telp</label>
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="notelp" name="notelp" required="required" value="<?= $user['notelp']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <?php foreach ($gender as $gd) : ?>
                    <?php if ($gd == $user['gender']) : ?>
                        <option value="<?= $gd; ?>" selected><?= $gd; ?></option>
                    <?php else : ?>
                        <option value="<?= $gd; ?>"><?= $gd; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id">
                <?php foreach ($role_id as $r) : ?>
                    <?php if ($r == $user['role_id']) : ?>
                        <option value="<?= $r; ?>" selected><?= $r; ?></option>
                    <?php else : ?>
                        <option value="<?= $r; ?>"><?= $r; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 ">Picture</div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" float="right">Save changes</button>
    </form>
    <!-- End Isi Konten -->

</div>


</div>
<!-- /.container-fluid -->