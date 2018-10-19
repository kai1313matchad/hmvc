	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url()?>assets/frontend/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Caption
		</h2>
		<p class="m-text13 t-center">
			Sub Caption
		</p>
	</section>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		
		<div class="container">

	        <div class="row">

	            <!-- Blog Entries Column -->
	            <div class="col-md-8">
	                <h1 class="page-header">
	                    Blog
	                    <small>by Match Ad</small>
	                </h1>
	                <div class="row" id="blog_content">
					</div>
									<?php if(!empty($record)):?>
										<?php foreach($record as $row): ?>
											<!-- First Blog Post -->
											<h2>
												<a href="<?php echo base_url()?>Blogpost/read/<?php echo $row['BLOG_ID']?>"><?php echo $row['BLOG_TITLE'];?></a>
											</h2>
											<p class="lead">
												<!-- by <?php echo $row['author'];?> -->
											</p>
											<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo tgl_indo($row['BLOG_DATE']);?></p>
											<hr>
											<img class="img-responsive" src="<?php echo base_url().'admin/assets/img/blogpost/'.$row['BLOG_PICTURE'];?>" width="800" height="300"alt="">
											<hr>
											<p><?php echo word_limiter($row['BLOG_CONTENT'],50);?></p>
											<!--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->
											<a class="btn btn-primary" href="<?php echo base_url()?>Blogpost/read/<?php echo $row['BLOG_ID']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
											<hr>
										<?php endforeach;?>
									<?php endif;?>					
	                <!-- Pager -->
	                <ul class="pager">
	                    <!-- <?php //echo $pagination ;?> -->
	                    <div id="allPag" name="paging" class="pagination flex-m flex-w p-t-26"></div>
	                </ul>
	            </div>
	            <div class="col-md-4">
					<?php require_once('sidebar.php'); ?>
			    </div>
			</div>
		</div>
	</section>
	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
	<div id="dropDownSelect3"></div>
	<div id="dropDownSelect4"></div>
	<div id="dropDownSelect5"></div>