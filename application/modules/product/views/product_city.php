<!-- Title Page -->
<section class="bg-title-page flex-col-c-m">
	<iframe src="<?php echo $header_video ?>"></iframe>
</section>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 p-b-50">
				<div class="row mb-3">
					<div class="col-sm-6 col-xs-6 col-md-3 col-lg-3 rs2-select2 bo4 mr-3 ml-3">
						<select class="selection-2" name="sorting" id="sorting" onchange="Product.setSort(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['size']?>', '<?php echo $_GET['city']?>')">
							<option value="">Default Sorting</option>
							<option value="sortPriceASC" <?php if($_GET['sort'] == 'sortPriceASC') {?>selected<?php }?>>Price: low to high</option>
							<option value="sortPriceDESC" <?php if($_GET['sort'] == 'sortPriceDESC') {?>selected<?php }?>>Price: high to low</option>
							<option value="sortNameASC" <?php if($_GET['sort'] == 'sortNameASC') {?>selected<?php }?>>Product Name: A to Z</option>
							<option value="sortNameDESC" <?php if($_GET['sort'] == 'sortNameDESC') {?>selected<?php }?>>Product Name: Z to A</option>
						</select>
					</div>
					<div class="col-sm-6 col-xs-6 col-md-2 col-lg-2 rs2-select2 bo4 mr-3">
						<select class="selection-3" name="categories" onchange="Product.setFilterCategory(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['size']?>', '<?php echo $_GET['city']?>', '<?php echo $_GET['sort']?>')">
							<option value="">All Categories</option>
							<?php foreach($ctg as $val) {?>
								<option value="<?php echo $val['PRT_ID']?>" <?php if($_GET['category'] == $val['PRT_ID']) {?>selected<?php }?>><?php echo $val['PRT_NAME']?></option>
							<?php }?>
						</select>
					</div>
					<div class="col-sm-6 col-xs-6 col-md-2 col-lg-2 rs2-select2 bo4 mr-3">
						<select class="selection-5" name="size" onchange="Product.setFilterSize(this, '<?php echo $_GET['search']?>', '<?php echo $_GET['city']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['sort']?>')">
							<option value="">All Size</option>
							<?php foreach($size as $val) {?>
								<option value="<?php echo $val['PRSZ_ID']?>" <?php if($_GET['size'] == $val['PRSZ_ID']) {?>selected<?php }?>><?php echo $val['PRSZ_NAME']?></option>
							<?php }?>
						</select>
					</div>
					<div class="col-sm-6 col-xs-6 col-md-3 col-lg-3 rs2-select2 bo4">
						<input class="s-text7 size6 p-l-23 p-r-50 inp-search" type="text" name="prod_name" placeholder="Search Products..." value="<?php echo $_GET['search']?>">
					</div>
					<div class="col-sm-6 col-xs-6 col-md-1 col-lg-1">
						<button type="button" onclick="Product.setFilterSearch(this, '<?php echo $_GET['size']?>', '<?php echo $_GET['city']?>', '<?php echo $_GET['category']?>', '<?php echo $_GET['sort']?>')" class="btn btn-primary form-control" style="height: 60px;">
							<i class="fs-12 fa fa-search" aria-hidden="true"></i>
						</button>
					</div>
				</div>

				<div class="row mt-3">
					<?php if(count($read_product) > 0) {?>
						<?php foreach($read_product as $k => $val) {?>
							<div class="col-sm-6 col-xs-6 col-md-6 col-lg-4 p-b-50">
								<div class="block2">
									<div class="block2-img wrap-pic-w hov-img-zoom pos-relative block2-<?php if($val['PROD_RENTDUE'] < date('Y-m-d')) {?>labelava<?php } else {?>labelsold<?php }?>">
										<?php if($val['PROD_SPCPRICE'] > 0) {?>
											<img src="<?= base_url()?>assets/frontend/images/misc/badgeimlek.png" class="notify-badge" alt="">
										<?php }?>
										<?php if($val['PROD_VIDLINK'] == '' || $val['PROD_VIDLINK'] == null) {?>
											<img src="<?php echo base_url()?>admin/<?php echo $val['PRODPIC_PATH']?>" alt="IMG-PRODUCT">
										<?php } else {?>
											<iframe src="<?php echo $val['PROD_VIDLINK']?>" class="video-thumbnail"></iframe>
										<?php }?>
										<div class="block2-txt p-t-20">
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
											<a href="<?php echo base_url();?>product/details/<?php echo $val['PROD_SLUG']?>" class="btn btn-primary mt-3 float-right">Detail</a>
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

	.bg-title-page {
		padding: 0 !important
	}

	.bg-title-page > iframe {
		width: 100%;
		height: 500px;
	}

	.video-thumbnail {
		width: 100%;
		height: 208px;
	}
</style>
<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>
<div id="dropDownSelect3"></div>
<div id="dropDownSelect4"></div>
<div id="dropDownSelect5"></div>