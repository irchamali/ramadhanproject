<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LOGIN | YSGJ</title>
<!-- Stylesheets -->
<link href="<?= base_url(''); ?>assets/quran/css/bootstrap.css" rel="stylesheet">
<link href="<?= base_url(''); ?>assets/quran/css/style.css" rel="stylesheet">
<link href="<?= base_url(''); ?>assets/quran/css/responsive.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="shortcut icon" href="<?= base_url(''); ?>assets/quran/images/favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?= base_url(''); ?>assets/quran/images/favicon/favicon.ico" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>

<div class="page-wrapper">
	
	<!-- Cursor -->
	<div class="cursor"></div>
	<div class="cursor-follower"></div>
	<!-- Cursor End -->
 	
	<!-- Preloader -->
    <div class="preloader"></div>
	<!-- End Preloader -->

	<!-- Register One -->
	<section class="register-one" style="background-image:url(<?= base_url(''); ?>assets/quran/images/icons/stars.png)">
		<div class="auto-container">
			<h3>Welcome to YSGJ👋</h3>
			<div class="row clearfix text-center">

				<!-- Column -->
				<div class="auto-container register-one_column col-lg-6 col-md-12 col-sm-12">
					<h4><a href="/">Home</a> > Login</h4>
					<?php if (session()->getFlashData('pesan')) : ?>
                        <div class="alert alert-warning" role="alert">
                        <?= session()->getFlashData('pesan') ?>
                        </div>
                    <?php endif; ?>
					<div class="register-one_column-outer">
						<!-- Login Form -->
						<div class="styled-form">
							
							<form action="/login/validasi" method="post">
								<div class="form-group">
									<input type="email" name="email" value="" placeholder="Username or email*" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" value="" placeholder="Password*" required>
								</div>
								<div class="form-group">
									
								</div>
								<div class="form-group d-flex align-items-center flex-wrap">
									<button class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one" type="submit">Login</span>
											<span class="text-two" type="submit">Login</span>
										</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Register One -->
	
</div>
<!-- End PageWrapper -->

<div class="progress-wrap">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
	</svg>
</div>

<script src="<?= base_url(''); ?>assets/quran/js/jquery.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/popper.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/bootstrap.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/appear.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/parallax.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/tilt.jquery.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/jquery.paroller.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/wow.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/jarallax.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/swiper.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/backtotop.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/odometer.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/parallax-scroll.js"></script>

<script src="<?= base_url(''); ?>assets/quran/js/gsap.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/SplitText.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/ScrollTrigger.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/ScrollToPlugin.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/ScrollSmoother.min.js"></script>

<script src="<?= base_url(''); ?>assets/quran/js/magnific-popup.min.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/nav-tool.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/jquery-ui.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/element-in-view.js"></script>
<script src="<?= base_url(''); ?>assets/quran/js/script.js"></script>

</body>
</html>