<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $judul_halaman; ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?= base_url('assets/niceadmin/') ?>assets/img/logosmkk.jpg" rel="icon">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= base_url('assets/niceadmin/') ?>assets/css/style.css" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/aq37vou6o6fl7r2lfo92721t18z6173r03hevnh6qpu52i0f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="<?= base_url('assets/niceadmin/') ?>assets/img/logosmkk.jpg">
				<span class="d-none d-lg-block">Skandakra</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->
		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">

				<!-- End Messages Nav -->

				<li class="nav-item dropdown pe-3">

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="<?= base_url('assets/niceadmin/profile/') . $pengguna->image  ?>" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama') ?></span>
					</a><!-- End Profile Iamge Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6><?= $this->session->userdata('nama') ?></h6>
							<span><?= $this->session->userdata('level') ?></span>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/password/') ?>">
								<i class="bi bi-person"></i>
								<span>Password</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>

					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->

			</ul>
		</nav><!-- End Icons Navigation -->

	</header><!-- End Header -->

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">
			<?php $menu =  $this->uri->segment(2) ?>
			<li class="nav-item ">
				<a class="nav-link <?php if ($menu == 'home') {
										echo '';
									} else {
										echo "collapsed";
									} ?> " href="<?= site_url('admin/home') ?>">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php if ($menu == 'caraousel') {
										echo '';
									} else {
										echo "collapsed";
									} ?> " href="<?= site_url('admin/caraousel') ?>">
					<i class="ri-article-line"></i>
					<span>Caraousel</span>
				</a>
			</li><!-- End Profile Page Nav -->

			<li class="nav-item ">
				<a class="nav-link <?php if ($menu == 'kategori') {
										echo '';
									} else {
										echo "collapsed";
									} ?>" href="<?= site_url('admin/kategori') ?>">
					<i class="ri-file-list-2-line"></i>
					<span>Kategori Konten</span>
				</a>
			</li><!-- End F.A.Q Page Nav -->

			<li class="nav-item">
				<a class="nav-link <?php if ($menu == 'konten') {
										echo '';
									} else {
										echo "collapsed";
									} ?>" href="<?= site_url('admin/konten') ?>">
					<i class="ri-layout-left-2-line"></i>
					<span>Konten</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($menu == 'galeri') {
										echo '';
									} else {
										echo "collapsed";
									} ?>" href="<?= site_url('admin/galeri') ?>">
					<i class="ri-picture-in-picture-2-fill"></i>
					<span>Galeri</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($menu == 'saran') {
										echo '';
									} else {
										echo "collapsed";
									} ?>" href="<?= site_url('admin/saran') ?>">
					<i class="ri-message-2-fill"></i>
					<span>Saran</span>
				</a>
			</li>
			<?php if ($this->session->userdata('level') == 'Admin') { ?>
				<li class="nav-item ">
					<a class="nav-link <?php if ($menu == 'user') {
											echo '';
										} else {
											echo "collapsed";
										} ?>" href="<?= site_url('admin/user') ?>">
						<i class="bi bi-person"></i>
						<span>User</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if ($menu == 'konfigurasi') {
											echo '';
										} else {
											echo "collapsed";
										} ?>" href="<?= site_url('admin/konfigurasi') ?>">
						<i class="ri-settings-line"></i>
						<span>Konfigurasi</span>
					</a>
				</li>
			<?php } ?>

	</aside><!-- End Sidebar-->

	<main id="main" class="main">

		<div class="pagetitle">
			<h1><?= $judul_halaman; ?></h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><?= $controller ?></a></li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<section class="section dashboard">
			<?= $contents ?>
		</section>

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
		<div class="copyright">
			&copy; Copyright <strong><span>yoo.dwiio</span></strong>. All Rights Reserved
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/chart.js/chart.umd.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/echarts/echarts.min.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.min.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
	<script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="<?= base_url('assets/niceadmin/') ?>assets/js/main.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
		});
	</script>

	<script>
		$('#hilang').delay('slow').slideDown('slow').delay(4000).slideUp(600);
	</script>
	<script>
		$(document).ready(function() {
			$('#table1').dataTable();
		});
	</script>


</body>

</html>