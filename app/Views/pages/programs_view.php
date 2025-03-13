<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>     
<!-- Events One -->
    <section class="events-one">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Event Block One -->
                <?php foreach ($programs as $program) : ?>
				<div class="event-block_one col-lg-4 col-md-6 col-sm-12">
					<div class="event-block_one-inner">
						<div class="event-block_one-image">
							<a href="/program/<?= $program['program_slug']; ?>"><img src="<?= base_url(''); ?>/assets/backend/images/programs/<?= $program['program_image']; ?>" alt="Image of program" /></a>
						</div>
						<div class="event-block_one-content">
							<div class="event-block_one-time"><?= $program['category_name']; ?></div>
							<div class="event-block_one-location"><i class="fa-solid fa-clock fa-fw"></i> <time datetime="2022-01-01"><?= date('d M Y', strtotime($program['program_date'])); ?></time></div>
							<h5 class="event-block_one-heading"><a href="/program/<?= $program['program_slug']; ?>"><?= $program['program_title']; ?></a></h5>
							
						</div>
					</div>
				</div>
                <?php endforeach; ?>

			<!-- Styled Pagination -->
            
			<!-- End Styled Pagination -->

		</div>
	</section>
	<!-- End Events One -->

<?= $this->endSection(); ?>