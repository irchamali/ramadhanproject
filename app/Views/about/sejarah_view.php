<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
	<!-- Service Detail -->
	<section class="service-detail">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Content Column -->
				<div class="service-detail_content-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_content-outer">
						<h4 class="service-detail_lower-title">Sejarah<br> <?= $about['about_name']; ?></h4>
						<p><?= $about['about_description']; ?></p>
						<!-- <p>Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> -->
						<!-- <ul class="service-detail_list">
							<li>1. This class focuses mainly on Qur’an memorisation and revision of surahs that have already been memorised.</li>
							<li>2. Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
							<li>3. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis qui dolorem eum.</li>
							<li>4. In-class activities will also incorporate some lessons on Hadith and Quranic Arabic alongside surah understanding.</li>
						</ul> -->
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