<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Kalau Error -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif;  ?>
            <!-- Kalau Sukses -->
            <?= $this->session->flashdata('message'); ?>

            <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newSubMenuModal">
                <span class="icon text-white-5-0">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Add SubMenu</span>
            </a>
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Menu Management</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sub Menu</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">url</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>Menu/editsubmenu/<?= $sm['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editsubmenu<?= $sm['id']; ?>">Edit</a>
                                            <a href="<?= base_url(); ?>Menu/hapusSubMenu/<?= $sm['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk Hapus ?');">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add New Menu -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- action dan method pake CI -->
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu title">
                    </div>
                    <div class="fom-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Modal Edit sub Menu -->
<?php $i = 1;
foreach ($submenu as $sm) : $i++; ?>
    <div class="modal fade" id="editsubmenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editmenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmenuLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- action dan method pake CI -->
                <form action="<?= base_url(); ?>Menu/editsubmenu/<?= $sm['id']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $sm['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Sub Menu Title</label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Menu</label>
                            <select class="form-control" id="menu" name="menu">
                                <?php foreach ($getmenu as $gm) : ?>
                                    <?php if ($gm == $sm['menu_id']) : ?>
                                        <option value="<?= $gm; ?>" selected><?= $gm; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $gm; ?>"><?= $gm; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Icon</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>