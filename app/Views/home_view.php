<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

	<!-- Slider One -->
	<section class="slider-one">
		<div class="main-slider swiper-container">
			<div class="swiper-wrapper">

				<!-- Slide -->
				<?php foreach ($sliders as $sld) : ?>
				<div class="swiper-slide">
					<div class="slider-one_image-layer" style="background-image:url(<?= base_url(''); ?>assets/backend/images/slider/<?= $sld['slider_image']; ?>)"></div>
					<div class="auto-container">
						
						<!-- Content Column -->
						<div class="slider-one_content">
							<div class="slider-one_content-inner">
								<div class="slider-one_title"><?= $site['site_title']; ?></div>
								<h1 class="slider-one_heading"><?= $sld['slider_title']; ?></h1>
								<div class="slider-one_text"><?= $sld['slider_subtitle']; ?></div>
								<div class="slider-one_button">
									<a href="<?= $sld['slider_link']; ?>" class="theme-btn btn-style-two">
										<span class="btn-wrap">
											<span class="text-one">Read More</span>
											<span class="text-two">Read More</span>
										</span>
									</a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="slider-one-arrow">
				<!-- If we need navigation buttons -->
				<div class="main-slider-prev fas fa-arrow-left fa-fw"></div>
				<div class="main-slider-next fas fa-arrow-right fa-fw"></div>
			</div>
		</div>
	</section>
	<!-- End Main Slider Section -->

	<!-- Featured One -->
	<section class="featured-one">
		<div class="auto-container">
			<div class="inner-container" style="background-image:url(<?= base_url(''); ?>assets/quran/images/icons/featured.png)">
				<div class="row clearfix">

					<!-- Feature Block One -->
					<div class="feature-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="feature-block_one-inner">
							<div class="feature-block_one-icon flaticon-quran"></div>
							POROZ <br> CONSULTING
						</div>
					</div>

					<!-- Feature Block One -->
					<div class="feature-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="feature-block_one-inner">
							<div class="feature-block_one-icon flaticon-education"></div>
							POROZ <br> INSTITUTE
						</div>
					</div>

					<!-- Feature Block One -->
					<div class="feature-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="feature-block_one-inner">
							<div class="feature-block_one-icon flaticon-islamic"></div>
							POROZ <br> REGIONAL
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Featured One -->

	<!-- Welcome One -->
	<section class="welcome-one">
		<div class="welcome-one_pattern" style="background-image:url(<?= base_url(''); ?>assets/quran/images/background/pattern-1.png)"></div>
		<div class="welcome-one_pattern-two" style="background-image:url(<?= base_url(''); ?>assets/quran/images/background/pattern-2.png)"></div>
		
	</section>
	<!-- End Welcome One -->

	<!-- News One -->
	<section class="students-one">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="sec-title_title"><?= $site['site_title']; ?> Updates</div>
				<h2 class="sec-title_heading">Latest Posts</h2>
			</div>
			<div class="row clearfix">

				<!-- News Block One -->
                <?php foreach ($latest_posts as $post) : ?>
				<div class="news-block_one col-lg-3 col-md-3 col-sm-12">
					<div class="news-block_one-inner wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
						<div class="news-block_one-image">
							<a href="/post/<?= $post['post_slug']; ?>"><img src="/assets/backend/images/post/<?= $post['post_image']; ?>" alt="" /></a>
						</div>
						<div class="news-block_one-content">
							<ul class="news-block_one-meta">
								<li><span class="icon fa-solid fa-user fa-fw"></span><?= $post['user_name']; ?></li>
								<li><span class="icon fa-solid fa-clock fa-fw"></span><time datetime="2022-01-01"><?= date('d M Y', strtotime($post['post_date'])); ?></time></li>
							</ul>
							<h5 class="news-block_one-heading"><a href="/post/<?= $post['post_slug']; ?>"><?= substr($post['post_title'], 0, 65) . '...'; ?></a></h5>
							<!-- <div class="news-block"><?= substr($post['post_description'], 0, 70) . '...'; ?></div> -->
						</div>
					</div>
				</div>
                <?php endforeach; ?>
			</div>
			<div class="cta-two_button text-center">
				<a href="/posts" class="theme-btn btn-style-one">
					<span class="btn-wrap">
						<span class="text-one">Berita Selengkapnya</span>
						<span class="text-two">Berita Selengkapnya</span>
					</span>
				</a>
			</div>
			
		</div>
	</section>
	<!-- End News One -->

	<!-- Students One -->
	<section class="students-one">
		<div class="auto-container">
			<div class="inner-container">
				<div class="students-one_pattern" style="background-image:url(<?= base_url(''); ?>assets/quran/images/background/student-bg.png)"></div>
				<div class="row clearfix">

					<!-- Content Column -->
					<div class="students-one_title-column col-lg-5 col-md-12 col-sm-12">
						<div class="students-one_title-outer">
							<!-- Title Box -->
							<div class="students-one_title-box">
								<h3 class="students-one_title">Alhamdulillah.. Selamat Datang</h3>
								<div class="students-one_text"><?= $home['home_caption_1']; ?></div>
							</div>
							<!-- Counter Two -->
							<!-- <div class="students-one_counter">
								<div class="students-one_counter-inner">
									<div class="students-one_counter-icon">
										<i class="flaticon-give"></i>
									</div>
									<div class="students-one_counter-count"><span class="odometer" data-count="11"></span></div>
									<div class="students-one_counter-text">Anggota/Lembaga</div>
								</div>
							</div> -->
						</div>
					</div>

					<!-- Image Column -->
					<div class="students-one_content-column col-lg-7 col-md-12 col-sm-12">
						<div class="students-one_content-outer">

							<!-- Top Rated -->
							<!-- <div class="top-rated">
								<div class="top-rated_inner">
									<div class="top-rated-icon">
										<div class="top-rated_stars">
											<span class="fa-regular fa-star fa-fw"></span>
											<span class="fa-regular fa-star fa-fw"></span>
											<span class="fa-regular fa-star fa-fw"></span>
										</div>
										<div class="top-rated_stars">
											<span class="fa-regular fa-star fa-fw"></span>
											<span class="fa-regular fa-star fa-fw"></span>
										</div>
									</div>
									<h4 class="top-rated_heading">Profil</h4>
									<div class="top-rated_text"></div>
								</div>
							</div> -->

							<!-- Pass Out -->
							<div class="passout">
								<div class="passout_inner">
									<div class="passout-number">
									<span class="fa-regular fa-moon fa-fw"></span>
									<!-- <span class="fa-regular fa-star fa-fw"></span> -->
									</div>
									<h4 class="passout_heading">Anggota</h4>
									<div class="passout_text"><?= $home['home_caption_2']; ?></div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Students One -->

	<!-- CTA One -->
	<!-- permintaan client dihapus -->
	<!-- End CTA One -->


	<!-- Testimonial One -->
	<section class="testimonial-one" style="background-image:url(<?= base_url(''); ?>assets/quran/images/background/testimonial-one_bg.png)">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Image Column -->
				<div class="testimonial-one_image-column col-lg-4 col-md-12 col-sm-12">
					<div class="testimonial-one_image">
						<img src="<?= base_url(''); ?>assets/backend/images/home/<?= $home['home_bg_testimonial']; ?>" alt="" />
					</div>
				</div>

				<!-- Carousel Column -->
				<div class="testimonial-one_carousel-column col-lg-8 col-md-12 col-sm-12">
					<div class="testimonial-one_carousel-outer">

						<!-- Ameen -->
						<div class="testimonial-one_ameen">
							<img src="<?= base_url(''); ?>assets/quran/images/icons/ameen-2.png" alt="" />
						</div>

						<!-- Carousel -->
						<div class="testimonial-one_carousel swiper-container">
							<div class="swiper-wrapper">
				
								<!-- Slide -->
								<?php foreach ($testimonials as $testi) : ?>
								<div class="swiper-slide">
									<!-- Testimonial Block One -->
									<div class="testimonial-block_one">
										<div class="testimonial-block_one-inner">
											<div class="testimonial-block_one-rating">
												<span class="fa-regular fa-star fa-fw"></span>
												<span class="fa-regular fa-star fa-fw"></span>
												<span class="fa-regular fa-star fa-fw"></span>
												<span class="fa-regular fa-star fa-fw"></span>
												<span class="fa-regular fa-star fa-fw"></span>
											</div>
											<h4 class="testimonial-block_one-heading"><?= $site['site_title']; ?> Quotes</h4>
											<div class="testimonial-block_one-text"><?= $testi['testimonial_content']; ?></div>
											<div class="testimonial-block_one-author">
												<div class="author-image">
													<img src="<?= base_url(''); ?>assets/backend/images/testi/<?= $testi['testimonial_image']; ?>" alt="" />
												</div>
												<?= $testi['testimonial_name']; ?>
												<span><?= $testi['testimonial_angkatan']; ?></span>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>

							<!-- If we need pagination -->
							<div class="testimonial-one_pagination"></div>

						</div>
						<!-- End Carousel -->

					</div>
				</div>

			</div>
		</div>
	</section><br><br><br>
	<!-- End Testimonial One -->


<?= $this->endSection(); ?>