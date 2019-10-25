<div id="main_dashboard">

    <?php
		$this->load->model ('Mdashboard', '', TRUE);    
        if ($jetty != array()) {
            # code...
            for ($i=0; $i < count($jetty); $i++) { 
                # code...
                $get_activity = $this->Mdashboard->get_last_activity_jetty($jetty[$i]['id']);
                $name_vessel   = "-";
                $last_activity = "-";
                $last_date     = "-";
                if ($get_activity != 0) {
                    # code...
                    $name_vessel   = $get_activity[0]->name_vessel;
                    $last_activity = $get_activity[0]->last_activity;
                    $last_date     = $get_activity[0]->date;                    
                }

                $id_vessel_jetty = ($get_activity != 0) ? $get_activity[0]->id_vessel_jetty : 0 ;
                $get_vessel_activity = $this->Mdashboard->get_vessel_activity($id_vessel_jetty);                
    ?>
                <div class="col-md-4">
                    <!-- <pre>
                    <?=print_r($get_vessel_activity);?>
                    </pre>                     -->
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-yellow">
                            <h4 class="widget-user-username">Jetty <?=$jetty[$i]['name'];?></h4>
                            <h4 class="widget-user-username">Date : <?=$last_date;?></h4>
                            <h4 class="widget-user-username">Last Vessel : <?=$name_vessel;?></h4>                            
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                            <li><a href="#">Last Activity <span class="pull-right badge bg-aqua"><?=$last_activity;?></span></a></li>
                            <li><a href="#">Grade <span class="pull-right badge bg-aqua"><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->rate : '-' ;?></span></a></li>
                            <li><a href="#">Tank No <span class="pull-right badge bg-aqua"><?=($get_vessel_activity != 0) ? $get_vessel_activity[0]->name_tank : '-' ;?></span></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    ?>
</div>

