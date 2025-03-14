<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container style-two">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<div class="course-detail">
						<div class="course-detail_inner">
							<div class="course-detail_image">
								<img src="<?= base_url(''); ?>assets/backend/images/services/<?= $service['service_image']; ?>" alt="image layanan" />
							</div>
							<div class="course-detail_content">
								<h3 class="course-detail_heading"><?= $service['service_name']; ?></h3>
								
								<!-- <h4 class="course-detail_subtitle">Overview</h4> -->
								<p><?= $service['service_desc']; ?></p>

								<!-- Product Info Tabs -->
								<div class="course-detail-info-tabs">
									<!-- Product Tabs -->
									<div class="course-detail-tabs tabs-box">
									
										<!-- Tab Btns -->
										<ul class="tab-btns tab-buttons clearfix">
											<li data-tab="#prod-curriculum" class="tab-btn active-btn">Layanan</li>
											<!-- <li data-tab="#prod-instructor" class="tab-btn">Pelaksana</li> -->
											<!-- <li data-tab="#prod-review" class="tab-btn">Review</li> -->
											<li data-tab="#prod-faq" class="tab-btn">Faq</li>
										</ul>
										
										<!-- Tabs Container -->
										<div class="tabs-content">
											
											<!-- Tab -->
											<div class="tab active-tab" id="prod-curriculum">
												<div class="content">
													<h4 class="course-detail_subtitle">Deskripsi</h4>
													<p><?= $service['service_desc2']; ?></p>
													
												</div>
											</div>

											<!-- Tab -->
											<div class="tab" id="prod-faq">
												<div class="content">
													
													<!-- Accordion Box -->
													<ul class="accordion-box_two style-two">
														
														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn active"><div class="icon-outer"><span class="icon"><img src="<?= base_url(''); ?>assets/quran/images/icons/faq-arrow.png" alt="" /></span></div>Apa keunggulan layanan?</div>
															<div class="acc-content current">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>
																	
														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn"><div class="icon-outer"><span class="icon"><img src="<?= base_url(''); ?>assets/quran/images/icons/faq-arrow.png" alt="" /></span></div>Apa saja manfaatnya?</div>
															<div class="acc-content">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>

														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn"><div class="icon-outer"><span class="icon"><img src="<?= base_url(''); ?>assets/quran/images/icons/faq-arrow.png" alt="" /></span></div>Siapa saja yang bisa dihubungi?</div>
															<div class="acc-content">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>

														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn"><div class="icon-outer"><span class="icon"><img src="<?= base_url(''); ?>assets/quran/images/icons/faq-arrow.png" alt="" /></span></div>Apakah ada informasi tambahan?</div>
															<div class="acc-content">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>

													</ul>

												</div>
											</div>
											
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">

						<!-- Course Widget -->
						<div class="sidebar-widget course-widget">
							<div class="widget-content">
								
								<div class="sidebar-title">
									<h4>Pilihan Program</h4>
								</div>
								<ul class="course-list">
									<li><a href="<?= base_url(''); ?>program/program-z-chicken">Z Chicken</a></li>
									<li><a href="<?= base_url(''); ?>program/program-z-auto">Z Auto</a></li>
									<li><a href="<?= base_url(''); ?>program/program-santripreneur">Santripreneur</a></li>
									<li><a href="<?= base_url(''); ?>program/program-edukasi-zakat">Edukasi Zakat</a></li>
                                    <li><a href="<?= base_url(''); ?>program/program-capacity-building-amil">Capacity Building Amil</a></li>
									<li><a href="<?= base_url(''); ?>program/program-literasi-keuangan-syariah">Literasi Keuangan Syariah</a></li>
									<li><a href="<?= base_url(''); ?>program/program-poroz-taawun">POROZ Ta'awun</a></li>
									<li><a href="<?= base_url(''); ?>program/program-pelatihan-umkm">Pelatihan UMKM</a></li>
                                    <li><a href="<?= base_url(''); ?>program/join-action-for-palestine">Join Action for Palestine</a></li>
								</ul>
					
							</div>
						</div>

						<!-- Helpline Widget -->
						<!-- <div class="sidebar-widget helpline-widget">
							<div class="widget-content">
								<div class="image">
									<img src="<?= base_url(''); ?>assets/quran/images/icons/moon.png" alt="" />
								</div>
								<h4 class="helpline-title">Jika Anda tertarik Berdonasi atau Menjalin Kerjasama</h4>
								<div class="helpline-widget_phone flaticon-whatsapp"></div>
								<div class="helpline-widget_number">WA Me: <span><a href="https://wa.me/<?= $site['site_wa']; ?>"><?= $site['site_wa']; ?></a></span></div>
							</div>
						</div> -->

					</aside>
				</div>

			</div>
		</div>
	</div>
<?= $this->endSection(); ?>