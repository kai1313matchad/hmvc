		<script>
			$(document).ready(function(){
    		tables();
    	});
    	function tables()
    	{
    		table = $('#dtb-billboardtype').DataTable({
    		"info": false,
				"responsive": true,
        // "processing": true,
        // "serverSide": true,
        // "order": [],
        // "ajax": {
        // 	"url": "<?php echo site_url('Banners/get_mainbannerall')?>",
        //   "type": "POST",
        //   },
      	"columnDefs": [{"className": "text-center", "targets": ['_all']}],
    		});
    	}
		</script>