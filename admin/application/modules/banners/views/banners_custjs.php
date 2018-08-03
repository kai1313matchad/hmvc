		<script>
    	$(document).ready(function(){
    		tables();
    	});
    	function tables()
    	{
    		table = $('#dtb-mainbannerall').DataTable({
    		"info": false,
				"responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
        	"url": "<?php echo site_url('Banners/get_mainbannerall')?>",
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
          url : "<?php echo site_url('Banners/add_banner')?>",
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
        alert($('[name="bannername['+id+']"]').val());
        $.ajax({
          url : "<?php echo site_url('Banners/update_banner')?>",
          type: "POST",
          data: function(data)
          {
            data.bann_name = $('[name="bannername['+id+']"]').val();
          },
          dataType: "JSON",
          success: function(data)
          {
            alert(data.message);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Adding / Update User Data');
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
      	url = "<?php echo site_url('Banners/save_img')?>";
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
      function resetbtn()
      {
      	$('[name="form_status"]').val('1');
      	$('#form-product')[0].reset();
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
      function edit_prod(id)
      {
        $('#form-product')[0].reset();
      	$('[name="form_status"]').val('2');
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
        	url : "<?php echo site_url('admin/product/Product_/get_prodrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="productid"]').val(data.PROD_ID);
          	$('[name="productname"]').val(data.PROD_NAME);
          	$('[name="productprice"]').val(data.PROD_PRICE);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
      }
      function delete_prod(id)
      {
      	if(confirm('Are you sure delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('admin/product/Product_/del_product/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	if(data.status)
	          	{
	          		$('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Product Data</div>');
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