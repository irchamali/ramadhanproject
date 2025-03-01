<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs img1">
			    <div class="container">
			        <div class="breadcrumbs-inner">
			            <h1 class="page-title">
			                <?= $title; ?>
			                <span class="watermark">FH UNUSIA</span>
			            </h1>
			        </div>
			    </div>
			</div>
			<!-- Breadcrumbs End -->
		
			<!-- Services Single Start -->
			<div class="rs-services-single pt-120 pb-120 md-pt-80 md-pb-80">
			   <div class="container">
			        <div class="row">
			            <div class="col-lg-9 md-mb-30">
			               
                            <!-- <div class="row mt-4"> -->
                    
                                <div class="bg-white px-3 mt-0 px-0 py-5 px-lg-5 rounded-3">
                                    <div class="panel panel-white">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="mytable" class="display table table-striped table-hover" style="width: 100%; ">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tahun</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Pembuat</th>                    
                                                        <th>Kategori</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-table">
                                                    <?php
                                                    $no = 0;
                                                    foreach ($documents as $row) :
                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <td style="vertical-align: middle;"><?= $no; ?></td>
                                                            <td style="vertical-align: middle;"><?= $row['docs_year']; ?></td>
                                                            <td style="vertical-align: middle;"><a href="<?= $row['docs_link']; ?>"><?= $row['docs_name']; ?></a></td>
                                                            <td style="vertical-align: middle;"><?= $row['docs_unit']; ?></td>
                                                            <td style="vertical-align: middle;"><?= $row['docscategory_name']; ?></td>
                                                            <td style="vertical-align: middle;">
                                                                <div class="btn-group">
                                                                    <a class="btn-sm btn btn-outline-primary" href="<?= $row['docs_link']; ?>"><i class="fas fa-eye"></i></a>
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
                            <!-- </div> -->
			            </div>
			            <?= $this->include('layouts/sidebar2'); ?>
			        </div> 
			   </div> 
			</div>
			<!-- Services Single End -->
<?= $this->endSection(); ?>