<!-- index hanya untuk konten -->
<?php
$id = $this->session->userdata('id');
$role_id = $this->session->userdata('role_id');
if ($role_id == '2') {
    $queryData = "SELECT `tb_barang`.`id`,`nama`,`jenis`,`jumlah`,`harga`,`tb_barang`.`id_user`
                    FROM `tb_barang` JOIN `tb_user` 
                    ON `tb_barang`.`id_user` = `tb_user`.`id`
                    WHERE `tb_barang`.`id_user` = $id
        ";
    $barang = $this->db->query($queryData)->result_array();
} else {
    $barang = $this->db->get('tb_barang')->result_array();
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Isi Konten -->
    <div class="row">
        <div class="col-lg-12 ">
            <?= $this->session->flashdata('message'); ?>

            <!-- <a href="<?= base_url('user/tambahbarang'); ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addbarang"> + Add Barang</a> -->

            <a href="<?= base_url('user/tambahbarang'); ?>" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#addbarang">
                <span class="icon text-white-5-0">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Add Barang</span>
            </a>
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Jenis</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($barang as $brg) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $brg['nama']; ?></td>
                                        <td><?php echo $brg['jenis']; ?></td>
                                        <td><?php echo $brg['jumlah']; ?></td>
                                        <td>Rp. <?php echo $brg['harga']; ?></td>
                                        <td><a href="<?= base_url(); ?>user/detailbrg/<?= $brg['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                                            <a href="<?= base_url(); ?>user/editbrg/<?= $brg['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url(); ?>user/hapusbrg/<?= $brg['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk Hapus ?');">Hapus</a>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </>
        <!-- End Isi Konten -->
    </div>

    <!-- add Barang Modal -->
    <div class="modal fade" id="addbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('user/tambahbarang'); ?>
                    <input type="hidden" name="id">
                    <input type="hidden" name="id_user" value="<?= $tb_user['id']; ?>">
                    <div class="form-group">
                        <label class="control-label">Nama Barang</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="nama" name="nama" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Barang</label>
                        <div class="input-group">
                            <select class="form-control" id="jenis" name="jenis" required="required">
                                <option>Pilih Jenis Barang </option>
                                <option>PC & Laptop</option>
                                <option>Smartphone & Tablet</option>
                                <option>Electronic </option>
                                <option>Accesoriess</option>
                                <option>Lain-lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="harga" name="harga" required="required" placeholder="Rp.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah Barang</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gbr" id="gbr">
                            <label class="custom-file-label" for="gbr">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
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

    </div>
</div>
</div>
<!-- /.container-fluid -->