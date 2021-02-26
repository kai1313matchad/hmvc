<?php foreach($read_promotion as $k => $val) {?>
<tr>
    <td><?php echo $val->TITLE?></td>
    <td><?php echo date('d M Y', strtotime($val->START_DATE))?></td>
    <td><?php echo date('d M Y', strtotime($val->END_DATE))?></td>
    <td width="60" class="text-center"><a class="btn btn-danger">Hapus</a></td>
    <td width="60" class="text-center"><a class="btn btn-warning" href="<?php echo base_url()?>promotions/edit/<?php echo $val->ID?>">Ubah</a></td>
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