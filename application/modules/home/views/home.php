
	<!-- Slide1 -->
	<section>
		<div class="wrap-slick1">
			<div class="slickCust" id="mainbanners">
			</div>
		</div>
	</section>

	<section class="promo-products">
		<h2>OUR PROMO</h2>
		<div class="wrap-promo">
			<div class="slick-promo">
				<?= $promo; ?>
			</div>
		</div>
	</section>

	<section class="page">
		<div class="container">
			<h3 class="title-page text-center">Cari Media Promosi <span class="text-primary font-weight-bold">Kota Besar</span> di Indonesia</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
					<?php foreach ($read_city as $key => $value) {?>
						<div class="col-md-4">
							<a href="<?php echo base_url()?>product/read?search=&category=&size=&city=<?php echo $value['CITY_ID'] ?>&page=1&limit=12&sort=">
								<div class="box-img">
									<img src="<?php echo base_url()?>assets/frontend/images/city/<?php echo $value['IMAGE'] ?>" alt="" class="img-cover">
									<div class="title-card"><?php echo $value['NAME']; ?></div>
								</div>
							</a>
						</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>