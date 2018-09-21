		<script>
			$(document).ready(function(){
    		tables();
    	});
    	function tables()
    	{
    		table = $('#dtb-provinceall').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('Categories/get_provinceall')?>",
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
        url = "<?php echo site_url('Categories/save_province')?>";
        $.ajax({
                  url : url,
                  type: "POST",
                  data: $('#form-province').serialize(),
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

      function edit_prov(id)
      { 
        $.ajax({
            url : "<?php echo site_url('Categories/get_provincetoedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="province_id"]').val(data.PROV_ID);
                $('[name="province_name"]').val(data.PROV_NAME);
                $('[name="province_url"]').val(data.PROV_URL);
                $('[name="province_pic"]').val(data.PROV_PIC);
                $('[name="province_id"]').prop('readonly', true);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_prov(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('Categories/del_prov/')?>"+id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                if(data.status)
                {
                    $('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Province Data</div>');
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
        $('[name="province_id"]').prop('readonly', false);
        $('#form-province')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
		</script>