<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?php echo $title ?> &mdash; Penjaminan-aman</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/components.css">

	<!-- Js -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" id="lonceng" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right">
							<div class="dropdown-header">Notifikasi
								<div class="float-right">
								</div>
							</div>
							<div class="dropdown-list-content dropdown-list-icons" id="notifikasi">

							</div>
						</div>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="<?php echo base_url() ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata("nama_lengkap") ?> | <?php echo $this->session->userdata('level'); ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="<?php echo base_url("user-profile") ?>" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url("login/logout") ?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="<?php echo base_url("dashboard") ?>">Solusi Penjaminan Aman</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="<?php echo base_url("dashboard") ?>">SPA</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li class="nav-item">
							<a href="<?php echo base_url("dashboard") ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
						</li>
						<?php if ($this->session->userdata("level") == "staf") : ?>
							<li class="nav-item">
								<a href="<?php echo base_url("pengajuan-budget") ?>" class="nav-link"><i class="fas fa-fire"></i><span>Pengajuan Budget</span></a>
							</li>
						<?php endif; ?>
					</ul>
				</aside>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1><?php echo $title ?></h1>
					</div>

					<div class="section-body">
						<?php $this->load->view($content) ?>
					</div>
				</section>
			</div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
				</div>
				<div class="footer-right">
					2.3.0
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="<?php echo base_url() ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?php echo base_url() ?>/assets/js/scripts.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	<script>
		$(document).ready(function() {
			<?php if ($this->session->userdata("level") == "staf") : ?>
				setInterval(function() {
					$.ajax({
						type: "post",
						url: "<?php echo base_url("user-notifikasi") ?>",
						data: {
							"id_user": "<?php echo $this->session->userdata("id_user") ?>"
						},
						dataType: "json",
						success: function(response) {
							$("#notifikasi").html("");
							console.log(response.length);
							if (response.length > 0) {
								$("#lonceng").addClass("beep");
							} else {
								$("#lonceng").removeClass("beep");
							};
							response.forEach(function(row, index) {
								$("#notifikasi").append(
									'<a href="<?php echo base_url("user-notifikasi/view") ?>?id=' + row["id"] + '" class="dropdown-item dropdown-item-unread">' +
									'<div class="dropdown-item-desc">' +
									' ' + row["pesan"] + ' ' +
									'</div>' +
									'</a>'
								);
							});
						},
						beforeSend: function() {},
					});
				}, 3000);
			<?php endif; ?>

			<?php if ($this->session->userdata("level") == "supervisor") : ?>
				setInterval(function() {
					$.ajax({
						type: "post",
						url: "<?php echo base_url("user-notifikasi") ?>",
						data: {
							"id_user": "<?php echo $this->session->userdata("id_user") ?>"
						},
						dataType: "json",
						success: function(response) {
							$("#notifikasi").html("");
							console.log(response.length);
							if (response.length > 0) {
								$("#lonceng").addClass("beep");
							} else {
								$("#lonceng").removeClass("beep");
							};
							response.forEach(function(row, index) {
								$("#notifikasi").append(
									'<a href="<?php echo base_url("user-notifikasi/view_spv") ?>?id=' + row["id"] + '" class="dropdown-item dropdown-item-unread">' +
									'<div class="dropdown-item-desc">' +
									' ' + row["pesan"] + ' ' +
									'</div>' +
									'</a>'
								);
							});
						},
						beforeSend: function() {},
					});
				}, 3000);
			<?php endif; ?>


		});
	</script>
</body>

</html>
