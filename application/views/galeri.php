<!-- Home -->

<!-- Page Content -->

<div class="page_content mt-5">
    <div class="container">
        <div class="row row-lg-eq-height">

            <!-- Main Content -->

            <div class="col-lg-12 mt-5">
                <div class="main_content">

                    <!-- Blog Section - Don't Miss -->

                    <!-- Blog Section - Latest -->

                    <div class="blog_section mt-5">
                        <div class="section_panel d-flex flex-row align-items-center justify-content-start">
                            <div class="section_title">Galeri</div>
                        </div>
                        <div class="section_content">
                            <div class="row">

                                <!-- Small Card With Image -->
                                <?php foreach ($galeri as $ten) { ?>
                                    <div class="col-lg-4">
                                        <div class="card card_small_with_image grid-item">
                                            <img class="card-img-top" src="<?= base_url('assets/upload/galeri/' . $ten['foto']) ?>" alt="">
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
                <!-- <div class="load_more">
                            <div id="load_more" class="load_more_button text-center trans_200">Load More</div>
                        </div> -->
            </div>

            <!-- Sidebar -->

        </div>
    </div>
</div>

<!-- Footer -->