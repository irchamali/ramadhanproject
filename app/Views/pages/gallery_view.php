<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-6 col-md-12 col-sm-12">
					<div class="blog-list">

						<!-- News Block Three -->
                        <?php foreach ($posts as $post) : ?>
						<div class="news-block_three">
							<div class="news-block_three-inner">
								<div class="news-block_three-image">
									<a href="/post/<?= $post['post_slug']; ?>"><img src="/assets/backend/images/post/<?= $post['post_image']; ?>" alt="" /></a>
								</div>
								<div class="news-block_three-content">
									<ul class="news-block_three-meta">
										<!-- <li><span class="icon fa-brands fa-rocketchat fa-fw"></span>03 Comment</li> -->
										<li><span class="icon fa-solid fa-star fa-fw"></span><?= $post['post_title']; ?></li>
									</ul>
								</div>
							</div>
						</div>
                        <?php endforeach; ?>
						
					</div>
				</div>
                
			</div>
		</div>
	</div>
<?= $this->endSection(); ?>