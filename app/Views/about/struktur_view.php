<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>

	<!-- Testimonial Two -->
	<section class="testimonial-two" style="background-image:url(assets/quran/images/background/testimonial-two_bg.png)">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="sec-title_title">POROZ</div>
				<h2 class="sec-title_heading">Struktur Organisasi</h2>
			</div>
			<!-- Carousel -->
			<div class="testimonial-two_carousel swiper-container">
				<div class="swiper-wrapper">
	
					<!-- Slide 1-->
					<div class="swiper-slide">
						<!-- Testimonial Block Two -->
						<div class="testimonial-block_two text-center">
							<div class="testimonial-block_two-inner">
								<div class="testimonial-block_two-author">
									<div class="author-image">
										<img src="<?= base_url(''); ?>assets/backend/images/home/<?= $home['home_bg_testimonial2']; ?>" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Slide 2-->
					<div class="swiper-slide">
						<!-- Testimonial Block Two -->
						<div class="testimonial-block_two text-center">
							<div class="testimonial-block_two-inner">
								<div class="testimonial-block_two-author">
									<div class="author-image">
										<img src="<?= base_url(''); ?>assets/backend/images/home/<?= $home['home_bg_testimonial3']; ?>" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- If we need pagination -->
				<div class="testimonial-two_pagination"></div>

			</div>

		</div>
	</section>
	<!-- End Testimonial Two -->
    
<?= $this->endSection(); ?>