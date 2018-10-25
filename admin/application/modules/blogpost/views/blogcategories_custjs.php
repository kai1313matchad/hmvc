		<script>
			$(document).ready(function(){
    		tables();
        // $('.dtp').datetimepicker({
        //   format: 'YYYY-MM-DD'
        // });
        // wysiwig();
    	});
      function wysiwig()
      {
        $('#blog_content').summernote({
          placeholder: 'Blog Content Here',
          height: 200
        });
        $('#blog_content').summernote('fontName', 'Times New Roman');
      }
    	function tables()
    	{
    		table = $('#dtb-blogcategories').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('Blogpost/get_blogcategories')?>",
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
        url = "<?php echo site_url('Blogpost/save_blogcategories')?>";
        $.ajax({
                  url : url,
                  type: "POST",
                  data:$('#form-blogcategories').serialize(),
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

      function edit_blogcategories(id)
      {
        $.ajax({
            url : "<?php echo site_url('Blogpost/get_blogcategoriesedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="blogctg_id"]').val(data.blogctg_id);
                $('[name="blogctg_name"]').val(data.blogctg_name);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_blogcategories(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('Blogpost/del_blogcategories/')?>"+id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                if(data.status)
                {
                    $('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Blog Post Data</div>');
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
        $('#form-blogcategories')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
		</script>