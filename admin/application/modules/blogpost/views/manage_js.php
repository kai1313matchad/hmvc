		<script>
			$(document).ready(function(){
    		tables();
        $('.dtp').datetimepicker({
          format: 'YYYY-MM-DD'
        });
        wysiwig();
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
    		table = $('#dtb-blogpost').DataTable({
                        "info": false,
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                        "url": "<?php echo site_url('Blogpost/get_blogpost')?>",
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
        // var pict = $('[name="blog_picture"]').val();
        var fullPath = document.getElementById('blog_picture').value;
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            $('[name="picture_name"]').val(filename);
        }
        
        url = "<?php echo site_url('Blogpost/save_blogpost')?>";
        var fd = new FormData();
        var file_data = $('#blog_picture').prop('files')[0];
        fd.append("file", file_data);
        var other_data = $('#form-blogpost').serializeArray();
        $.each(other_data,function(key,input)
        {
            fd.append(input.name,input.value);
        });
        $.ajax({
                  url : url,
                  type: "POST",
                  // data: $('#form-blogpost').serialize(),
                  contentType: false,
                  processData: false,
                  data:fd,
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

      function edit_blogpost(id)
      {
        $.ajax({
            url : "<?php echo site_url('Blogpost/get_blogpostedit/')?>"+id,
            type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="form_status"]').val("2");
                $('[name="blog_id"]').val(data.blog_id);
                $('[name="blog_title"]').val(data.blog_title);
                $('[name="blog_date"]').val(data.blog_date);
                $('[name="blog_content"]').val(data.blog_content);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error Edit Data');
              }
        })
      }

      function delete_blogpost(id)
      {
        if(confirm('Are you sure delete this data?'))
        {  
            $.ajax({
              url : "<?php echo site_url('Blogpost/del_blogpost/')?>"+id,
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
        // $('[name="bbtype_id"]').prop('readonly', false);
        $('#form-blogpost')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
		</script>