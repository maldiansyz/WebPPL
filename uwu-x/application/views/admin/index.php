<!-- index hanya untuk konten -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Isi Konten Disini -->
    <!-- Content Row -->
    <div class="row ">

        <div class="col-lg-12 mb-4">
            <!-- Welcome -->
            <div class="card shadow mb-3">
                <div class="card-header py-3  bg-gradient-primary ">
                    <h6 class="m-0 font-weight-bold text-primary text-gray-100">Welcome</h6>
                </div>
                <div class="card-body border-bottom-primary text-center">
                    <h1>
                        Welcome to UwU-X E-Commerce
                    </h1>
                    <p>Hai <b><?= $tb_user['name']; ?></b>, Selamat Datang di Web E-Commerce UwU-X</p>
                    <p class="badge badge-info text-white">Member since<strong> <?= date('d F Y', $tb_user['date_created']); ?></strong></p>

                </div>
            </div>

        </div>
        <!-- Kartu User -->
        <div class="col-xl-3 col-md-6 mb-4 ">
            <div class="card border-left-primary shadow h-100 py-2 ">
                <div class="card-body ">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_user['jml']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Total Barang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_barang['jml']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Total Barang Terjual -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Transaksi</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <!-- <?php echo $jml_tran['jml']; ?> -->2
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Online -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Barang Terjual</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">


        <!-- Collapsable Card Example -->
        <div class="col-lg-6">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">System Overview</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        Sebuah perangkat lunak yang yang didalamnya terdapat kegiatan jual beli atau transaksi melalui
                        jaringan internet.
                        Melibatkan beberapa pihak-pihak yang terkait dalam menjalankan dan mengelola proses bisnis sehingga
                        memberikan keuntungan masing-masing.
                    </div>
                </div>
            </div>
        </div>

        <!-- End Isi Konten -->

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->