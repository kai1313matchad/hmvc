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
        if($('[name="productcode"]').length)
        {
          dropdistrict_('N','district','DIS_ID','DIS_NAME');
          dropsubdistrict_('N','subdistrict','SUBDIS_ID','SUBDIS_NAME');
          get_prod($('[name="productid"]').val());
        }        
        populate_pic($('[name="productid"]').val());
    	});
      function wysiwig()
      {
        $('#summernote').summernote({
          placeholder: 'Product Description Here',
          height: 200
        });
        $('#summernote').summernote('fontName', 'Times New Roman');
      }
      function test_()
      {
        $.ajax({
          url : "<?php echo site_url('Products/test')?>",
          data : $('form').serialize(),
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            alert(data.name);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error Update Data');
          }
        });
      }
      function save_()
      {
        $.ajax({
          url : "<?php echo site_url('Products/save_products')?>",
          data : $('form').serialize(),
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            if(data.status)
            {
              // $('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Update Data</div>');
              var url = "<?php echo site_url('Products')?>";
              window.location = url;
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
      	url = "<?php echo site_url('Products/save_product')?>";
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
      function get_prod(id)
      {
        $.ajax({
        	url : "<?php echo site_url('Products/get_prodrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="productid"]').val(data.PROD_ID);
          	$('[name="productname"]').val(data.PROD_NAME);
            $('[name="streetaddr"]').val(data.PROD_STREETADDR);
            $('select#prodtype').val(data.PRT_ID);
            $('#prodtype').prop('disabled', true);
            $('#prodtype').selectpicker('refresh');
            $('select#province').val(data.PROV_ID);
            $('#province').prop('disabled', true);
            $('#province').selectpicker('refresh');
            $('select#district').val(data.DIS_ID);
            $('#district').prop('disabled', true);
            $('#district').selectpicker('refresh');
            $('select#subdistrict').val(data.SUBDIS_ID);
            $('#subdistrict').prop('disabled', true);
            $('#subdistrict').selectpicker('refresh');
          	$('[name="productprice"]').val(data.PROD_PRICE);
            $('[name="specialprice"]').val(data.PROD_SPCPRICE);
            $('[name="videolink"]').val(data.PROD_VIDLINK);
            $('#summernote').summernote('code',data.PROD_DESCRIPTION);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
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
            option = document.createElement('option');
            option.value = '';
            option.text = 'Choose Province';
            select.add(option);
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
            alert('Choose The Province');
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
            alert('Unknown Province');
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
      function populate_pic(id)
      {
        $('#uploaded_img').empty();
        $.ajax({
          url : "<?php echo site_url('Products/get_pic/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            for (var i = 0; i < data.length; i++)
            {
              var div = $('<div class="col-md-55"><div class="thumbnail"><div class="image view view-first"><img style="width: 100%; display: block;" src="<?php echo base_url()?>'+data[i]["PRODPIC_PATH"]+'" alt="image" /></div><div class="caption"><a class="btn btn-danger" onclick="remove('+data[i]["PRODPIC_TOKEN"]+')">X</a></div></div></div>').appendTo('#uploaded_img');
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function remove(id)
      {
        $.ajax({
          type:"post",
          data:{token:id},
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
        populate_pic($('[name="productid"]').val());
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
        populate_pic($('[name="productid"]').val());
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
        populate_pic($('[name="productid"]').val());
      });
    </script>