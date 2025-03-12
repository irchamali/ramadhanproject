<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
	<!-- Service Detail -->
	<section class="service-detail">
		<div class="auto-container">
			<div class="content" style="background-image:url(<?= base_url(''); ?>assets/quran/images/background/service-detail.png)">
				<div class="service-detail_icon flaticon-quran-1"></div>
				<h3 class="service-detail_heading">VISI</h3>
				<div class="service-detail_text"><?= $about['about_visi']; ?></div>
				<h4 class="service-detail_subtitle">MISI</h4>
				<div class="service-detail_text"><?= $about['about_misi']; ?></div>
			</div>
			<div class="row clearfix">

				<!-- Content Column -->
				<div class="service-detail_content-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_content-outer">
						<h4 class="service-detail_lower-title">Tujuan</h4>
						<ul class="service-detail_list">
							<li>Terwujudnya jaringan antara pengelola zakat guna peningkatan pengelolaan zakat, penyatuan strategi pemberdayaan agar peran pengelola zakat berjalan optimal.</li>
							<li>Terwujudnya peningkatan kesadaran masyarakat dalam berzakat.</li>
							<li>Terwujudnya peningkatan kualitas SDM para pengelola zakat.</li>
							<li>Terwujudnya kerjasama yang baik dengan pengelola zakat nasional dan internasional.</li>
							<li>Terwujudnya jaringan dan kerjasama guna membangun hubungan aspiratif dengan pemerintah.</li>

						</ul>
					</div>
				</div>

				<!-- Content Column -->
				<div class="service-detail_image-column col-lg-6 col-md-12 col-sm-12">
					<div class="service-detail_image-outer">
					<h4 class="service-detail_lower-title">Strategi</h4>
						<ul class="service-detail_list">
							<li>Sinergi dan networking antara pengelola zakat dan stakeholders terkait.</li>
							<li>Kampanye guna membangkitkan kesadaran masyarakat khususnya untuk ber-ZIS.</li>
							<li>Persuasi, khususnya menyangkut kepentingan perzakatan yang akan diperjuangkan, kepada pemerintah dan masyarakat.</li>
						</ul>
					</div><br>
					<h4 class="service-detail_lower-title">Sasaran</h4>
						<ul class="service-detail_list">
							<li>Terealisasinya sinergi program pendayagunaan zakat secara nasional.</li>
							<li>Terealisasinya sistem administrasi perzakatan di Indonesia.</li>
							<li>Mendorong optimalisasi pemberlakuan Bukti Setor Zakat sebagai dokumen zakat untuk pengurang penghasilan kena pajak.</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Service Detail -->
<?= $this->endSection(); ?>