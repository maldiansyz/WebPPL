<!-- index hanya untuk konten -->
<?php
$id = $this->session->userdata('id');
$role_id = $this->session->userdata('role_id');
if ($role_id == '2') {
    $queryData = "SELECT `tb_tran`.`id`,`tb_tran`.`date_created`,`id_cus`,`total_tran`,`status`,`date_pay`
                    FROM `tb_tran` JOIN `tb_user` 
                    ON `tb_tran`.`id_user` = `tb_user`.`id`
                    WHERE `tb_tran`.`id_user` = $id
        ";
    $transaksi = $this->db->query($queryData)->result_array();
    $jml = $this->db->query($queryData)->num_rows();
} else {
    $transaksi = $this->db->get('tb_tran')->result_array();
    $jml = $this->db->get('tb_tran')->num_rows();
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Isi Konten -->
    <div class="row">
        <div class="col-lg-12">

            <button class="btn btn-primary mb-3">Total Transaksi <span class="badge badge-light"><?= $jml; ?></span>
                <span class="sr-only">unread messages</span>
            </button>
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel List Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Kode Transaksi</th>
                                    <th>ID Cus</th>
                                    <?php if ($role_id == 1) : ?>
                                        <th>ID User</th>
                                    <?php endif; ?>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tgl Bayar</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transaksi as $tr) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $tr['date_created']; ?></td>
                                        <td><?= $tr['id']; ?></td>
                                        <td><?= $tr['id_cus']; ?></td>
                                        <?php if ($role_id == 1) : ?>
                                            <td><?= $tr['id_user']; ?></td>
                                        <?php endif; ?>
                                        <td>Rp. <?= $tr['total_tran']; ?></td>
                                        <?php if ($tr['status'] == 1) : ?>
                                            <td><span class="badge badge-pill badge info">Lunas</span></td>
                                        <?php else : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $tr['date_pay']; ?></td>
                                        <td><a href="<?= base_url(); ?>user/detailTran/<?= $tr['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                                            <a href="<?= base_url(); ?>user/hapusbrg/<?= $tr['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk Hapus ?');">Hapus</a>
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



    <!-- Modal Detail Transaksi -->
    <div class="modal fade" id="ModalDetailTransaksi" tabindex="-1" role="dialog" aria-labelledby="ModalDetailTransaksi" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalDetailTransaksi">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->