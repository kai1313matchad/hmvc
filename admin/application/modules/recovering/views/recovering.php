<!-- page content -->
<div class="right_col" role="main" style="min-height: 100vh">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Recovering</h3>
      </div>
      <div class="title_right">
        <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <a href="<?php echo base_url('recovering/new') ?>" class="btn btn-block btn-primary">Add</a>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Recovering</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div id="alert-del"></div>
            <table id="dtb-promotion" class="table table-striped table-bordered table-condensed" width="100%">
              <thead>
                <tr>
                  <th class="text-center" width="150">Title</th>
                  <th class="text-center">Description</th>
                  <th class="text-center" width="125">Created At</th>
                  <th class="text-center" width="125">Updated At</th>
                  <th class="text-center"></th>
                  <th class="text-center"></th>
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
