				<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Products</h3>
              </div>
              <div class="title_right">
                <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <a href="<?php echo base_url('Products/crud/add')?>" class="btn btn-block btn-primary">Add</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div id="alert-del"></div>
                    <table id="dtb-prodall" class="table table-striped table-bordered table-condensed" width="100%">
                    	<thead>
                      	<tr>
                      		<!-- <th >No</th> -->
                      		<th class="col-xs-3 text-center">Nama</th>
                          <th class="text-center">Type</th>
                          <th class="text-center">Size</th>
                          <th class="text-center">Status</th>
                          <th class="text-center"><i class="fa fa-lightbulb-o"></i></th>
                      		<th class="text-center">Price</th>
                          <th class="text-center">Rent</th>
                          <th class="text-center">Tax</th>
                          <th class="text-center">Insurance</th>
                          <th class="text-center"><i class="fa fa-bolt"></i></th>
                      		<th class="text-center">Action</th>
                      	</tr>
                      </thead>
                      <tbody id="tbcontent">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->