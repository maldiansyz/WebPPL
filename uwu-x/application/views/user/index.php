<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary ">My Profile</h6>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="card-body border-bottom-primary">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                            <img class="card-img" src=" <?= base_url('assets/img/profile/') . $tb_user['image']; ?>">
                        </div>
                        <div class=" col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><strong> <?= $tb_user['name']; ?></strong></h5>
                                <p class="card-text"><?= $tb_user['email']; ?> </p>
                                <p class="badge badge-info text-white">Member since<strong> <?= date('d F Y', $tb_user['date_created']); ?></strong></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->