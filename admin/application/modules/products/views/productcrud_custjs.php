		<script>
    	$(document).ready(function(){
        wysiwig();
        $('#province').selectpicker({});
        $('#district').selectpicker({});
        $('#subdistrict').selectpicker({});
        dropsize_('prodsize','PRSZ_ID','PRSZ_NAME');
        dropcons_('prodcons','CONS_ID','CONS_NAME');
        dropprov_('mona_province','province','PROV_ID','PROV_NAME');
        dropprodtype('mona_prodtype','prodtype','PRT_ID','PRT_NAME');
        $('#province').change(function()
        {
          dropdistrict_($('#province option:selected').val(),'district','DIS_ID','DIS_NAME');
        });
        $('#district').change(function()
        {
          dropsubdistrict_($('#district option:selected').val(),'subdistrict','SUBDIS_ID','SUBDIS_NAME');
        });
    	});
      function wysiwig()
      {
        $('#summernote').summernote({
          placeholder: 'Product Description Here',
          height: 200
        });
        $('#summernote').summernote('fontName', 'Times New Roman');
      }
      function save_()
      {
        $.ajax({
          url : "<?php echo site_url('Products/test')?>",
          data : $('#form-product').serialize(),
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            if(data.status)
            {
              $('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Update Data</div>');
            }
            else
            {
              $('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Failed Update Data</div>');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Update Data');
          }
        });
      }
      function save()
      {
        var fd = new FormData();
        var file_data = $('#productpic').prop('files')[0];
        fd.append("file", file_data);
        var other_data = $('#form-product').serializeArray();
        $.each(other_data,function(key,input){fd.append(input.name,input.value);});
      	url = "<?php echo site_url('admin/product/Product_/save_product')?>";
      	$.ajax({
					url : url,
          type: "POST",
          cache: false,
          contentType: false,
          processData: false,
          data: fd,
          dataType: "JSON",
          success: function(data)
          {
          	if(data.status)
            {
            	$('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Adding / Update Product</div>');
              reload_table();
              resetbtn();
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update Product</div>');
              if(data.error_str_sts)
              {
                $('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>'+data.error_str+'</div>');
              }
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
      	$('#form-product')[0].reset();
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
      function edit_prod(id)
      {
        $('#form-product')[0].reset();
      	$('[name="form_status"]').val('2');
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
        	url : "<?php echo site_url('admin/product/Product_/get_prodrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="productid"]').val(data.PROD_ID);
          	$('[name="productname"]').val(data.PROD_NAME);
          	$('[name="productprice"]').val(data.PROD_PRICE);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
      }
      function delete_prod(id)
      {
      	if(confirm('Are you sure delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('admin/product/Product_/del_product/')?>"+id,
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
      function dropsize_(id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('Products/get_dropsize')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
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
      function dropcons_(id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('Products/get_dropcons')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
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
      function dropprov_(tb,id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('Products/get_dropprov/')?>"+tb,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
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
      function dropdistrict_(pk,id,idx,v)
      {
        $('#'+id).empty();
        $.ajax({
          url : "<?php echo site_url('Products/get_dropdistrict/')?>"+pk,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
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
      function dropsubdistrict_(pk,id,idx,v)
      {
        $('#'+id).empty();
        $.ajax({
          url : "<?php echo site_url('Products/get_dropsubdistrict/')?>"+pk,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
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
      function dropprodtype(tb,id,idx,v)
      {
        $.ajax({
          url : "<?php echo site_url('Products/get_dropprodtype/')?>"+tb,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById(id);
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i][idx]
              option.text = data[i][v];
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
    <script type="text/javascript">
      Dropzone.autoDiscover = false;

      var foto_upload= new Dropzone(".dropzone",{
      url: "<?php echo base_url('Products/upload_pic') ?>",
      maxFilesize: 2,
      method:"post",
      acceptedFiles:"image/*",
      paramName:"file",
      dictInvalidFileType:"File Type Not Allowed",
      addRemoveLinks:true,
      });

      //Event ketika Memulai mengupload
      foto_upload.on("sending",function(a,b,c){
        a.token=Math.random();        
        c.append("token_code",a.token); //Menmpersiapkan token untuk masing masing foto
      });
      foto_upload.on("sending",function(a,b,c){
        a.picid=$('[name="productid"]').val();        
        c.append("id",a.picid); //Menmpersiapkan token untuk masing masing foto
      });

      //Event ketika selesai upload
      foto_upload.on('queuecomplete', function(progress){
        alert('selesai');
      })

      //Event ketika foto dihapus
      foto_upload.on("removedfile",function(a){
        var token=a.token;
        $.ajax({
          type:"post",
          data:{token:token},
          url:"<?php echo base_url('Products/remove_pic') ?>",
          cache:false,
          dataType: 'json',
          success: function(){
            console.log("Foto terhapus");
          },
          error: function(){
            console.log("Error");
          }
        });
      });
    </script>