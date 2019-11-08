<div id="main_dashboard">

    <?php
		$this->load->model ('Mdashboard', '', TRUE);    
        if ($jetty != array()) {
            # code...
    ?>
	<div class="box">
		<div class="box-header">    
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped table-view">
                    <thead>
                        <tr>
                            <th>Jetty</th>
                            <th>Vessel</th>
                            <th>Product</th>
                            <th>Tank</th>
                            <th>Pump Number</th>
                            <th>Pipeline</th>
                            <th>QTY</th>
                            <th>Tujuan</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0; $i < count($jetty); $i++) { 
                        # code...
                        $get_activity = $this->Mdashboard->get_last_activity_jetty($jetty[$i]['id']);
                        $name_vessel   = "-";
                        $last_activity = "-";
                        $last_date     = "-";
                        $id_vessel_jetty = 0;
                        if ($get_activity != 0) {
                            # code...
                            $name_vessel   = $get_activity[0]->name_vessel;
                            $last_activity = $get_activity[0]->last_activity;
                            $last_date     = $get_activity[0]->date;                    
                            $id_vessel_jetty = $get_activity[0]->id_vessel_jetty;                            
                        }                        

                        $get_vessel_activity = $this->Mdashboard->get_vessel_activity_all($id_vessel_jetty,NULL,'DESC');
                        // $get_activity = $this->Mdashboard->get_last_activity_jetty($jetty[$i]['id']);                        
            ?>
                        <tr>
                            <td><?=$jetty[$i]['name'];?></td>
                            <td><?=$name_vessel;?></td>
                            <td><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->name_product : '-';?></td>                            
                            <td><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->name_tank_number : '-';?></td>
                            <td><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->name_pump_number : '-';?></td>
                            <td><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->name_pipeline : '-';?></td>
                            <td><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->nominasi." KL" : '-';?></td>
                            <td><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->destination : '-';?></td>                                                                                                                                            
                            <!-- <td>
                                <?php 
                                        echo "<pre>";
                                        print_r($get_vessel_activity);
                                        echo "</pre>";
                                ?>
                            </td> -->
                        </tr>
            <?php
                    }
            ?>                                    
                    </tbody>                    
                </table>
            </div>
        </div>
	</div>
    <?php
        }
    ?>
</div>

