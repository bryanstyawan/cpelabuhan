<div class="col-xs-4">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title col-xs-6">
				<div class="box-tools pull-left"><button class="btn btn-block btn-success closeData_activity"><i class="fa fa-arrow-circle-o-left"></i> Back To Activity</button></div>													
			</h3>
			<h3 class="box-title col-xs-6 pull-right">Activity</h3>
		</div>
		<div class="box box-primary">
            <div class="box-body box-profile">
			<?php
				if ($vessel_activity != 0) {
					# code...
					$i = 0;
			?>			
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<input type="hidden" id="oid_activity" value="<?php echo $vessel_activity[0]->id;?>">
						<b>Activity</b> <a class="pull-right"><?php echo $vessel_activity[0]->name_activity;?></a>
					</li>
					<li class="list-group-item">
						<b>Product</b> <a class="pull-right"><?php echo $vessel_activity[$i]->name_product;?></a>
					</li>
					<li class="list-group-item">
						<b>Nominasi (KL)</b> <a class="pull-right"><?php echo $vessel_activity[$i]->nominasi;?></a>
					</li>
					<li class="list-group-item">
						<b>Tank Number</b> <a class="pull-right"><?php echo $vessel_activity[$i]->name_tank_number;?></a>
					</li>
					<li class="list-group-item">
						<b>Pump Number</b> <a class="pull-right"><?php echo $vessel_activity[$i]->name_pump_number;?></a>
					</li>
					<li class="list-group-item">
						<b>Pipeline</b> <a class="pull-right"><?php echo $vessel_activity[$i]->name_pipeline;?></a>
					</li>
					<li class="list-group-item">
						<b>Destination</b> <a class="pull-right"><?php echo $vessel_activity[$i]->destination;?></a>
					</li>
					<li class="list-group-item">
						<b>Rate Aggrement (KL/HOUR)</b> <a class="pull-right"><?php echo $vessel_activity[$i]->rate;?></a>
					</li>																									
				</ul>			
			<?php
				}
			?>	

            </div>

		</div>
	</div>
</div>

<div class="col-xs-8" id="viewdata_activity_process">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title col-xs-6">Activity Proses</h3>
			<h3 class="box-title col-xs-6">
				<?php
					if ($activity_process == 0) {
						# code...
				?>
					<div class="box-tools pull-right"><button class="btn btn-block btn-primary start_process"><i class="fa fa-plus-square"></i> Start</button></div>				
				<?php
					}
				?>
			</h3>			
		</div>
		<div class="box-body">
			<table class="table table-bordered table-striped table-view">
				<thead>
					<tr>
						<th>No</th>
						<th>Process</th>
						<th>Process Date</th>
						<th>Process Time</th>						
						<th>Stop By</th>
						<th>Remark</th>
						<th>Audit User</th>					
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($activity_process != 0) {
							# code...
							for ($i=0; $i < count($activity_process); $i++) { 
								# code...
								$x               = $i+1;								
								$timestamp       = strtotime($activity_process[$i]->process_datetime);
								$the_last        = (count($activity_process) == $x) ? 1 : 0;

								// $stop            = $this->Allcrud->getData('mr_status_stop',array('id'=>$activity_process[$i]['id_status_stop']))->result_array();
								// $stop_by_name    = ($stop != array()) ? $stop[0]['name'] : '' ;

								$audit_user      = $this->Allcrud->getData('mr_user',array('id'=>$activity_process[$i]->audit_user_insert))->result_array();
								$audit_user_name = ($audit_user != array()) ? $audit_user[0]['username'] : '' ;								
					?>
							<tr>
								<td><?=$i+1;?></td>
								<td><?=$activity_process[$i]->process_status;?></td>
								<td><?=date('Y-m-d',$timestamp);?></td>
								<td><?=date('H:i:s',$timestamp);?></td>
								<td><?=$activity_process[$i]->name_stop_by;?></td>
								<td><?=$activity_process[$i]->remarks;?></td>
								<td><?=$audit_user_name;?></td>
								<td>
									<?php
										if ($the_last == 1) {
											# code...
									?>
											<button class="btn btn-warning btn-xs col-lg-12" style="margin:5px;"><i class="fa fa-edit"></i> Edit</button>									
									<?php
											if ($activity_process[$i]->process_status == 'start') {
												# code...
									?>
												<button class="btn btn-danger btn-xs col-lg-12 stop_process" style="margin:5px;"><i class="fa fa-trashas"></i> Stop</button>									
									<?php
											} 
											else 
											{
												# code...
									?>
												<button class="btn btn-success btn-xs col-lg-12 start_process" style="margin:5px;"><i class="fa fa-trashas"></i> Start</button>									
									<?php												
											}
											
										}
									?>
								</td>
							</tr>
					<?php
							}
						}
					?>
					<!-- 
					<tr>
						<td>1</td>
						<td>Start</td>
						<td>2019-07-26</td>
						<td>23:00</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>1</td>
						<td>Stop</td>
						<td>2019-07-27</td>
						<td>9:00</td>
						<td>Shore</td>
						<td>STOP SEMENTARA KARENA CUACA BURUK</td>
						<td></td>
						<td>							
						</td>
					</tr>					 -->
				</tbody>
			</table>
		</div>
	</div>	
