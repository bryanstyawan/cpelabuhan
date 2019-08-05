<?php
if ($list != 0) {
    # code...
    for ($i=0; $i < count($list); $i++) { 
        # code...
        $activity = $this->Mreport->get_report_2_activity($list[$i]->id_vessel_jetty);
?>
        <tr>
            <td><?=$list[$i]->name_jetty;?></td>
            <td><?=$list[$i]->name_vessel;?></td>
<?php
        if ($activity == 0) {
            # code...
?>
            <td>-</td>
            <td>-</td>            
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>                                                                                                                         
        </tr>
<?php            
        }
        else 
        {
            # code...
            if (count($activity) == 1) 
            {
                # code...
                $process = $this->Mreport->get_report_2_activity_proses($activity[0]->id_vessel_activity);
?>
                    <td><?=$activity[0]->name_activity;?></td>
                    <td><?=$activity[0]->name_product;?></td>
                    <td><?=$activity[0]->nominasi;?></td>
                    <td><?=$activity[0]->name_tank_number;?></td>
                    <td><?=$activity[0]->name_pump_number;?></td>
                    <td><?=$activity[0]->name_pipeline;?></td>
                    <td><?=$activity[0]->destination;?></td>
                    <td><?=$activity[0]->rate;?></td>
<?php                
                if ($process == 0) {
                    # code...
?>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>                    
                </tr>
<?php
                } else {
                    # code...
                    if (count($process) == 1) {
                        # code...
?>
                    <td><?=$process[0]->process_status;?></td>
                    <td><?=$process[0]->process_datetime;?></td>
                    <td><?=$process[0]->name_status_stop;?></td>
                    <td><?=$process[0]->remarks;?></td>                                        
                </tr>
<?php                        
                    }
                    else {
                        # code...
                            # code...
?>
                        <td><?=$process[0]->process_status;?></td>
                        <td><?=$process[0]->process_datetime;?></td>
                        <td><?=$process[0]->name_status_stop;?></td>
                        <td><?=$process[0]->remarks;?></td>                                            
                    </tr>
<?php                                                    
                            for ($i2=1; $i2 < count($process); $i2++) { 
                                # code...
?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=$process[$i2]->process_status;?></td>
                        <td><?=$process[$i2]->process_datetime;?></td>
                        <td><?=$process[$i2]->name_status_stop;?></td>
                        <td><?=$process[$i2]->remarks;?></td>                                                                                                                                                                                                                                                                     
                    </tr>
<?php                                                        
                            }                           
                    }                    
                }
                
            }
            else {
                # code...
                    $process = $this->Mreport->get_report_2_activity_proses($activity[0]->id_vessel_activity);                
?>
                    <td><?=$activity[0]->name_activity;?></td>
                    <td><?=$activity[0]->name_product;?></td>    
                    <td><?=$activity[0]->nominasi;?></td>
                    <td><?=$activity[0]->name_tank_number;?></td>
                    <td><?=$activity[0]->name_pump_number;?></td>
                    <td><?=$activity[0]->name_pipeline;?></td>
                    <td><?=$activity[0]->destination;?></td>
                    <td><?=$activity[0]->rate;?></td>
<?php                                
                    if ($process == 0) {
                        # code...
?>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>                    
                    </tr>
<?php
                    } else {
                        # code...
                        if (count($process) == 1) {
                            # code...
?>
                        <td><?=$process[0]->process_status;?></td>
                        <td><?=$process[0]->process_datetime;?></td>
                        <td><?=$process[0]->name_status_stop;?></td>
                        <td><?=$process[0]->remarks;?></td>
                    </tr>
<?php                        
                        }
                        else 
                        {
                            # code...
?>
                        <td><?=$process[0]->process_status;?></td>
                        <td><?=$process[0]->process_datetime;?></td>
                        <td><?=$process[0]->name_status_stop;?></td>
                        <td><?=$process[0]->remarks;?></td>
                    </tr>
<?php                                                    
                            for ($i2=1; $i2 < count($process); $i2++) { 
                                # code...
?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=$process[$i2]->process_status;?></td>
                        <td><?=$process[$i2]->process_datetime;?></td>
                        <td><?=$process[$i2]->name_status_stop;?></td>
                        <td><?=$process[$i2]->remarks;?></td>
                    </tr>
<?php                                                        
                            }
                        }                    
                    }
                for ($i1=1; $i1 < count($activity); $i1++) { 
                    # code...
                    $process = $this->Mreport->get_report_2_activity_proses($activity[$i1]->id_vessel_activity);                    
?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?=$activity[$i1]->name_activity;?></td>                                                
                        <td><?=$activity[$i1]->name_product;?></td>  
                        <td><?=$activity[$i1]->nominasi;?></td>
                        <td><?=$activity[$i1]->name_tank_number;?></td>
                        <td><?=$activity[$i1]->name_pump_number;?></td>
                        <td><?=$activity[$i1]->name_pipeline;?></td>
                        <td><?=$activity[$i1]->destination;?></td>
                        <td><?=$activity[$i1]->rate;?></td>
<?php                                    
                    if ($process == 0) {
                        # code...
?>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>                    
                    </tr>
<?php
                    } else {
                        # code...
                        if (count($process) == 1) {
                            # code...
?>
                        <td><?=$process[0]->process_status;?></td>
                        <td><?=$process[0]->process_datetime;?></td>
                        <td><?=$process[0]->name_status_stop;?></td>
                        <td><?=$process[0]->remarks;?></td>                    
                    </tr>
<?php                        
                        }
                        else {
                            # code...
?>
                        <td><?=$process[0]->process_status;?></td>
                        <td><?=$process[0]->process_datetime;?></td>
                        <td><?=$process[0]->name_status_stop;?></td>
                        <td><?=$process[0]->remarks;?></td>
                    </tr>
<?php                                                    
                            for ($i2=1; $i2 < count($process); $i2++) { 
                                # code...
?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=$process[$i2]->process_status;?></td>
                        <td><?=$process[$i2]->process_datetime;?></td>
                        <td><?=$process[$i2]->name_status_stop;?></td>
                        <td><?=$process[$i2]->remarks;?></td>                                                                                                                                                                                                                                             
                    </tr>
<?php                                                        
                            }
                        }                    
                    }
                }
            }
        }
    }
}
?>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>