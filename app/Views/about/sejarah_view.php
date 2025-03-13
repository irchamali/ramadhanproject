<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
	<!-- Service Detail -->
	<section class="service-detail">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Content Column -->
				<div class="service-detail_content-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_content-outer">
						<h4 class="service-detail_lower-title"><?= $title; ?></h4>
						<p><?= $about['about_description']; ?></p>
					</div>
				</div>

				<!-- Content Column -->
				<div class="service-detail_image-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_image-outer">
						<div class="service-detail_image">
							<img src="<?= base_url(''); ?>assets/backend/images/home/<?= $about['about_image']; ?>" alt="" />
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Service Detail -->
<?= $this->endSection(); ?>