</div>

<div class="example-modal">
    <div class="modal modal-success fade" id="remarks_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="box-content">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Reason Stop</h4>
                    </div>
					<div class="modal-body" style="background-color: #fff!important;">
						<label style="color: #000;font-weight: 400;font-size: 19px;">Remarks</label>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-star"></i></span>
								<textarea class="form-control" id="f_remarks" name="f_remarks"></textarea>
							</div>
						</div>
						
						<label style="color: #000;font-weight: 400;font-size: 19px;display:none"">Stop By</label>
						<div class="form-group" style="display:none">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-star"></i></span>
								<select class="form-control" id="f_stop_by">
									<option value="">- - - Choose - - -</option>
									<?php
										if ($stop_by != array()) {
											# code...
											for ($i=0; $i < count($stop_by); $i++) { 
												# code...
									?>
												<option value="<?=$stop_by[$i]['id'];?>"><?=$stop_by[$i]['name'];?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>						
                    </div>
                    <div class="modal-footer" style="background-color: #fff!important;border-top-color: #d2d6de;">
						<a href="#" class="btn btn-danger" data-dismiss="modal">Exit</a>
						<a href="#" class="btn btn-success btn_add_stop_process">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$(".closeData_activity").click(function(){
		$("#activity_proses_viewdata").css({"display": "none"})
		$("#activity_viewdata").css({"display": ""})
	})	

	$(".stop_process").click(function() 
	{
		$("#loadprosess").modal('show');
		$("#remarks_modal").modal('show');
		$("#loadprosess").modal('hide');				
	})

	$(".start_process").click(function()
	{
		var data_sender = {
			'oid'   			: $('#oid_activity').val(),
			'crud'  			: 'insert',
			'process_status'	: 'start',
			'status_stop'		: '',
			'remarks'			: ''
		}

		Lobibox.confirm({
			title   : "Confirmation",
			msg     : "Start this process ?",
			callback: function ($this, type) {
				if (type === 'yes'){			
					$.ajax({
						url :"<?php echo site_url();?>transaction/process_activity_store/",
						type:"post",
						data:{data_sender : data_sender},					
						beforeSend:function(){
							$("#editData").modal('hide');
							$("#loadprosess").modal('show');
						},
						success:function(msg){
							var obj = jQuery.parseJSON (msg);
							ajax_status(obj);
						},
						error:function(jqXHR,exception)
						{
							ajax_catch(jqXHR,exception);					
						}
					})
				}
			}
		})		

	})

	$(".btn_add_stop_process").click(function()
	{
		var data_sender = {
			'oid'   			: $('#oid_activity').val(),
			'crud'  			: 'insert',
			'process_status'	: 'stop',
			'status_stop'		: $("#f_stop_by").val(),
			'remarks'			: $("#f_remarks").val()
		}

		Lobibox.confirm({
			title   : "Confirmation",
			msg     : "Start this process ?",
			callback: function ($this, type) {
				if (type === 'yes'){			
					$.ajax({
						url :"<?php echo site_url();?>transaction/process_activity_store/",
						type:"post",
						data:{data_sender : data_sender},					
						beforeSend:function(){
							$("#editData").modal('hide');
							$("#loadprosess").modal('show');
						},
						success:function(msg){
							var obj = jQuery.parseJSON (msg);
							ajax_status(obj);
						},
						error:function(jqXHR,exception)
						{
							ajax_catch(jqXHR,exception);					
						}
					})
				}
			}
		})		

	})		
});
</script>
