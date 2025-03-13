<?= $this->extend('layouts/template-program'); ?>
<?= $this->section('content'); ?>
    <!-- Scholar Detail -->
    <section class="scholar-detail">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Scholar Detail Image -->
				<div class="scholar-detail_image-column col-lg-6 col-md-6 col-sm-12">
					<div class="scholar-detail_image-outer wow fadeInLeft"  data-wow-delay="0ms" data-wow-duration="1000ms">
						<div class="scholar-detail_image">
							<img src="<?= base_url(); ?>assets/backend/images/programs/<?= $program['program_image']; ?>" alt="" />
						</div>
					</div>
				</div>

				<!-- Content Column -->
				<div class="scholar-detail_content-column col-lg-6 col-md-6 col-sm-12">
					<div class="scholar-detail_content-outer wow fadeInRight"  data-wow-delay="0ms" data-wow-duration="1000ms">
						<h3 class="scholar-detail_title"><?= $program['program_title']; ?></span></h3>
						<!-- Skills -->
						<div class="skills">
							<!-- Skill Item -->
							<div class="skill-item">
								<div class="skill-bar">
									<div class="bar-inner">
										<div class="bar progress-line" data-width="70">
										</div>
									</div>
								</div>
							</div>
						</div>
                        <p><?= $program['program_description']; ?></p><hr>

						<div class="d-flex align-items-center flex-wrap">
							<a class="scholar-detail_play" href="#"><i class="fa-solid fa-clock fa-fw"></i><span><time datetime="2022-01-01"><?= date('d M Y', strtotime($program['program_date'])); ?></time></span></a>
							<!-- Social Box -->
							<div class="scholar-detail_socials">
								<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
								<a href="#"><i class="fa-brands fa-instagram"></i></a>
								<a href="#"><i class="fa-brands fa-tiktok"></i></a>
							</div>
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</section><br><br>
	<!-- End Scholar One -->

<?= $this->endSection(); ?>