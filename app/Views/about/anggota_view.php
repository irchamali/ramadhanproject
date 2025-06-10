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
							if ($row['member_id'] < 1 || $row['member_id'] > 7) continue; // Filter
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
		
			<div class="gallery-twoz_carousel swiper-container">
				<div class="swiper-wrapper">
					<!-- Slide -->
                    <?php
						$no = 0;
						foreach ($members as $row) :
							if ($row['member_id'] < 8 || $row['member_id'] > 11) continue; // Filter
					?>
					<div class="swiper-slide">
						<!-- Gallery Block Twoz -->
						<div class="gallery-block_twoz">
							<div class="gallery-block_twoz-inner">
								<div class="gallery-block_twoz-image">
									<img src="<?= base_url(''); ?>assets/backend/images/member/<?= $row['member_image']; ?>" alt="" />
									<a class="gallery-block_twoz-arrow theme-btn flaticon-up-right-arrow" href="<?= $row['member_link']; ?>"></a>
								</div>
							</div>
						</div>
					</div>
                    <?php endforeach; ?>
				</div>
			</div>

		</div>
		
	</section>

<?= $this->endSection(); ?>