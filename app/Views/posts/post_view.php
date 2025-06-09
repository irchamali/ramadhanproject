<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>     
<!-- Events One -->
    <section class="events-one">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Event Block One -->
                <?php foreach ($posts as $post) : ?>
				<div class="event-block_one col-lg-4 col-md-6 col-sm-12">
					<div class="event-block_one-inner">
						<div class="event-block_one-image">
							<a href="/post/<?= $post['post_slug']; ?>"><img src="<?= base_url(''); ?>/assets/backend/images/post/<?= $post['post_image']; ?>" alt="Image of post" /></a>
						</div>
						<div class="event-block_one-content">
							<div class="event-block_one-time"><?= $post['category_name']; ?></div>
							<div class="event-block_one-location"><i class="fa-solid fa-user fa-fw"></i> <?= $post['user_name']; ?> |  <time datetime="2022-01-01"><?= date('d M Y', strtotime($post['post_date'])); ?></time></div>
							<h6 class="event-block_one-heading"><a href="/post/<?= $post['post_slug']; ?>"><?= $post['post_title']; ?></a></h6>
							
						</div>
					</div>
				</div>
                <?php endforeach; ?>

			<!-- Styled Pagination -->
            <div class="col-lg-12 text-center pt-40">
			<ul class="styled-pagination text-center">
                <?= $pager->links('posts', 'post_pagination'); ?>
				<!-- <li><a href="#" class="active">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#">next</a></li> -->
			</ul>
            </div>
			<!-- End Styled Pagination -->

		</div>
	</section>
	<!-- End Events One -->

<?= $this->endSection(); ?>