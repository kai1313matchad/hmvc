		<script>
			$(document).ready(function(){
        createtb();
    	});
    	function createtb()
    	{
    		$('#tbcontent').empty();
    		$.ajax({
          url : "<?php echo site_url('client/getClientAll')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            for (var i = 0; i < data.length; i++)
            {
              var pub = (data[i]["PROD_STS"] != '0')?'<i class="fa fa-eye"></i>':'<i class="fa fa-eye-slash"></i>';
              var $tr = $('<tr>').append(
                  $('<td class="text-center">'+data[i]["CLIENT_NAME"]+'</td>'),
                  $('<td class="text-center">'+data[i]["CLIENT_INFO"]+'</td>'),
                  $('<td class="text-center"><a href="javascript:void(0)" class="btn btn-xs btn-primary btn-responsive" onclick="edit_client('+"'"+data[i]["CLIENT_ID"]+"'"+')"><span class="glyphicon glyphicon-pencil"></span> </a> <a href="javascript:void(0)" title="Hapus Data" class="btn btn-xs btn-danger btn-responsive" onclick="delete_client('+"'"+data[i]["CLIENT_ID"]+"'"+')"><span class="glyphicon glyphicon-trash"></span> </a></td>')
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
        $('#dtb-client').DataTable({
          info: true,
          responsive: true,
          processing: true,
          pageLength: 100,
          order: [[0, 'asc']],
        });
      }
      function save_()
      {
      	$.ajax({
          url : "<?php echo site_url('client/saveclient')?>",
          data : $('#form_masterclient').serialize(),
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
          	$("#dtb-client").dataTable().fnDestroy();
            if(data.status)
            {
              $('#alert-msg').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Save/Update Data</div>');
              createtb();
              $('#form_masterclient')[0].reset();
              $('[name="formsts"]').val('0');
              $('[name="clientid"]').val('');
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
      function edit_client(id)
      {
      	$('[name="formsts"]').val('1');
      	$.ajax({
        	url : "<?php echo site_url('client/getClient/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="clientid"]').val(data.CLIENT_ID);
          	$('[name="clientname"]').val(data.CLIENT_NAME);
          	$('[name="clientinfo"]').val(data.CLIENT_INFO);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
      }
      function delete_client(id)
      {
      	if(confirm('Are you sure to delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('client/delClient/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	$("#dtb-client").dataTable().fnDestroy();
	          	createtb();
              $('#form_masterclient')[0].reset();
              $('[name="formsts"]').val('0');
              $('[name="clientid"]').val('');
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	          	alert('Error Get Product Data');
	          }
	        });
      	}
      }
		</script>