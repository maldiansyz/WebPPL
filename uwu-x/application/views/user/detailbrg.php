<!-- index hanya untuk konten -->
<?php
$role_id = $this->session->userdata('role_id');
if ($role_id == '2') {
    $id = $this->session->userdata('id');
    $query2 = "SELECT `tb_user`.`username`
                    FROM `tb_user` JOIN `tb_barang` 
                    ON `tb_user`.`id` = `tb_barang`.`id_user`
                    WHERE `tb_user`.`id` = $id
        ";
    $seller = $this->db->query($query2)->row_array();
} else {
    $id = $brg['id_user'];
    $query1 = "SELECT `tb_user`.`username`
                    FROM `tb_user` JOIN `tb_barang` 
                    ON `tb_user`.`id` = `tb_barang`.`id_user`
                    WHERE `tb_user`.`id` = $id
        ";
    $seller = $this->db->query($query1)->row_array();
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Isi Konten -->

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-4 mb-4">
            <!-- Illustrations -->
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Images</h6>
                </div>
                <div class="card-body border-bottom-primary ">
                    <img src="<?= base_url('assets/img/barang/') . $brg['gbr']; ?>" alt="" class="img-fluid">

                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <!-- Illustrations -->
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Detail</h6>
                </div>
                <div class="card-body border-bottom-primary">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th width="250px">Nama Barang </th>
                                    <td>: <?php echo $brg['nama']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Barang</th>
                                    <td>: <?php echo $brg['jenis']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah </th>
                                    <td>: <?php echo $brg['jumlah']; ?></td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>: Rp. <?php echo $brg['harga']; ?></td>
                                </tr>
                                <tr>
                                    <th>Penjual</th>
                                    <td>: <?= $seller['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>: <?php echo $brg['detail']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Isi Konten -->

    </div>

</div>


</div>
<!-- /.container-fluid -->