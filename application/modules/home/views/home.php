
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
						<div class="col-md-3">
							<a href="<?php echo base_url()?>promotions/read?city=&page=1&limit=12&sortName=">
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


	<!-- Banner -->
	<!-- <section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x932_1.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Billboard(FL)
							</a>
						</div>
					</div>

					
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x660_2.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								JPO
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x660_1.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Billboard(BL)
							</a>
						</div>
					</div>

					
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x932_3.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Videotron
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x932_2.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Neonbox
							</a>
						</div>
					</div>

					
					<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="<?php echo base_url()?>assets/frontend/images/icons/bg-01.jpg" alt="IMG">

						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
								Sign up & get 20% off
							</h4>

							<p class="t-center w-size4">
								Be the frist to know about the latest fashion news and get exclu-sive offers
							</p>

							<div class="w-size2 p-t-25">
								
								<a href="#" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Sign Up
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<!-- New Product -->
	<!-- <section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			
			<div class="wrap-slick2">
				<div class="slick2">

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url()?>assets/frontend/images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Adityawarman 46
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp250.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url()?>assets/frontend/images/item-03.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									HR Muhammad 21
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp350.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url()?>assets/frontend/images/item-05.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Raya Taman No.15
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp125.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="<?php echo base_url()?>assets/frontend/images/item-07.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Gubeng Pojok No.61A
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									Rp500.000.000
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									Rp375.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url()?>assets/frontend/images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Bagong Tambangan
								</a>

								<span class="block2-price m-text6 p-r-5">
									RP100.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url()?>assets/frontend/images/item-03.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Bratang Gede
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp275.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url()?>assets/frontend/images/item-05.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Pandaan Asri
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp230.000.000
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="<?php echo base_url()?>assets/frontend/images/item-07.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Lawang Malang
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									Rp350.000.000
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									Rp250.000.000
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section> -->

	<!-- Banner2 -->
	<!-- <section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x539_1.jpg" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								The Beauty
							</span>

							<h3 class="l-text1 fs-35-sm">
								Lookbook
							</h3>

							<a href="#" class="s-text4 hov2 p-t-20 ">
								View Collection
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
						<img src="<?php echo base_url()?>assets/frontend/images/banners/720x539_2.jpg" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
							<div class="t-center">
								<a href="product-detail.html" class="dis-block s-text3 p-b-5">
									Gafas sol Hawkers one
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8">
									$15.90
								</span>
							</div>

							<div class="flex-c-m p-t-44 p-t-30-xl">
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 days">
										29
									</span>

									<span class="s-text5">
										days
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 hours">
										00
									</span>

									<span class="s-text5">
										hrs
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 minutes">
										00
									</span>

									<span class="s-text5">
										mins
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 seconds">
										00
									</span>

									<span class="s-text5">
										secs
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>