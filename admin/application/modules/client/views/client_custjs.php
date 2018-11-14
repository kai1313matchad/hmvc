		<script>
			$(document).ready(function(){
				$('.dtp').datetimepicker({
          format: 'YYYY-MM-DD'
        });
        createtb();
        dropclient();
        dropproduct();
    	});
    	function createtb()
    	{
    		$('#tbcontent').empty();
    		$.ajax({
          url : "<?php echo site_url('client/getHisClientAll')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            for (var i = 0; i < data.length; i++)
            {
              var $tr = $('<tr>').append(
                  $('<td class="text-center">'+data[i]["PROD_NAME"]+'</td>'),
                  $('<td class="text-center">'+data[i]["CLIENT_NAME"]+'</td>'),
                  $('<td class="text-center">'+data[i]["HISCL_DATESTART"]+'</td>'),
                  $('<td class="text-center">'+data[i]["HISCL_DATEEND"]+'</td>'),
                  $('<td class="text-center"><a href="javascript:void(0)" class="btn btn-xs btn-primary btn-responsive" onclick="edit_hisclient('+"'"+data[i]["HISCL_ID"]+"'"+')"><span class="glyphicon glyphicon-pencil"></span> </a> <a href="javascript:void(0)" title="Hapus Data" class="btn btn-xs btn-danger btn-responsive" onclick="delete_hisclient('+"'"+data[i]["HISCL_ID"]+"'"+')"><span class="glyphicon glyphicon-trash"></span> </a></td>')
                ).appendTo('#tbcontent');
            }
            dtables();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Delete Product Data');
          }
        });
    	}
    	function dtables()
      {
        $('#dtb-hisclient').DataTable({
          info: true,
          responsive: true,
          processing: true,
          pageLength: 100,
          order: [[0, 'asc']],
        });
      }
      function dropclient()
      {
      	$.ajax({
          url : "<?php echo site_url('client/getClientAll')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById('clientlist');
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i]["CLIENT_ID"]
              option.text = data[i]["CLIENT_NAME"];
              select.add(option);
            }
            $('#clientlist').selectpicker({});
            $('#clientlist').selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function dropproduct()
      {
      	$.ajax({
          url : "<?php echo site_url('client/getProductAll')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById('prodlist');
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i]["PROD_ID"]
              option.text = data[i]["PROD_NAME"];
              select.add(option);
            }
            $('#prodlist').selectpicker({});
            $('#prodlist').selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function save_()
      {
      	$.ajax({
          url : "<?php echo site_url('client/savehisclient')?>",
          data : $('#form_hisclient').serialize(),
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
          	$("#dtb-hisclient").dataTable().fnDestroy();
            if(data.status)
            {
              $('#alert-msg').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Save/Update Data</div>');
              createtb();
              $('#form_hisclient')[0].reset();
              $('[name="formsts"]').val('0');
              $('[name="hisclientid"]').val('');
              $('#clientlist').selectpicker({});
            	$('#clientlist').selectpicker('refresh');
            	$('#prodlist').selectpicker({});
            	$('#prodlist').selectpicker('refresh');
            }
            else
            {
              $('#alert-msg').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Failed Save/Update Data</div>');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Update Data');
          }
        });
      }
      function edit_hisclient(id)
      {
      	$('[name="formsts"]').val('1');
      	$.ajax({
        	url : "<?php echo site_url('client/getHisClient/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="hisclientid"]').val(data.HISCL_ID);
          	$('select#prodlist').val(data.PROD_ID);
          	$('#prodlist').selectpicker('refresh');
          	$('select#clientlist').val(data.CLIENT_ID);
          	$('#clientlist').selectpicker('refresh');
          	$('[name="perstart"]').val(data.HISCL_DATESTART);
          	$('[name="perend"]').val(data.HISCL_DATEEND);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
      }
      function delete_hisclient(id)
      {
      	if(confirm('Are you sure to delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('client/delHisClient/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	$("#dtb-hisclient").dataTable().fnDestroy();
	          	createtb();
              $('#form_hisclient')[0].reset();
              $('[name="formsts"]').val('0');
              $('[name="hisclientid"]').val('');
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	          	alert('Error Get Product Data');
	          }
	        });
      	}
      }
		</script>