<?php
if ($list != 0) {
    # code...
    for ($i=0; $i < count($list); $i++) { 
        # code...
?>
        <tr>
            <td><?=$list[$i]->name_product;?></td>
            <td><?=$list[$i]->name_tank_number;?></td>
            <td><?=$list[$i]->name_pump_number;?></td>
            <td><?=$list[$i]->name_pipeline;?></td>            
        </tr>
<?php
    }
}
?>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>