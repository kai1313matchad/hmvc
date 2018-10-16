		<script>
    	$(document).ready(function(){
    		// tables();
        createtb();
    	});
      function createtb()
      {
        $.ajax({
          url : "<?php echo site_url('products/get_all')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            for (var i = 0; i < data.length; i++)
            {
              var rent = Date.parse(data[i]["PROD_RENTDUE"]);
              var tax = Date.parse(data[i]["PROD_TAXDUE"]);
              var insu = Date.parse(data[i]["PROD_INSURANCEDUE"]);
              var light = (data[i]["PROD_LIGHTING"] != '0')?'BL':'FL';
              var pub = (data[i]["PROD_STS"] != '0')?'<i class="fa fa-eye"></i>':'<i class="fa fa-eye-slash"></i>';
              var $tr = $('<tr>').append(
                  // $('<td class="text-center">'+(i+1)+'</td>'),
                  $('<td class="text-left">'+data[i]["PROD_NAME"]+'</td>'),
                  $('<td class="text-center">'+data[i]["PRT_NAME"]+'</td>'),
                  $('<td class="text-center">'+data[i]["PRSZ_NAME"]+'</td>'),
                  $('<td class="text-center">'+data[i]["CONS_NAME"]+'</td>'),
                  $('<td class="text-center">'+light+'</td>'),
                  $('<td class="text-center numm">'+data[i]["PROD_PRICE"]+'</td>'),
                  $('<td data-order="'+rent+'" class="text-center">'+data[i]["PROD_RENTDUE"]+'</td>'),
                  $('<td data-order="'+tax+'" class="text-center">'+data[i]["PROD_TAXDUE"]+'</td>'),
                  $('<td data-order="'+insu+'" class="text-center">'+data[i]["PROD_INSURANCEDUE"]+'</td>'),
                  $('<td data-order="'+data[i]["PROD_STS"]+'" class="text-center">'+pub+'</td>'),
                  $('<td class="text-center"><a href="products/crud/'+data[i]["PROD_CODE"]+'" target="blank__" title="Edit Data" class="btn btn-xs btn-primary btn-responsive"><span class="glyphicon glyphicon-pencil"></span> </a> <a href="javascript:void(0)" title="Hapus Data" class="btn btn-xs btn-danger btn-responsive" onclick="delete_prod('+"'"+data[i]["PROD_ID"]+"'"+')"><span class="glyphicon glyphicon-trash"></span> </a></td>')
                ).appendTo('#tbcontent');
            }
            dtables();
            $('td.numm').number(true,2);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Delete Product Data');
          }
        });
      }
      function dtables()
      {
        $('#dtb-prodall').DataTable({
          info: true,
          responsive: true,
          processing: true,
          pageLength: 100,
          order: [[0, 'asc']],
        });
      }
    	function tables()
    	{
    		table = $('#dtb-prodall').DataTable({
    		"info": false,
				"responsive": true,
        "processing": true,
        "serverSide": true,
        "pageLength": 100,
        // "order": [],
        "ajax": {
        	"url": "<?php echo site_url('products/get_productall')?>",
          "type": "POST",
          },
      	"columnDefs": 
          [
            {"className": "text-center", "targets": [0,2,3,4,5,6,7]},
          ],
        "createdRow": function(row, data, dataIndex)
          {
            var $dateCell = $(row).find('td:eq(4)'); // get first column
            var dateOrder = $dateCell.text(); // get the ISO date
            $dateCell
            .attr('data-order', moment(dateOrder)) // set it to data-order
            .text(moment(dateOrder).format('DD-MMM-YYYY')); // and set the formatted text
          }
    		});
    	}
    	function reload_table()
      {
      	table.ajax.reload(null,false);
      }
      function save_()
      {
        $.ajax({
          url : "<?php echo site_url('products/test')?>",
          data : $('#form-product').serialize(),
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            if(data.status)
            {
              $('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Update Data</div>');
            }
            else
            {
              $('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Failed Update Data</div>');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Update Data');
          }
        });
      }
      function save()
      {
        var fd = new FormData();
        var file_data = $('#productpic').prop('files')[0];
        fd.append("file", file_data);
        var other_data = $('#form-product').serializeArray();
        $.each(other_data,function(key,input){fd.append(input.name,input.value);});
      	url = "<?php echo site_url('admin/product/product_/save_product')?>";
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
              resetbtn();
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update Product</div>');
              if(data.error_str_sts)
              {
                $('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>'+data.error_str+'</div>');
              }
              for (var i = 0; i < data.inputerror.length; i++) 
              {
                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
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
        	url : "<?php echo site_url('admin/product/product_/get_prodrow/')?>"+id,
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
	        	url : "<?php echo site_url('admin/product/product_/del_product/')?>"+id,
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
      function drop_(tb,id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('products/get_dropprov/')?>"+tb,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
              select.add(option);
            }
            $('#'+id).selectpicker({});
            $('#'+id).selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function dropdistrict_(pk,id,idx,v)
      {
        $('#'+id).empty();
        $.ajax({
          url : "<?php echo site_url('products/get_dropdistrict/')?>"+pk,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
              select.add(option);
            }
            $('#'+id).selectpicker({});
            $('#'+id).selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function dropsubdistrict_(pk,id,idx,v)
      {
        $('#'+id).empty();
        $.ajax({
          url : "<?php echo site_url('products/get_dropsubdistrict/')?>"+pk,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
              select.add(option);
            }
            $('#'+id).selectpicker({});
            $('#'+id).selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function dropprodtype(tb,id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('products/get_dropprodtype/')?>"+tb,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
              select.add(option);
            }
            $('#'+id).selectpicker({});
            $('#'+id).selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
    </script>