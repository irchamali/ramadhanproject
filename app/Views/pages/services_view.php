<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>     

    <!-- Service Two -->
    <section class="service-two">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Service Block One -->
                <?php foreach ($services as $service) : ?>
				<div class="service-block_two col-lg-4 col-md-6 col-sm-12">
					<div class="service-block_two-inner wow fadeInLeft"  data-wow-delay="0ms" data-wow-duration="1000ms">
						<div class="service-block_two-upper">
							<div class="service-block_two-icon flaticon-user"></div>
							<div class="service-block_two-big_icon">
								<img src="<?= base_url(''); ?>assets/quran/images/icons/featured.png" alt="" />
							</div>
							<h4 class="service-block_two-heading"><a href="/service/<?= $service['service_slug']; ?>"><?= $service['service_name']; ?></a></h4>
							<div class="service-block_two-text"><?= $service['service_desc']; ?></div>
						</div>
						<div class="service-block_two-lower">
							<a class="service-block_two-more" href="/service/<?= $service['service_slug']; ?>">Read More<i class="fa-solid fa-arrow-right fa-fw"></i></a>
						</div>
					</div>
				</div>
                <?php endforeach; ?>

			</div>

		</div>
	</section>
	<!-- End Service Two -->

<?= $this->endSection(); ?>