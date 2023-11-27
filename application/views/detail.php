<head>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/post.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/responsive.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/post_responsive.css">
</head>
<!-- Home -->
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-speed="0.8"> <img src="<?= base_url('assets/upload/konten/' . $konten->foto) ?>" style="width:100%; height:100%;"></div>
    <div class="home_content">
        <div class="post_title"><?= $konten->judul ?></div>
    </div>
</div>
<!-- Page Content -->

<div class="page_content">
    <div class="container">
        <div class="row row-lg-eq-height">

            <!-- Main Content -->

            <div class="col-lg-9">
                <div class="post_content">

                    <!-- Top Panel -->
                    <div class="post_panel post_panel_top d-flex flex-row align-items-center justify-content-start">
                        <div class="author_image">
                            <div><img src="<?= base_url('assets/avision-master/') ?>images/author.jpg" alt=""></div>
                        </div>
                        <div class="post_meta"><a href="#"><?= $konten->nama ?></a><span><?= $konten->tanggal ?></span></div>
                        <div class="post_share ml-sm-auto">
                            <span>share</span>
                            <ul class="post_share_list">
                                <li class="post_share_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li class="post_share_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li class="post_share_item"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Post Body -->

                    <div class="post_body">
                        <h3><?= $konten->judul ?></h3>
                        <figure>
                            <img src="<?= base_url('assets/upload/konten/' . $konten->foto) ?>">
                            <figcaption><?= $konten->judul ?></figcaption>
                        </figure>
                        <p class="post_p"><?= $konten->isi_konten ?></p>
                        <!-- Post Tags -->
                        <div class="post_tags">
                            <ul>
                                <?php foreach ($kategori as $tegor) { ?>
                                    <li class="post_tag"><a href="#"><?= $tegor['kategori'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Bottom Panel -->

                </div>
                <div class="load_more">
                    <div id="load_more" class="load_more_button text-center trans_200">Load More</div>
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

                                    <!-- Top Stories Slider Item -->
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