<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
<!-- Scholar One -->
<section class="scholar-one" style="background-image:url(assets/images/background/scholar-bg.png)">
		<div class="auto-container">
			
			<div class="row clearfix">

				<!-- Scholar Block One -->
                <?php foreach ($teams as $row) : ?>
				<div class="scholar-block_one col-lg-4 col-md-6 col-sm-12">
					<div class="scholar-block_one-inner wow fadeInLeft"  data-wow-delay="0ms" data-wow-duration="1000ms">
						<div class="scholar-block_one-image">
							<a href="#"><img src="/assets/backend/images/team/<?= $row['team_image']; ?>" alt="Pengelola Yayasan" /></a>
						</div>
						<div class="scholar-block_one-content">
							<h4 class="scholar-block_one-heading"><a href="#"><?= $row['team_name']; ?></a></h4>
							<div class="scholar-block_one-designation"><?= $row['team_jabatan']; ?></div>
							<!-- Social Box -->
							<div class="scholar-block_one-socials">
								<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
								<a href="#"><i class="fa-brands fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
                <?php endforeach; ?>
	
			</div>

		</div>
	</section>
	<!-- End Scholar One -->
<?= $this->endSection(); ?>