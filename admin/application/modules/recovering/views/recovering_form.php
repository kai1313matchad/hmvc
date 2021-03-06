<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manage Recovering</h3>
			</div>
		</div>

		<div class="clearfix">
			<div class="col-xs-12" id="alert-div"></div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel" style="position: relative">
					<div class="loading-page d-none">
						<h6>Tunggu Sebentar...</h6>
					</div>
					<div class="x_title">
						<h2>Recovering Page</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="<?php if ($this->uri->segment(2) == 'new') { ?>active<?php } ?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General</a>
								</li>
								<li role="presentation" class="<?php if ($this->uri->segment(2) == 'edit') { ?>active<?php } else { ?> disabled<?php } ?>">
									<?php if ($this->uri->segment(2) == 'edit') { ?>
										<a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Image</a>
										<input type="hidden" id="recovering_id" value="<?php echo $read_recovering['ID'] ?>">
									<?php } else { ?>
										<a href="javascript:;" role="tab" aria-expanded="false">Image</a>
									<?php } ?>
								</li>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade <?php if ($this->uri->segment(2) == 'new') { ?>active in<?php } ?>" id="tab_content1" aria-labelledby="home-tab">
									<form id="form-product" class="form-horizontal form-label-left" enctype="multipart/form-data">
										<div class="form-group">
											<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input class="form-control col-md-7 col-xs-12 inp_title" type="text" name="title" required="required" placeholder="Title" value="<?php echo $this->uri->segment(2) == 'edit' ? $read_recovering['TITLE'] : '' ?>">
												<span class="help-block"></span>
											</div>
										</div>
										<div class="form-group">
											<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea class="form-control" id="description" name="description" rows="3" required="required" placeholder=""><?php echo $this->uri->segment(2) == 'edit' ? $read_recovering['DESCRIPTION'] : '' ?></textarea>
											</div>
										</div>
										<div class="text-right">
											<?php if ($this->uri->segment(2) == 'new') { ?>
												<button type="button" class="btn btn-primary" onclick="Recovering.create()">Next Step
												</button>
											<?php } ?>
											<?php if ($this->uri->segment(2) == 'edit') { ?>
												<a href="#tab_content2" class="btn btn-primary" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Next Step</a>
											<?php } ?>
										</div>
									</form>
								</div>
								<div role="tabpanel" class="tab-pane fade <?php if ($this->uri->segment(2) == 'edit') { ?>active in<?php } ?>" id="tab_content2" aria-labelledby="profile-tab">
									<div id="bg_img" style="height: 150px; width: 100%; border: 1px dashed #ccc; display: flex; justify-content: center; align-items: center">
										<h5>Upload Here!</h5>
									</div>
									<div class="row" style="margin-top: 16px">
										<?php if ($this->uri->segment(2) == 'edit' && $read_recovering['IMAGE'] != '') { ?>
											<div class="col-md-2" style="position: relative">
												<img class="img-fw" src="<?php echo base_url() ?>/assets/img/recovering/<?php echo $read_recovering['IMAGE'] ?>" />
												<button class="btn btn-danger delete">
													<i class="glyphicon glyphicon-trash"></i>
												</button>
											</div>
										<?php } ?>
										<div class="files" id="previews">

											<div id="template" class="col-md-2" style="position: relative">
												<!-- This is used as the file preview template -->
												<div>
													<span class="preview"><img class="img-fw" data-dz-thumbnail /></span>
												</div>
												<div style="display: none">
													<p class="name" data-dz-name></p>
													<input type="hidden" class="file_img">
													<strong class="error text-danger" data-dz-errormessage></strong>
												</div>
												<div>
													<button class="btn btn-primary start" style="display: none">
														<i class="glyphicon glyphicon-upload"></i>
														<span>Start</span>
													</button>
													<button data-dz-remove class="btn btn-warning cancel" style="display: none">
														<i class="glyphicon glyphicon-ban-circle"></i>
														<span>Cancel</span>
													</button>
													<button data-dz-remove class="btn btn-danger delete">
														<i class="glyphicon glyphicon-trash"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<a class="btn btn-primary" href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Previous Step
											</a>
											<button type="button" class="btn btn-success" onclick="Recovering.update(this, '<?php echo $read_recovering['ID'] ?>')">Save
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.img-fw {
		width: 100%
	}

	.delete {
		position: absolute;
		top: 0;
		right: 10px;
		margin: 0;
	}

	#related_product,
	.select2-container {
		width: 100% !important
	}
</style>
<!-- /page content -->