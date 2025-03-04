<?= $this->extend('layouts/template-post'); ?>
<?= $this->section('content'); ?>
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<div class="blog-detail">
						<div class="blog-detail_outer">
							<div class="blog-detail_image">
								<img src="/assets/backend/images/post/<?= $post['post_image']; ?>" alt="" />
							</div>
							<div class="blog-detail_content">
								<div class="d-flex align-items-center flex-wrap">
									<!-- Author -->
									<!-- <div class="blog-detail_author d-flex align-items-center">
										<div class="image">
                                            <i class="fa-solid fa-user fa-fw"></i>
                                            
										</div>
									</div> -->
									<!-- Post Meta -->
									<ul class="blog-detail_meta">
										<li><span class="icon fa-solid fa-user fa-fw"></span><?= $post['user_name']; ?></li>
										<li><span class="icon fa-solid fa-pen-to-square fa-fw"></span><?= $post['category_slug']; ?></li>
										<li><span class="icon fa-solid fa-clock fa-fw"></span><time datetime="2020-01-01"><?= date('d M Y', strtotime($post['post_date'])); ?></time></li>
									</ul>
								</div>
								<h3 class="blog-detail_heading"><?= $post['post_title']; ?></h3>
								<p><?= $post['post_contents']; ?></p>

								<!-- Post Share Options-->
								<div class="post-share-options">
									<div class="post-share-inner d-flex justify-content-between align-items-center flex-wrap">
										<div class="tags"><span>Tags:</span>
                                            <?php foreach ($post_tags as $tag) : ?>
                                                <a href="/tag/<?= $tag; ?>"><?= $tag; ?></a>
                                            <?php endforeach; ?>
                                        </div>
										<!-- <div class="social-box">
											<span>Share post :</span>
											<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="#"><i class="fa-brands fa-instagram"></i></a>
											<a href="#"><i class="fa-brands fa-twitter"></i></a>
										</div> -->
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">

						<!-- Sidebar Widget -->
						<div class="sidebar-widget search-box">
							<form method="GET" action="/search">
								<div class="form-group">
									<input type="search" name="search_query" value="" placeholder="Search using keyword" required>
									<button type="submit"><span class="icon fa fa-search"></span></button>
								</div>
							</form>
						</div>

						<!-- Post Widget -->
						<div class="sidebar-widget style-two post-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h4>Related Posts</h4>
								</div>
								<div class="content">
									<!-- Post -->
                                    <?php foreach ($related_post as $row) : ?>
									<div class="post">
										<div class="thumb"><a href="/post/<?= $row['post_slug']; ?>"><img src="/assets/backend/images/post/<?= $row['post_image']; ?>" alt=""></a></div>
										<div class="post-date"><time datetime="2020-01-01"><?= date('d M Y', strtotime($row['post_date'])); ?></time></div>
										<h6><a href="/post/<?= $row['post_slug']; ?>"><?= $row['post_title']; ?></a></h6>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>

                        <!-- Categ Widget -->
						<div class="sidebar-widget style-two popular-tags">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h4>Post Categories</h4>
								</div>
								<div class="content">
                                    <?php foreach ($categories as $categ) : ?>
                                        <a href="/category/<?= $categ['category_name']; ?>" rel="tag"><?= $categ['category_name']; ?></a>
                                    <?php endforeach; ?>
								</div>
							</div>
						</div>

					</aside>
				</div>

			</div>
		</div>
	</div>
<?= $this->endSection(); ?>