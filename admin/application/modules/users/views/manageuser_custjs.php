		<script>
    	$(document).ready(function(){
    		tables();
    		gen_();
    	});
    	function tables()
    	{
    		table = $('#dtb-userall').DataTable({
    		"info": false,
				"responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
        	"url": "<?php echo site_url('Users/get_userall')?>",
          "type": "POST",
          },
      	"columnDefs": [{"className": "text-center", "targets": ['_all']}],
    		});
    	}
    	function reload_table()
      {
      	table.ajax.reload(null,false);
      }
      function save()
      {
      	url = "<?php echo site_url('Users/save_user')?>";
      	$.ajax({
					url : url,
          type: "POST",
          data: $('#form-users').serialize(),
          dataType: "JSON",
          success: function(data)
          {
          	if(data.status)
            {
            	$('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Adding / Update Data User</div>');
              reload_table();
              resetbtn();
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update User Data</div>');
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
      	$('#form-users')[0].reset();
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        gen_();
      }
      function edit_user(id)
      {
      	$('[name="form_status"]').val('2');
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
        	url : "<?php echo site_url('Users/get_userrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="userid"]').val(data.USER_ID);
          	$('[name="username"]').val(data.USER_NAME);
          	$('[name="comp_name"]').val(data.USER_COMPANY);
          	$('[name="comp_address"]').val(data.USER_ADDRESS);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get User Data');
          }
        });
      }
      function delete_user(id)
      {
      	if(confirm('Are you sure delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('Users/del_user/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	if(data.status)
	          	{
	          		$('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete User Data</div>');
              	reload_table();
	          	}
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	          	alert('Error Delete User Data');
	          }
	        });
      	}
      }
      function gen_()
      {
      	$.ajax({
        	url : "<?php echo site_url('Users/gen_user')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {                    
          	$('[name="userid"]').val(data.kode);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Generate Number');
          }
        });
      }
    </script>