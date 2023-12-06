<div style="min-height: 500px;">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?= base_url('admin/caraousel') ?>">Caraousel</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Caraousel <span>| jumlah</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-article-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $caraousel ?></h6>
                                        <span class="text-success small pt-1 fw-bold">Caraousel</span> <span class="text-muted small pt-2 ps-1">tersedia</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?= base_url('admin/konten') ?>">konten</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Konten <span>| jumlah</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-layout-left-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $konten ?></h6>
                                        <span class="text-success small pt-1 fw-bold">konten</span> <span class="text-muted small pt-2 ps-1">tersedia</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?= base_url('admin/galeri') ?>">Galeri</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Galeri <span>| jumlah</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-picture-in-picture-2-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $galeri ?></h6>
                                        <span class="text-danger small pt-1 fw-bold">Galeri</span> <span class="text-muted small pt-2 ps-1">tersedia</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="<?= base_url('admin/saran') ?>">Saran</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Saran <span>| jumlah</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-message-2-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $saran ?></h6>
                                        <span class="text-danger small pt-1 fw-bold">Saran</span> <span class="text-muted small pt-2 ps-1">tersedia</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                </div><!-- End Right side columns -->

            </div>
    </section>
    <div class="row">
        <div class="col-xl-4">
            <!-- Kategori Konten -->
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Kategori Konten</h2>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-thead-border">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jumlah_konten as  $value) : ?>
                                <tr>
                                    <td class="text-dark font-weight-bold"><?= $value->kategori; ?></td>
                                    <td class="text-right"><?= $value->jumlah_konten; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="border-top">
                            <tr>
                                <td><a href="<?= base_url('admin/kategori'); ?>" class="text-uppercase">See All</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>