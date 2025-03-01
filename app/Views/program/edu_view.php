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
							
							<div class="course-detail_content">
								<h3 class="course-detail_heading"><?= $title; ?></h3>
								
								<h4 class="course-detail_subtitle">Overview</h4>
								<p>This class is for students who can fluently read Qur’an. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae</p>

								<!-- Product Info Tabs -->
								<div class="course-detail-info-tabs">
									<!-- Product Tabs -->
									<div class="course-detail-tabs tabs-box">
									
										<!-- Tab Btns -->
										<ul class="tab-btns tab-buttons clearfix">
											<li data-tab="#prod-curriculum" class="tab-btn active-btn">Curriculum</li>
											<li data-tab="#prod-instructor" class="tab-btn">Instructor</li>
											<!-- <li data-tab="#prod-review" class="tab-btn">Review</li> -->
											<li data-tab="#prod-faq" class="tab-btn">Faq</li>
										</ul>
										
										<!-- Tabs Container -->
										<div class="tabs-content">
											
											<!-- Tab -->
											<div class="tab active-tab" id="prod-curriculum">
												<div class="content">
													<h4 class="course-detail_subtitle">Sekolah sambil Mondok</h4>
													<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae</p>
													
												</div>
											</div>

											<!-- Tab -->
											<div class="tab" id="prod-instructor">
												<div class="content">
													
													<!-- Course Author Box -->
													<div class="course-author_box">
														<div class="course-author_box-inner">
															<div class="course-author_box-image">
																<img src="<?= base_url(''); ?>assets/quran/images/resource/author-14.png" alt="" />
															</div>
															<h5 class="course-author_box-heading">Muhammad Fulan <span>Kepala Sekolah</span></h5>
															<div class="course-author_box-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam</div>
														</div>
													</div>

												</div>
											</div>

											<!-- Tab -->

											<!-- Tab -->
											<div class="tab" id="prod-faq">
												<div class="content">
													
													<!-- Accordion Box -->
													<ul class="accordion-box_two style-two">
														
														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn active"><div class="icon-outer"><span class="icon"><img src="assets/images/icons/faq-arrow.png" alt="" /></span></div>Apa kelebihan sekolah ini dibanding yang lain?</div>
															<div class="acc-content current">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>
																	
														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn"><div class="icon-outer"><span class="icon"><img src="assets/images/icons/faq-arrow.png" alt="" /></span></div>Berapa biaya pendaftaran?</div>
															<div class="acc-content">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>

														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn"><div class="icon-outer"><span class="icon"><img src="assets/images/icons/faq-arrow.png" alt="" /></span></div>Lokasi Sekolah ada dimana?</div>
															<div class="acc-content">
																<div class="content">
																	<div class="text">Yes, you can. Once you are enrolled in the course, the Support team will email you to arrange the timing of the sessions with you. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Unde omnis iste natus error sit voluptatem  </div>
																</div>
															</div>
														</li>

														<!-- Block -->
														<li class="accordion block">
															<div class="acc-btn"><div class="icon-outer"><span class="icon"><img src="assets/images/icons/faq-arrow.png" alt="" /></span></div>Apakah ada keterampilan tambahan?</div>
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
						<!-- <div class="sidebar-widget course-widget">
							<div class="widget-content">
								
								<div class="sidebar-title">
									<h4>Course Features</h4>
								</div>
								<ul class="course-list">
									<li>Course Fee <span>$92.00</span></li>

								</ul>
								<a class="theme-btn course-appy_btn" href="#">Apply Now</a>
							</div>
						</div> -->

						<!-- Helpline Widget -->
						<div class="sidebar-widget helpline-widget">
							<div class="widget-content">
								<div class="image">
									<img src="assets/images/icons/helpline-widget.png" alt="" />
								</div>
								<h4 class="helpline-title">Jika Anda tertarik Berdonasi untuk Yayasan Sunan Gunung Jati</h4>
								<div class="helpline-widget_phone flaticon-whatsapp"></div>
								<div class="helpline-widget_number">WA Me: <span><a href="https://wa.me/<?= $site['site_wa']; ?>"><?= $site['site_wa']; ?></a></span></div>
							</div>
						</div>

					</aside>
				</div>

			</div>
		</div>
	</div>
<?= $this->endSection(); ?>