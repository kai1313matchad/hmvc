<?php foreach($read_recovering as $k => $val) {?>
<tr>
    <td><?php echo $val->TITLE;?></td>
    <td><?php echo $val->DESCRIPTION;?></td>
    <td><?php echo date('d M Y H:i', strtotime($val->CREATED_AT))?></td>
    <td><?php echo date('d M Y H:i', strtotime($val->UPDATED_AT))?></td>
    <td class="text-center">
        <a class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $k?>">Hapus</a>
        <!-- Modal -->
        <div class="modal fade" id="delete-<?php echo $k?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Confirmation</h4>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url()?>/recovering/delete/<?php echo $val->ID?>" type="button" class="btn btn-primary">Ya, Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="text-center"><a class="btn btn-warning" href="<?php echo base_url()?>recovering/edit/<?php echo $val->ID?>">Ubah</a></td>
</tr>
<?php }?>
<script>
    $('#dtb-promotion').DataTable({
        info: true,
        responsive: true,
        processing: true,
        pageLength: 100,
        order: [[0, 'asc']],
    });
</script>