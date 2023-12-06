<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $konfigurasi->judul_website ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/bootstrap4/bootstrap.min.css">
    <link href="<?= base_url('assets/avision-master/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/avision-master/') ?>styles/style.css">
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header" style="background: rgba(0, 0, 0, 0.3);">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="<?= base_url('home') ?>" class="text-light"><?= $konfigurasi->judul_website ?></a></div>
                            <nav class="main_nav">
                                <ul>
                                    <li class="active text-secondary"><a href="<?= base_url() ?>" class="text-light">Home</a></li>
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Kategori
                                            </a>
                                            <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                                                <?php foreach ($kategori as $gori) { ?>
                                                    <a class="dropdown-item text-secondary" href="<?= base_url('home/kategori/' . $gori['id_kategori']) ?>">
                                                        <?= $gori['kategori'] ?>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>

                                    <li><a href="<?= base_url('home/galeri/') ?>" class="text-light">Galeri</a></li>
                                    <li><a href="<?= base_url('home/saran') ?>" class="text-light">Saran</a></li>
                                    <li><a href="<?= base_url('auth') ?>" class="text-light">Administrator</a></li>
                                </ul>
                            </nav>
                            <div class="search_container ml-auto">
                                <form action="<?= base_url('home') ?>" method="post">
                                    <input type="text" name="keyword" class="header_search_input" placeholder="Type to Search..." autocomplete="off">
                                    <input type="submit" class="btn btn-secondary" name="submit" value="cari">
                                </form>

                            </div>
                            <div class="hamburger ml-auto menu_mm">
                                <i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu -->

        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="logo menu_mm"><a href="<?= base_url('home') ?>"><?= $konfigurasi->judul_website ?></a></div>
            <div class="search">
                <form action="<?= base_url('home') ?>" method="post">
                    <div class="row">
                        <div class="col-9">
                            <input type="text" name="keyword" class="menu_mm header_search_input" placeholder="Type to Search...">
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-secondary" name="submit" value="cari">
                        </div>
                    </div>
                </form>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="<?= base_url() ?>">home</a></li>
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kategori
                            </a>
                            <div class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                <?php foreach ($kategori as $gori) { ?>
                                    <a class="dropdown-item" href="<?= base_url('home/kategori/' . $gori['id_kategori']) ?>">
                                        <?= $gori['kategori'] ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <li class="menu_mm"><a href="<?= base_url('home/galeri') ?>">Galeri</a></li>
                    <li class="menu_mm"><a href="<?= base_url('home/saran') ?>">Saran</a></li>
                    <li class="menu_mm"><a href="<?= base_url('auth') ?>">Administrator</a></li>
                </ul>
            </nav>
        </div>

        <?= $contents; ?>

        <footer class="footer h-75">
            <div class="container">
                <div class="row row-lg-eq-height">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="footer_content">
                            <div class="footer_logo mb-2 text-left">
                                <a href=""><?= $konfigurasi->judul_website ?></a>
                            </div>
                            <div class="profile">
                                <p class="text-secondary text-left"><?= $konfigurasi->profil_website ?></p>
                                <p class="text-secondary text-left"><?= $konfigurasi->alamat ?></p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li class="footer_social_facebook"><a href="<?= $konfigurasi->facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                    <li class="footer_social_instagram"><a href="<?= $konfigurasi->instagram ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li class="footer_social_whatsapp"><a href="<?= $konfigurasi->wa ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li class="footer_social_email"><a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=<?= $konfigurasi->email ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="footer_content">
                            <div class="d-flex flex-column justify-content-start">
                                <div class="footer_logo mb-3"><a href="#">Kategori</a></div>
                                <a class="text-secondary mb-2 text-left ml-5" href="<?= base_url() ?>"><i class="fa fa-angle-right"></i> Home</a>
                                <?php foreach ($kategori as $gori) { ?>
                                    <a class="text-secondary mb-2 text-left ml-5" href="<?= base_url('home/kategori/' . $gori['id_kategori']) ?>"><i class="fa fa-angle-right mr-2"></i><?= $gori['kategori'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="footer_content">
                            <div class="d-flex flex-column justify-content-start">
                                <div class="footer_logo mb-3"><a href="#">Recent Post</a></div>
                                <a class="text-secondary mb-2 text-left ml-5" href="<?= base_url() ?>"><i class="fa fa-angle-right"></i> Home</a>
                                <?php foreach ($konten2 as $ten) { ?>
                                    <a class="text-secondary mb-2 text-left ml-5" href="<?= base_url('home/artikel/' . $ten['slug']) ?>"><i class="fa fa-angle-right mr-2"></i><?= $ten['judul'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="copyright text-center mb-4"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?= $konfigurasi->instagram ?>" target="_blank"><?= $konfigurasi->judul_website ?></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </footer>
    </div>

    <script src="<?= base_url('assets/avision-master/') ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>styles/bootstrap4/popper.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>styles/bootstrap4/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>plugins/easing/easing.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>plugins/masonry/masonry.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>plugins/masonry/images_loaded.js"></script>
    <script src="<?= base_url('assets/avision-master/') ?>js/custom.js"></script>
</body>

</html>
<style>
    .d-none {
        visibility: hidden;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('[style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"]').classList.add('d-none');
    })
</script>