<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
	<!-- Service Detail -->
	<section class="service-detail">
		<div class="auto-container">
			<div class="content" style="background-image:url(<?= base_url(''); ?>assets/quran/images/background/service-detail.png)">
				<div class="service-detail_icon flaticon-quran-5"></div>
				<h3 class="service-detail_heading">VISI</h3>
				<div class="service-detail_text"><?= $about['about_visi']; ?></div>
				<h4 class="service-detail_subtitle">MISI</h4>
				<div class="service-detail_text"><?= $about['about_misi']; ?></div>
			</div>
			<div class="row clearfix">

				<!-- Content Column -->
				<!-- <div class="service-detail_content-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_content-outer">
						<h4 class="service-detail_lower-title">Surah Al-Takwir recitation</h4>
						<p>This class is for students who can fluently read Qur’an. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
						<p>Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						<ul class="service-detail_list">
							<li>This class focuses mainly on Qur’an memorisation and revision of surahs that have already been memorised.</li>
							<li>Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
							<li>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis qui dolorem eum.</li>
							<li>In-class activities will also incorporate some lessons on Hadith and Quranic Arabic alongside surah understanding.</li>
						</ul>
					</div>
				</div> -->

				<!-- Content Column -->
				<!-- <div class="service-detail_image-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_image-outer">
						<div class="service-detail_image">
							
						</div>
					</div>
				</div> -->

			</div>
		</div>
	</section>
	<!-- End Service Detail -->
<?= $this->endSection(); ?>