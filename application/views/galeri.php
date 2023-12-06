<!-- Home -->

<!-- Page Content -->

<div class="page_content mt-5">
    <div class="container">
        <div class="row row-lg-eq-height">

            <!-- Main Content -->

            <div class="col-lg-12 mt-5 mb-3">
                <div class="main_content">

                    <!-- Blog Section - Don't Miss -->

                    <!-- Blog Section - Latest -->

                    <div class="blog_section mt-5 mb-3">
                        <div class="section_panel d-flex flex-row align-items-center justify-content-start">
                            <div class="section_title">Galeri</div>
                        </div>
                        <div class="section_content">
                            <div class="row">

                                <!-- Small Card With Image -->
                                <?php foreach ($galeri as $ten) { ?>
                                    <div class="col-lg-4">
                                        <div class="card card_small_with_image grid-item">
                                            <a href="<?= base_url('assets/upload/galeri/' . $ten['foto']); ?>" class="fancybox" data-fancybox="galeri">
                                                <img class="card-img-top" src="<?= base_url('assets/upload/galeri/' . $ten['foto']) ?>" alt="">
                                            </a>
                                            <div class="card-body">
                                                <h4><?= $ten['judul'] ?></h4>
                                                <small class="post_meta"><a href="#"></a><span><?= $ten['tanggal'] ?></span></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Sidebar -->

        </div>
    </div>
</div>

<!-- Footer -->