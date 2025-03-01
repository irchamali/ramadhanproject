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
						        <div class="bg-white px-3 mt-0 px-0 py-5 px-lg-5 rounded-3">
                                    <div class="panel panel-white">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="mytable" class="display table table-striped table-hover" style="width: 100%; ">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama</th>
                                                            <th>Tahun</th>
                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body-table">
                                                        <?php
                                                        $no = 0;
                                                        foreach ($partners as $row) :
                                                            $no++;
                                                        ?>
                                                            <tr>
                                                                <td style="vertical-align: middle;"><?= $no; ?></td>
                                                                <td style="vertical-align: middle;"><?= $row['member_name']; ?></td>
                                                                <td style="vertical-align: middle;"><?= $row['member_desc']; ?></td>
                                                                <td style="vertical-align: middle;">
                                                                    <div class="btn-group">
                                                                        <a class="btn-sm btn btn-outline-primary" href="<?= $row['member_link']; ?>"><i class="fas fa-eye"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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