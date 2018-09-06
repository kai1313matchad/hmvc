<script>
    $(document).ready(function(){  
        $('#subdistrict_district').selectpicker({});    
        tables();
        dropdistrict_('subdistrict_district');  
    });

function tables()
{
    table = $('#dtb-subdistrict').DataTable({
    "info": false,
    "responsive": true,
    "columnDefs": [{"className": "text-center", "targets": ['_all']}],
    });
}

function dropdistrict_(id)
{   
    $('#'+id).empty();
    $.ajax({
      url : "<?php echo site_url('Categories/get_dropdistrict')?>",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {   
        var select = document.getElementById(id);
        var option;
        for (var i = 0; i < data.length; i++)
        {
          option = document.createElement('option');
          option.value = data[i]['DIS_ID'];
          option.text = data[i]['DIS_NAME'];
          select.add(option);
        }
        $('#'+id).selectpicker({});
        $('#'+id).selectpicker('refresh');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get district data');
      }
    });
}
</script>