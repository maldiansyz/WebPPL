<!-- index hanya untuk konten -->
<?php
$role_id = $this->session->userdata('role_id');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12">
            <!-- Illustrations -->
            <div class="card shadow ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Detail Transaksi</h6>
                </div>
                <div class="card-body border-bottom-primary ">
                    <table class="responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th width="250px">Kode Transaksi</th>
                                    <td>: <?php echo $tran['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>: <?php echo $tran['date_created']; ?></td>
                                </tr>
                                <tr>
                                    <th>Customer</th>
                                    <td>: <?php echo $tran['id_cus']; ?></td>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <td>: <?php echo $tran['id_user']; ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>: <?php echo $tran['total_tran']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!-- End Isi Konten -->
<!-- /.container-fluid -->