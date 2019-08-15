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
    ?>
                <div class="col-md-4">
                    <!-- <pre>
                    <?=print_r($get_activity);?>
                    </pre>                     -->
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-yellow">
                            <h3 class="widget-user-username">Jetty <?=$jetty[$i]['name'];?></h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                            <li><a href="#">Last Vessel <span class="pull-right badge bg-blue"><?=$name_vessel;?></span></a></li>
                            <li><a href="#">Last Activity <span class="pull-right badge bg-aqua"><?=$last_activity;?></span></a></li>
                            <li><a href="#">Date <span class="pull-right badge bg-green"><?=$last_date;?></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    ?>
</div>

