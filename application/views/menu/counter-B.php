<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h1 mb-0 text-gray-800" style="text-align:center">INFORMATION SERVICE</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <!-- Pending Requests Card Example -->
                <div class="col-xl-12 col-md-2 mb-2">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Quotes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php foreach ($display as $ds) : ?>
                                    <h1 class="h1 mb-4 text-white-800" style="text-align:center"></h1>
                                    <?php endforeach; ?>
                                        <marquee><?= $ds['quotes']; ?></marquee>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card bg-primary text-white shadow mb-2">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h3 class="m-0 font-weight-bold text-primary" style="text-align:center">COUNTER B</h3>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>

                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <h1 class="h3 mb-4 text-white-800" style="text-align:center">Antrean</h1>
                                <?php foreach ($counter as $sm) : ?>
                                    <h1 class="h1 mb-4 text-white-800" style="text-align:center"><?= $sm['nama']; ?></h1>
                                    <!-- layana -->
                                <?php endforeach; ?>
                                    <h1 class="h3 mb-4 text-white-800" style="text-align:center">Layanan</h1>
                                    <?php foreach ($counter as $ly) : ?>
                                    <h1 class="h1 mb-4 text-white-800" style="text-align:center"><?= $ly['layanan']; ?></h1>
                                    <?php endforeach; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Video</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                            <?php foreach ($display as $vd) : ?>
                            <video width="360" height="auto" controls>
                                <source src="<?= base_url('assets/img/profile/') . $vd['video']; ?>" type="video/mp4"/>
                            </video>
                            <?php endforeach; ?>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i>
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i>
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>