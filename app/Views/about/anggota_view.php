<?= $this->extend('layouts/template-page'); ?>
<?= $this->section('content'); ?>
	<!-- Gallery Two / Style Two -->
	<section class="gallery-two style-two">
        <br><h1 class="text-center">Anggota Poroz</h1><br>
		<div class="outer-container">
			<div class="gallery-two_carousel swiper-container">
				<div class="swiper-wrapper">
					<!-- Slide -->
                    <?php
                        $no = 0;
                        foreach ($members as $row) :
                        $no++;
                    ?>
					<div class="swiper-slide">
						<!-- Gallery Block Two -->
						<div class="gallery-block_two">
							<div class="gallery-block_two-inner">
								<div class="gallery-block_two-image">
									<img src="<?= base_url(''); ?>assets/backend/images/member/<?= $row['member_image']; ?>" alt="" />
									<a class="gallery-block_two-arrow theme-btn flaticon-up-right-arrow" href="<?= $row['member_link']; ?>"></a>
								</div>
							</div>
						</div>
					</div>
                    <?php endforeach; ?>

				</div>
			</div>

		</div>
	</section>
	<!-- End Gallery Two -->
<?= $this->endSection(); ?>