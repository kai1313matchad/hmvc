		<script>
			$(document).ready(function(){
    		tables();
        dropdistrict_('mona_district','subdistrict_district','DIS_ID','DIS_NAME');
    	});
    	function tables()
    	{
    		table = $('#dtb-subdistrictall').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('Categories/get_subdistrictall')?>",
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
        url = "<?php echo site_url('Categories/save_subdistrict')?>";
        $.ajax({
                  url : url,
                  type: "POST",
                  data: $('#form-subdistrict').serialize(),
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

      function edit_subdistrict(id)
      {
        $.ajax({
            url : "<?php echo site_url('Categories/get_subdistricttoedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="subdistrict_id"]').val(data.SUBDIS_ID);
                $('[name="subdistrict_district"]').val(data.DIS_ID);
                $('[name="subdistrict_name"]').val(data.SUBDIS_NAME);
                $('[name="subdistrict_id"]').prop('readonly', true);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_subdistrict(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('Categories/del_subdistrict/')?>"+id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                if(data.status)
                {
                    $('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Subdistrict Data</div>');
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
        $('[name="subdistrict_id"]').prop('readonly', false);
        $('#form-subdistrict')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }

      function dropdistrict_(tb,id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('Categories/get_dropdistrict/')?>"+tb,
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
              option.text = data[i][idx] + ' '+ data[i][v];
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