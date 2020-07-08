<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Isi Konten -->
    <div class="row">

        <div class="col-lg-4 mb-4">
            <!-- Illustrations -->
            <div class="card shadow border-bottom-primary ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">Images</h6>
                </div>
                <div class="card-body  ">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">

                </div>
            </div>
        </div>
        <div class="col-4 col-sm-6">

            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Fullname </td>
                                    <td>: <?php echo $user['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>: <?php echo $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: <?php echo $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td>: <?php echo $user['notelp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>: <?php echo $user['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> :<?php echo $user['alamat']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Isi Konten -->

</div>


</div>
<!-- /.container-fluid -->