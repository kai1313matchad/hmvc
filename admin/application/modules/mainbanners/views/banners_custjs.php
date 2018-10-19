		<script>
    	// $(document).ready(function(){
    	// 	tables_();
    	// });
      tables_();
    	function tables_()
    	{
    		table = $('#dtb-mainbannerall').DataTable({
    		"info": false,
				"responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
        	"url": "<?php echo site_url('mainbanners/get_mainbannerall')?>",
          "type": "POST",
          },
      	"columnDefs": [{"className": "text-center", "targets": ['_all']}],
    		});
    	}
    	function reload_table()
      {
      	table.ajax.reload(null,false);
      }
      function add_banner()
      {
        $.ajax({
          url : "<?php echo site_url('mainbanners/add_banner')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Add Banner');
          }
        });
      }
      function img_modal(id)
      {
        $('#img_modal').modal('show');
        $('[name="bannerid"]').val(id);
      }
      function edit_banner(id)
      {
        $.ajax({
          url : "<?php echo site_url('mainbanners/update_banner')?>",
          data : {bann_id : id, bann_name : $('[name="bannername['+id+']"]').val(), bann_link : $('[name="bannerlink['+id+']"]').val()},
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            $('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Edit Data</div>');
            reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Update Data');
          }
        });
      }
      function save_img()
      {
        var fd = new FormData();
        var file_data = $('#bannerpic').prop('files')[0];
        fd.append("file", file_data);
        var other_data = $('#form-img').serializeArray();
        $.each(other_data,function(key,input){fd.append(input.name,input.value);});
      	url = "<?php echo site_url('mainbanners/save_img')?>";
      	$.ajax({
					url : url,
          type: "POST",
          cache: false,
          contentType: false,
          processData: false,
          data: fd,
          dataType: "JSON",
          success: function(data)
          {
          	if(data.status)
            {
            	$('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Adding / Update Product</div>');
              reload_table();
              $('#img_modal').modal('hide');
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update Product</div>');
              if(data.error_str_sts)
              {
                $('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>'+data.error_str+'</div>');
              }
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Adding / Update User Data');
          }
        });
      }
      function delete_banner(id)
      {
      	if(confirm('Are you sure delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('mainbanners/del_banner/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	if(data.status)
	          	{
	          		$('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Data</div>');
              	reload_table();
	          	}
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	          	alert('Error Delete Product Data');
	          }
	        });
      	}
      }
    </script>