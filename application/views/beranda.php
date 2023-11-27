<!-- Home -->

<div class="home">
    <!-- Home Slider -->
    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">
            <?php $no = 1;
            foreach ($caraousel as $value) { ?>
                <!-- Slider Item -->
                <div class="owl-item <?php $no++;
                                        if ($no == 1) {
                                            echo 'active';
                                        } ?>">
                    <div class="home_slider_background opacity-50 " style="background-image:url(<?= base_url('assets/upload/carousel/' . $value['foto']) ?>);"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content">
                                        <div class="home_slider_item_title">
                                            <a href="post.html"><?= $value['judul'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="custom_nav_container home_slider_nav_container d-flex justify-content-center">
            <div class="custom_prev custom_prev_home_slider">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
                    <polyline fill="#FFFFFF" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
                </svg>
            </div>
            <ul id="custom_dots" class="custom_dots custom_dots_home_slider">
                <li class="custom_dot custom_dot_home_slider active"><span></span></li>
                <li class="custom_dot custom_dot_home_slider"><span></span></li>
                <li class="custom_dot custom_dot_home_slider"><span></span></li>
            </ul>
            <div class="custom_next custom_next_home_slider">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
                    <polyline fill="#FFFFFF" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->

<div class="page_content">
    <div class="container">
        <div class="row row-lg-eq-height">

            <!-- Main Content -->

            <div class="col-lg-9">
                <div class="main_content">

                    <!-- Blog Section - Don't Miss -->

                    <div class="blog_section">

                    </div>

                    <!-- Blog Section - Latest -->

                    <div class="blog_section mt-5">
                        <div class="section_panel d-flex flex-row align-items-center justify-content-start">
                            <div class="section_title">Latest Articles From Blog</div>
                        </div>
                        <div class="section_content">
                            <div class="row">

                                <!-- Small Card With Image -->
                                <?php
                                if (empty($konten)) {
                                ?>
                                    <div class="card">
                                        data not found!
                                    </div>
                                <?php } ?>
                                <?php foreach ($konten as $ten) { ?>
                                    <div class="col-lg-4">
                                        <div class="card card_small_with_image grid-item">
                                            <img class="card-img-top" src="<?= base_url('assets/upload/konten/' . $ten['foto']) ?>" alt="">
                                            <div class="card-body">
                                                <h4><?= $ten['judul'] ?></h4>
                                                <div class="card-title card-title-small"><a href="<?= base_url('home/artikel/' . $ten['slug']) ?>">Baca Selengkapnya</a></div>
                                                <small class="post_meta"><a href="#"><?= $ten['nama'] ?></a><span><?= $ten['tanggal'] ?></span></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?= $this->pagination->create_links(); ?>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Sidebar -->

            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="sidebar_background"></div>
                    <!-- Top Stories -->

                    <div class="sidebar_section">
                        <div class="sidebar_title_container">
                            <div class="sidebar_title">Categori</div>
                        </div>
                        <div class="sidebar_section_content">

                            <!-- Top Stories Slider -->
                            <div class="sidebar_slider_container">
                                <div class="owl-carousel owl-theme sidebar_slider_top">

                                    <div class="owl-item">
                                        <?php $no = 1;
                                        foreach ($kategori as $tegor) { ?>
                                            <!-- Sidebar Post -->
                                            <div class="side_post">
                                                <a href="<?= base_url('home/kategori/' . $tegor['id_kategori']) ?>">
                                                    <div class="row">
                                                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start  col-lg-12">
                                                            <div class="side_post_content">
                                                                <div class="side_post_title"><?= $no++ ?>&nbsp;<?= $tegor['kategori'] ?></div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advertising -->

                    <!-- Newest Videos -->

                    <div class="sidebar_section newest_videos mt-3 mb-5">
                        <div class="sidebar_title_container">
                            <div class="sidebar_title">Recent Post</div>
                        </div>
                        <div class="sidebar_section_content">

                            <!-- Sidebar Slider -->
                            <div class="sidebar_slider_container">
                                <div class="owl-carousel owl-theme sidebar_slider_vid">

                                    <!-- Newest Videos Slider Item -->
                                    <div class="owl-item">
                                        <?php foreach ($konten2 as $ten) { ?>
                                            <!-- Newest Videos Post -->
                                            <div class="side_post">
                                                <a href="<?= base_url('home/artikel/' . $ten['slug']) ?>">
                                                    <div class=" d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                        <div class="side_post_image">
                                                            <div><img src="<?= base_url('assets/upload/konten/' . $ten['foto'])  ?>"></div>
                                                        </div>
                                                        <div class="side_post_content">
                                                            <div class="side_post_title"><?= $ten['judul'] ?></div>
                                                            <small class="post_meta"><?= $ten['nama'] ?><span><?= $ten['tanggal'] ?></span></small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Footer -->