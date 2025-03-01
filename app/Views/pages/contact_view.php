<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
    <!-- Contact Info -->
	<section class="contact-info">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					<!-- Info Column -->
					<div class="contact-info_column col-lg-4 col-md-6 col-sm-12">
						<div class="contact-info_outer">
							<div class="contact-info_icon fa-solid fa-location-dot fa-fw"></div>
							<h4 class="contact-info_heading">Our Address</h4>
							<div class="contact-info_text"><?= $site['site_address']; ?></div>
						</div>
					</div>

					<!-- Info Column -->
					<div class="contact-info_column col-lg-4 col-md-6 col-sm-12">
						<div class="contact-info_outer">
							<div class="contact-info_icon fa-solid fa-phone fa-fw"></div>
							<h4 class="contact-info_heading">Our Phone</h4>
							<div class="contact-info_text"><?= $site['site_wa']; ?> <span>Let’s WA me!</span></div>
						</div>
					</div>

					<!-- Info Column -->
					<div class="contact-info_column col-lg-4 col-md-6 col-sm-12">
						<div class="contact-info_outer">
							<div class="contact-info_icon fa-solid fa-envelope fa-fw"></div>
							<h4 class="contact-info_heading">Email address</h4>
							<div class="contact-info_text"><?= $site['site_mail']; ?></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Info -->
<?= $this->endSection(); ?>