<?= $this->extend('layouts/template-page'); ?>

<?= $this->section('content'); ?>

    <section class="event-detail">
		<div class="auto-container">
			
			<div class="row clearfix">
				<div class="column col-lg-12 col-md-12 col-sm-12">
					<!-- Speakers -->
					<div class="event-detail_speakers">
						<h4 class="event-detail_subtitle text-center">MITRA-MITRA POROZ</h4><br>
						<div class="row clearfix">

							<!-- Speaker Block One -->
							<?php foreach ($partners as $row) : ?>
							<div class="speaker-block_one col-lg-2 col-md-3 col-sm-6">
								<div class="speaker-block_one-inner">
									<div class="speaker-block_one-image">
										<img src="/assets/backend/images/partners/<?= $row['partner_image']; ?>" alt="Pengurus" />
									</div>
									<div class="speaker-block_one-content">
										<!-- Social Box -->
										<div class="speaker-block_one-title"><?= $row['partner_name']; ?></div>
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
<!-- End Contact Info -->

<?= $this->endSection(); ?>
