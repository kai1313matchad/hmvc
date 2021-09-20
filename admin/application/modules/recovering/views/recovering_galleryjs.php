    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.js" integrity="sha512-/diY7kiMCU8WBbgrhBMJjMDtrsJGPP2LQG4gaw9tHRYlQ50sJLhAQZH/MSpEPdQHcY0YXYfsosyjMArCDTa3SA==" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script>
      $(function () {
        dtbList()
      })

      function dtbList() {
        table = $('#list').DataTable({ 
          "info": false,
          "destroy": true,
          "responsive": true,
          "autoWidth": false,
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": "<?php echo site_url('Recovering/getGalleryList')?>",
            "type": "POST",                
          },
          "columnDefs": [ { 
              "targets": [ 0 ],
              "orderable": false,
            },
            {
              "className": "text-center", "targets": ['_all']
            }
          ],
        })
      }

      Dropzone.autoDiscover = false;
      var uploadImg= new Dropzone(".dropzone",{
        url: '<?= base_url() ?>Recovering/addingImages',
        maxFilesize: 2,
        method:"POST",
        acceptedFiles:"image/jpeg, image/png, image/jpg",
        paramName:"imgFile",
        dictInvalidFileType:"Type file ini tidak dizinkan",
        addRemoveLinks:true,
      })

      //Event ketika Memulai mengupload
      uploadImg.on("sending",function(a,b,c){
        a.token = Math.random();
        c.append("token",a.token);
      })

      uploadImg.on('queuecomplete', function(){
        dtbList()
      })

      //Event ketika foto dihapus
      uploadImg.on("removedfile",function(a){
        token = a.token;
        $.ajax({
          type:"POST",
          data:{token:token},
          url:"<?php echo base_url('Recovering/removeImages') ?>",
          cache:false,
          dataType: 'JSON',
          success: function(data){
            console.log(data);
            dtbList()
          },
          error: function(){
            console.log(data);
          }
        })
      })

      function removeImages(token) {
        ids = $('[name="ids"]').val()
        $.ajax({
          type:"POST",
          data:{token:token, ids:ids},
          url:"<?php echo base_url('Administrator/removeGoodsImages') ?>",
          cache:false,
          dataType: 'JSON',
          success: function(data){
            console.log(data)
            location.reload()
          },
          error: function(){
            console.log(data)
          }
        })
      }
    </script>