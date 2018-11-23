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
                    <a href="<?php echo base_url('products/crud/add')?>" class="btn btn-block btn-primary">Add</a>
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
                      		<th class="col-xs-3 text-center">Product Name</th>
                          <th class="text-center">Type</th>
                          <th class="text-center">Size</th>
                          <th class="text-center">Status</th>
                          <th class="text-center"><i class="fa fa-lightbulb-o"></i></th>
                      		<th class="text-center">Price</th>
                          <th class="col-xs-1 text-center">MKT<br>Client</th>
                          <th class="col-xs-1 text-center">PAT<br>Tax</th>
                          <th class="col-xs-1 text-center">SITAC<br>Rent</th>
                          <th class="col-xs-1 text-center">GA<br>Insu.</th>
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
        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" id="modalHisClient" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Client History</h4>
              </div>
              <div class="modal-body">
                <div id="alert-div"></div>
                <div class="row">
                  <div class="col-xs-12">
                    <table id="dtb-hisclient" class="table table-striped table-bordered table-condensed" width="100%">
                      <thead>
                        <tr>
                          <th class="text-center">Client</th>
                          <th class="text-center">Start</th>
                          <th class="text-center">End</th>
                        </tr>
                      </thead>
                      <tbody id="tbcontent_hisclient"></tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_img()">Save</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /Modal -->