				<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Product</h3>
              </div>
              <div class="title_right">
                <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <button type="button" class="btn btn-block btn-primary" onclick="save_()">Save</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix">
              <div class="col-xs-12" id="alert-div"></div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Product Pic</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Product Description</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Factsheet</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <form id="form-product" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <input type="hidden" name="form_status" value="<?= $form_sts;?>">
                            <input type="hidden" name="productid" value="<?= $prod_id;?>">
                            <?php
                              if(isset($prod_code))
                              {
                                echo 
                                '<div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Code
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="productcode" required="required" class="form-control col-md-7 col-xs-12" value="'.$prod_code.'" readonly>
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="productname" required="required" class="form-control col-md-7 col-xs-12" value="'.$prod_name.'" readonly>
                                    <span class="help-block"></span>
                                  </div>
                                </div>'
                                ;
                              }
                            ?>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Specification
                              </label>
                              <div class="col-md-2 col-sm-2 col-xs-4">
                                <select id="prodtype" name="prodtype" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-4">
                                <select id="prodsize" name="prodsize" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                              <div class="col-md-1 col-sm-1 col-xs-2">
                                <select id="prodcons" name="prodcons" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                              <div class="col-md-1 col-sm-1 col-xs-2">
                                <select id="prodlight" name="prodlight" data-live-search="true" class="form-control text-center" required>
                                  <option value="0">FL</option>
                                  <option value="1">BL</option>
                                </select>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Province
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="province" name="province" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">District
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="district" name="district" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub-District
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="subdistrict" name="subdistrict" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                            </div> -->
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Street Address</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="streetaddr" required="required" placeholder="Street Address">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Price</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="productprice" required="required" placeholder="Price">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Special Price</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="specialprice" required="required" placeholder="Special Price">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Special Duration</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="specialduration" required="required" placeholder="Special Duration">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Video URL</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="videolink" required="required" value="https://www.youtube.com/embed/">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Map URL</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="maplink" required="required" placeholder="Map Embed Link">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Shortener Code</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="shortcode" required="required" placeholder="Shortener Code">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Client Due Date
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date dtp'>
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                  <input id="rentdue" type='text' class="form-control input-group-addon" name="rentdue" value="" />
                                </div>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax Due Date
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date dtp'>
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                  <input id="taxdue" type='text' class="form-control input-group-addon" name="taxdue" value="" />
                                </div>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Location Rent Due Date
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date dtp'>
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                  <input id="locdue" type='text' class="form-control input-group-addon" name="locdue" value="" />
                                </div>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Insurance Due Date
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date dtp'>
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                  <input id="insurancedue" type='text' class="form-control input-group-addon" name="insurancedue" value="" />
                                </div>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Publish Status</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="radio" class="flat" name="publish" id="publishP" value="1" checked="" required /> Published
                                <input type="radio" class="flat" name="publish" id="publishN" value="0" /> Non-Published
                              </div>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="dropzone">
                            <div class="dz-message">
                              Put Your Photo Here
                            </div>
                          </div>
                          <div class="clearfix"><br></div>
                          <div class="col-md-12 col-sm-12 col-xs-12" id="uploaded_img">
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <form class="form-horizontal form-label-left">
                            <div class="form-group">
                              <textarea id="summernote" name="proddesc"></textarea>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <form id="factsheet" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Factsheet</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control" type="file" name="fsfile" id="fsfile" required="required">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-xs-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-6 col-md-2 col-sm-4">
                                <button type="button" onclick="save_fs()" class="btn btn-info btn-block">Upload</button>
                              </div>
                            </div>
                          </form>
                          <div class="row">
                            <div class="col-md-offset-3 col-sm-offset-3 col-xs-12 col-md-6 col-sm-6">
                              <img src="<?php echo base_url()?>assets/img/factsheet/default.jpg" class="img-responsive" id="fs_img">
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
        <!-- /page content -->