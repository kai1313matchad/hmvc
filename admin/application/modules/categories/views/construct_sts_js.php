		<script>
			$(document).ready(function(){
    		tables();
    	});
    	function tables()
    	{
    		table = $('#dtb-constructall').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('Categories/get_constructall')?>",
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
        url = "<?php echo site_url('Categories/save_construct')?>";
        $.ajax({
                  url : url,
                  type: "POST",
                  data: $('#form-construct_sts').serialize(),
                  dataType: "JSON",
                  success: function(data)
                  {
                    alert('Data Berhasil Disimpan !');
                    reload_table();
                    resetbtn();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert('Error Adding / Update User Data');
                  }
                });
      }

      function edit_construct(id)
      {
        $.ajax({
            url : "<?php echo site_url('Categories/get_constructtoedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="construct_id"]').val(data.CONS_ID);
                $('[name="construct_name"]').val(data.CONS_NAME);
                $('[name="construct_status"]').val(data.CONS_INFO);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_construct(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('Categories/del_construct/')?>"+id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                if(data.status)
                {
                    $('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Construct Sts Data</div>');
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
        $('#form-construct_sts')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
		</script>