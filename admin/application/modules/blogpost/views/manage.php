      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Blogpost</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Blogpost</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div id="alert-del"></div>
                    <div class="clearfix"></div>
                    <table id="dtb-blogpost" class="table table-striped table-bordered" width="100%">
                    	<thead>
                      	<tr>
                      		<th class="col-sm-1">No</th>
                          <th class="col-sm-3">Title</th>
                      		<th class="col-sm-6">Slug</th>
                          <th class="col-sm-1">Date</th>
                          <!-- <th class="col-sm-1">Update</th> -->
                          <th class="col-sm-1">Content</th>
                          <th class="col-sm-1">Picture</th>
                          <th class="col-sm-1">Update</th>
                      		<th class="col-sm-1">Delete</th>
                      	</tr>
                      </thead>
                      <tbody>
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
                    <h2>Add/Edit Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form-blogpost" class="form-horizontal form-label-left" enctype="multipart/form-data">
                      <input type="hidden" name="form_status" value="1">
                      <input type="hidden" name="blog_id" value="1">
                      <input type="hidden" name="picture_name" value="">
                      <div class="col-xs-12" id="alert-div">
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="blog_title" required="required" class="form-control col-md-7 col-xs-12" placeholder="Blog title">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date dtp'>
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input id="blog_date" type='text' class="form-control input-group-addon" name="blog_date" value="" />
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Picture
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="blog_picture" name="blog_picture" required="required" class="form-control col-md-7 col-xs-12" placeholder="Blog title">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blog Content
                        </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control" id="blog_content" name="blog_content" rows="3" required="required" placeholder=""></textarea>
                              <span class="help-block"></span>
                            </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset" onclick="resetbtn()">Reset</button>
                          <button type="button" class="btn btn-success" onclick="save()">Submit</button>
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