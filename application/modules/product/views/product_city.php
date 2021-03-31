<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url()?>admin/assets/img/shopcategories/btab.gif);">
	<!-- <h2 class="l-text2 t-center">
		Caption
	</h2>
	<p class="m-text13 t-center">
		Sub Caption
	</p> -->
</section>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<input type="hidden" name="filter" value="0"></input> 
					<input type="hidden" name="ctg" value=""></input> 
					<input type="hidden" name="loc" value=""></input> 
					<input type="hidden" name="siz" value=""></input> 

					<h4 class="m-text14 p-b-2">
						Categories
					</h4>
					<ul class="p-b-5">
						<li class="p-t-4">
							<div class="rs2-select2 bo4 of-hidden">
								<select class="selection-3" name="categories" onchange="Product.setFilterCategory(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['size']?>', '<?php echo $_GET['city']?>', '<?php echo $_GET['sort']?>')">
									<option value="">All</option>
									<?php foreach($ctg as $val) {?>
										<option value="<?php echo $val['PRT_ID']?>" <?php if($_GET['category'] == $val['PRT_ID']) {?>selected<?php }?>><?php echo $val['PRT_NAME']?></option>
									<?php }?>
								</select>
							</div>
						</li>
					</ul>

					<!-- <h4 class="m-text14 p-b-2">
						Location
					</h4>
					<ul class="p-b-5">
						<li class="p-t-4">
							<div class="rs2-select2 bo4 of-hidden">
								<select class="selection-4" name="location" onchange="Product.setFilterCity(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['size']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['sort']?>')">
									<option value="">All</option>
									<?php foreach($read_city as $val) {?>
										<option value="<?php echo $val['CITY_ID']?>" <?php if($_GET['city'] == $val['CITY_ID']) {?>selected<?php }?>><?php echo $val['NAME']?></option>
									<?php }?>
								</select>
							</div>
						</li>
					</ul> -->
					<h4 class="m-text14 p-b-2">
						Size
					</h4>
					<ul class="p-b-5">
						<li class="p-t-4">
							<div class="rs2-select2 bo4 of-hidden">
								<select class="selection-5" name="size" onchange="Product.setFilterSize(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['city']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['sort']?>')">
									<option value="">All</option>
									<?php foreach($size as $val) {?>
										<option value="<?php echo $val['PRSZ_ID']?>" <?php if($_GET['size'] == $val['PRSZ_ID']) {?>selected<?php }?>><?php echo $val['PRSZ_NAME']?></option>
									<?php }?>
								</select>
							</div>
						</li>
					</ul>

					<div class="search-product pos-relative bo4 of-hidden">
						<input class="s-text7 size6 p-l-23 p-r-50 inp-search" type="text" name="prod_name" placeholder="Search Products..." value="<?php echo $_GET['search']?>">
					</div>
					<br>
					<div class="pos-relative bo4 of-hidden">
						<button type="button" onclick="Product.setFilterSearch(this, '<?php echo $_GET['size']?>', '<?php echo $_GET['city']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['sort']?>')" class="btn btn-primary form-control">
							<i class="fs-12 fa fa-search" aria-hidden="true"></i>
						</button>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-xs-12 col-md-8 col-lg-9 p-b-50">
				<div class="flex-sb-m flex-w p-b-35">
					<div class="flex-w">
						<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6 rs2-select2 bo4 of-hidden w-size33 m-t-5 m-b-5 m-r-5">
							<select class="selection-2" name="sorting" id="sorting" onchange="Product.setSort(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['size']?>', '<?php echo $_GET['city']?>')">
								<option value="">Default Sorting</option>
								<option value="sortPriceASC" <?php if($_GET['sort'] == 'sortPriceASC') {?>selected<?php }?>>Price: low to high</option>
								<option value="sortPriceDESC" <?php if($_GET['sort'] == 'sortPriceDESC') {?>selected<?php }?>>Price: high to low</option>
								<option value="sortNameASC" <?php if($_GET['sort'] == 'sortNameASC') {?>selected<?php }?>>Product Name: A to Z</option>
								<option value="sortNameDESC" <?php if($_GET['sort'] == 'sortNameDESC') {?>selected<?php }?>>Product Name: Z to A</option>
							</select>
						</div>

						<!-- <div class="col-sm-5 col-xs-5 col-md-5 col-lg-5 rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-5">
							<select class="selection-2" name="sorting">
								<option>Price</option>
								<option>$0.00 - $50.00</option>
								<option>$50.00 - $100.00</option>
								<option>$100.00 - $150.00</option>
								<option>$150.00 - $200.00</option>
								<option>$200.00+</option>
							</select>
						</div> -->
					</div>

					<!-- <span class="s-text8 p-t-5 p-b-5">
						Showing 1–12 of 16 results
					</span> -->
				</div>

				<div class="row">
					<?php if(count($read_product) > 0) {?>
						<?php foreach($read_product as $k => $val) {?>
							<div class="col-sm-6 col-xs-6 col-md-6 col-lg-4 p-b-50">
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden hov-img-zoom pos-relative block2-<?php if($val['PROD_RENTDUE'] < date('Y-m-d')) {?>labelava<?php } else {?>labelsold<?php }?>">
										<a href="<?php echo base_url();?>product/details/<?php echo $val['PROD_SLUG']?>">
											<?php if($val['PROD_SPCPRICE'] > 0) {?>
												<img src="<?= base_url()?>assets/frontend/images/misc/badgeimlek.png" class="notify-badge" alt="">
											<?php }?>
											<img src="<?php echo base_url()?>admin/<?php echo $val['PRODPIC_PATH']?>" alt="IMG-PRODUCT">
										</a>
										<div class="block2-txt p-t-20">
											<a href="<?php echo base_url();?>product/details/<?php echo $val['PROD_SLUG']?>" class="block2-name dis-block s-text3 p-b-5"><?php echo $val['PROD_NAME'] ?></a>
											<?php if ($val['PROD_SPCPRICE'] > 0) {?>
												<div class="block2-oldprice m-text7 p-r-5">
													Rp <?php echo number_format($val['PROD_PRICE'])?>
												</div>
												<div class="block2-newprice m-text8 p-r-5">
													Rp <?php echo number_format($val['PROD_SPCPRICE'])?>
												</div>
											<?php } else {?>
												<div class="block2-price m-text6 p-r-5">
													Rp <?php echo number_format($val['PROD_PRICE'])?>
												</div>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						<?php }?>
					<?php } else {?>
						<div class="col-md-12 text-center">
							No Result found.
						</div>
					<?php }?>
				</div>

				<div class="row">
					<div class="col-md-12">
						<nav aria-label="Page navigation example">
							<ul class="pagination pagination justify-content-start">
								<?php if($page_active > 1) {?>
									<li class="page-item">
										<a class="page-link" href="read?search=<?php echo $_GET['search'] ?>&category=<?php echo $_GET['category'] ?>&size=<?php echo $_GET['size'] ?>&city=<?php echo $_GET['city'] ?>&page=<?php echo $page_active - 1?>&limit=<?php echo $page_limit?>&sort=<?php $_GET['sort']?>" tabindex="-1" aria-disabled="true">&laquo;</a>
									</li>
								<?php }?>
								<?php for ($i=1; $i <= $page_count; $i++) { ?>
									<li class="page-item 
										<?php if($page_active == $i) {?>active<?php }?>" 
										<?php if($page_active == $i) {?>aria-current="page"<?php }?>
									>
										<a class="page-link" 
											<?php if($page_active == $i) {?>
												href="javascript:;"
											<?php } else {?>
												href="read?search=<?php echo $_GET['search'] ?>&category=<?php echo $_GET['category'] ?>&size=<?php echo $_GET['size'] ?>&city=<?php echo $_GET['city']?>&page=<?php echo $i?>&limit=<?php echo $page_limit?>&sort=<?php $_GET['sort']?>"
											<?php }?>
										>
											<?php echo $i?>
										</a>
									</li>
								<?php }?>
								<?php if($page_active < $page_count) {?>
									<li class="page-item">
										<a class="page-link" href="read?search=<?php echo $_GET['search'] ?>&category=<?php echo $_GET['category'] ?>&size=<?php echo $_GET['size'] ?>&city=<?php echo $_GET['city']?>&page=<?php echo $page_active + 1?>&limit=<?php echo $page_limit?>&sort=<?php $_GET['sort']?>" tabindex="-1" aria-disabled="true">&raquo;</a>
									</li>
								<?php }?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	.page-link {
		border-radius: 50% !important;
		width: 36px;
		height: 36px;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		margin: 6px;
		color: #222222;
	}

	.page-item.active .page-link {
		z-index: 2;
		color: #fff;
		background-color: #222222;
		border-color: #222222;
	}
</style>
<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>
<div id="dropDownSelect3"></div>
<div id="dropDownSelect4"></div>
<div id="dropDownSelect5"></div>