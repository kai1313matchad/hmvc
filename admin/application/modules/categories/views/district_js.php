		<script>
			$(document).ready(function(){
    		tables();
        dropprov_('mona_province','district_province','PROV_ID','PROV_NAME');
    	});
    	function tables()
    	{
    		table = $('#dtb-districtall').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('Categories/get_districtall')?>",
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
        url = "<?php echo site_url('Categories/save_district')?>";
        $.ajax({
                  url : url,
                  type: "POST",
                  data: $('#form-district').serialize(),
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

      function edit_district(id)
      {
        $.ajax({
            url : "<?php echo site_url('Categories/get_districttoedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="district_id"]').val(data.DIS_ID);
                $('[name="district_name"]').val(data.DIS_NAME);
                $('[name="district_type"]').val(data.DIS_TYPEID);
                $('[name="district_id"]').prop('readonly', true);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_district(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('Categories/del_district/')?>"+id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                if(data.status)
                {
                    $('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete District Data</div>');
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
        $('[name="district_id"]').prop('readonly', false);
        $('#form-district')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }

      function dropprov_(tb,id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('Categories/get_dropprov/')?>"+tb,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx];
              option.text = data[i][idx] + ' ' + data[i][v];
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