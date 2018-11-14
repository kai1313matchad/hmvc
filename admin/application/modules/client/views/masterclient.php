				<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Client Data</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Client Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div id="alert-del"></div>
                    <div class="clearfix"></div>
                    <table id="dtb-client" class="table table-striped table-bordered" width="100%">
                    	<thead>
                      	<tr>
                          <th class="col-sm-4">Client Name</th>
                      		<th class="col-sm-4">Information</th>
                          <th class="col-sm-4">Action</th>
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

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Client Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form_masterclient" class="form-horizontal form-label-left">
                      <div id="alert-msg" class="col-xs-12"></div>
                      <input type="hidden" name="formsts" value="0">
                      <input type="hidden" name="clientid" value="">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Client Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="clientname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Information
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="clientinfo" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="button" id="savedata" class="btn btn-success" onclick="save_()">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" id="img_modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
              </div>
              <div class="modal-body">
                <div id="alert-div"></div>
                <form id="form-img" class="form-horizontal form-label-left" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="bannerpic" name="bannerpic" required="required">
                      <span class="help-block"></span>
                    </div>
                    <input type="hidden" name="bannerid" value="">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_img()">Save</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /Modal -->