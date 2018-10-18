		<script>
			$(document).ready(function(){
    		tables();
    	});
    	function tables()
    	{
    		table = $('#dtb-billboardall').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('categories/get_billboardall')?>",
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
        url = "<?php echo site_url('categories/save_type')?>";
        $.ajax({
                  url : url,
                  type: "POST",
                  data: $('#form-billboardtype').serialize(),
                  dataType: "JSON",
                  success: function(data)
                  {
                    if(data.status)
                    {
                      alert('Data Berhasil Disimpan !');
                    } else {
                      alert(data['error_string']);
                    }
                    reload_table();
                    resetbtn();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert('Error Adding / Update User Data');
                  }
                });
      }

      function edit_type(id)
      {
        $.ajax({
            url : "<?php echo site_url('categories/get_bbtypetoedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="bbtype_id"]').val(data.PRT_ID);
                $('[name="bbtype_name"]').val(data.PRT_NAME);
                $('[name="bbtype_info"]').val(data.PRT_INFO);
                $('[name="bbtype_id"]').prop('readonly', true);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_type(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('categories/del_type/')?>"+id,
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

      function resetbtn()
      {
        $('[name="form_status"]').val('1');
        $('[name="bbtype_id"]').prop('readonly', false);
        $('#form-billboardtype')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
		</script>