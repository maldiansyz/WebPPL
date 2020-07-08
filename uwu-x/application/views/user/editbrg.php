<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Edit Barang</h6>
                </div>
                <div class="card-body border-bottom-primary ">
                    <!--  Isi Konten -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $brg['id']; ?>">
                        <div class="form-group ">
                            <label class="control-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" required="required" value="<?= $brg['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Barang</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <?php foreach ($jenis as $j) : ?>
                                    <?php if ($j == $brg['jenis']) : ?>
                                        <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required="required" value="<?= $brg['harga']; ?>">
                        </div>
                        <div class="form-group ">
                            <label class="control-label">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" required="required" value="<?= $brg['jumlah']; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="email">Picture</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/barang/') . $brg['gbr']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gbr" id="gbr">
                                        <label class="custom-file-label" for="gbr">Choose File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" class="form-control" id="detail" name="detail" rows="3" value="<?= $brg['detail']; ?>"></textarea>
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



<!-- /.container-fluid -->