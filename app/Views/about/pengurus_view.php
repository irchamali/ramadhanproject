<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>

	<section class="event-detail">
		<div class="auto-container">
			
			<div class="row clearfix">
				<div class="column col-lg-12 col-md-12 col-sm-12">
					<!-- Speakers -->
					<div class="event-detail_speakers">
						<!-- <h4 class="event-detail_subtitle text-center">Pengurus</h4> -->
						<div class="row clearfix">

							<!-- Speaker Block One -->
							<?php foreach ($teams as $row) : ?>
							<div class="speaker-block_one col-lg-3 col-md-3 col-sm-6">
								<div class="speaker-block_one-inner">
									<div class="speaker-block_one-image">
										<img src="/assets/backend/images/team/<?= $row['team_image']; ?>" alt="Pengurus" />
									</div>
									<div class="speaker-block_one-content">
										<!-- Social Box -->
										<div class="speaker-block_one-socials">
											<a href="<?= $row['team_facebook']; ?>"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="<?= $row['team_instagram']; ?>"><i class="fa-brands fa-instagram"></i></a>
										</div>
										<h6 class="speaker-block_one-heading"><a href="scholar-detail.html"><?= $row['team_name']; ?></a></h6>
										<div class="speaker-block_one-title"><?= $row['team_org']; ?></div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?= $this->endSection(); ?>