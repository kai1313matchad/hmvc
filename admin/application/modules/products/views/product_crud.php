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
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <form id="form-product" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <input type="hidden" name="form_status" value="1">
                            <input type="hidden" name="productid" value="<?= $prod_id;?>">
                            <?php
                              if(isset($prod_crud))
                              {
                                echo 
                                '<div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Code
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="productcode" required="required" class="form-control col-md-7 col-xs-12" placeholder="Product Code">
                                    <span class="help-block"></span>
                                  </div>
                                </div>';
                              }
                            ?>                            
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="productname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Product Name">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Type
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="prodtype" name="prodtype" data-live-search="true" class="form-control text-center" required>
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
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub-District
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="subdistrict" name="subdistrict" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Street Address</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="streetadd" required="required" placeholder="Street Address">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Size
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="prodsize" name="prodsize" data-live-search="true" class="form-control text-center" required>
                                </select>
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Construct
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="prodcons" name="prodcons" data-live-search="true" class="form-control text-center" required>
                                </select>
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
                                <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="specialprice" required="required" placeholder="Price">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Picture</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="file" id="productpic" name="productpic" required="required">
                                <span class="help-block"></span>
                              </div>
                            </div>
                            <!-- <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset" onclick="resetbtn()">Reset</button>
                                <button type="button" class="btn btn-success" onclick="save()">Submit</button>
                              </div>
                            </div> -->
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
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