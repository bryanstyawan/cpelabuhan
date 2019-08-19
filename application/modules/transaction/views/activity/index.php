<section id="activity_maindata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Jetty & Vessel</h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-success closeData"><i class="fa fa-arrow-circle-o-left"></i> Main Transaction</button></div>				
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped table-view">
					<thead>
                        <tr>
                            <th>Jetty</th>
                            <th>Vessel</th>
                            <th>Date</th>
                            <th>Last Activity</th>					
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($vessel_jetty != 0) {
                                # code...
                                for ($i=0; $i < count($vessel_jetty); $i++) { 
                                    # code...
                        ?>
                            <tr>
                                <td><?php echo $vessel_jetty[$i]->name_jetty;?></td>
                                <td><?php echo $vessel_jetty[$i]->name_vessel;?></td>
                                <td><?php echo $vessel_jetty[$i]->date;?></td>
                                <td><?php echo $vessel_jetty[$i]->last_activity;?></td>
                            </tr>					
                        <?php
                                }
                            }
                        ?>
                    </tbody>
				</table>
			</div>
        </div>
    </div>
    
	<div class="col-xs-12" id="activity_viewdata">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Activity</h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-primary" id="addData"><i class="fa fa-plus-square"></i> Add Data</button></div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped table-view">
					<thead>
                        <tr>
							<th>No</th>
                            <th>Activity</th>
                            <th>Product</th>
                            <th>Nominasi (KL)</th>
                            <th>Tank Number</th>
                            <th>Pump Number</th>
                            <th>Pipeline</th>
                            <th>Destination</th>
							<th>Rate Aggrement (KL/HOUR)</th>
							<th>Audit Insert</th>
							<th>Audit Update</th>
                            <th>Action</th>					
                        </tr>
                    </thead>
                    <tbody>
					<?php
                            if ($vessel_activity != 0) {
                                # code...
                                for ($i=0; $i < count($vessel_activity); $i++) { 
                                    # code...
                        ?>
                            <tr>
								<td><?=$i+1;?></td>
								<td><?php echo $vessel_activity[$i]->name_activity;?></td>
								<td><?php echo $vessel_activity[$i]->name_product;?></td>
								<td><?php echo $vessel_activity[$i]->nominasi;?></td>
								<td><?php echo $vessel_activity[$i]->name_tank_number;?></td>
								<td><?php echo $vessel_activity[$i]->name_pump_number;?></td>
								<td><?php echo $vessel_activity[$i]->name_pipeline;?></td>
								<td><?php echo $vessel_activity[$i]->destination;?></td>
								<td><?php echo $vessel_activity[$i]->rate;?></td>
								<td>
									<label class="col-lg-12"><?php echo $vessel_activity[$i]->name_audit_insert;?></label>
									<label class="col-lg-12"><?php echo $vessel_activity[$i]->audit_time_insert;?></label>
								</td>
								<td>
									<label class="col-lg-12"><?php echo $vessel_activity[$i]->name_audit_update;?></label>
									<label class="col-lg-12"><?php echo $vessel_activity[$i]->audit_time_update;?></label>
								</td>
								<td>
									<button class="btn btn-success btn-xs col-lg-12" style="margin:5px;" onclick="activity_proses('<?php echo $vessel_activity[$i]->id;?>','<?php echo $vessel_activity[$i]->id_vessel_jetty;?>')"><i class="fa fa-edit"></i> Process</button>								
									<button class="btn btn-primary btn-xs col-lg-12"  style="margin:5px;" onclick="activity_edit('<?php echo $vessel_activity[$i]->id;?>')"><i class="fa fa-edit"></i> Edit</button>
									<button class="btn btn-danger btn-xs col-lg-12"  style="margin:5px;" onclick="activity_del('<?php echo $vessel_activity[$i]->id;?>','<?php echo $vessel_activity[$i]->id_vessel_jetty;?>')"><i class="fa fa-trash"></i> Delete</button>
								</td>
                            </tr>					
                        <?php
                                }
                            }
                        ?>						
                    </tbody>
				</table>
			</div>
        </div>
	</div>
	
	<div class="col-xs-12" id="activity_proses_viewdata" style="display:none;padding: 0px;">
	</div>	


	<div class="col-xs-12" id="activity_formdata" style="display:none">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-danger" id="closeData"><i class="fa fa-close"></i></button></div>				
			</div>
			<div class="box-body">
				<div class="row">
					<input type="hidden" id="activity_oid" value="<?=$vessel_jetty[0]->id;?>">
					<input type="hidden" id="activity_oid_vessel_activity">					
					<input type="hidden" id="activity_crud">					

                    <h3 class="col-lg-12">Activity</h3>                    
					<div class="col-md-6">
						<div class="form-group">
							<label>Activity</label>
							<select class="form-control" id="f_activity">
								<option value=""> - - - - - </option>
								<?php
									if ($activity != array()) {
										# code...
										for ($i=0; $i < count($activity); $i++) { 
											# code...
								?>
											<option value="<?=$activity[$i]['id'];?>"><?=$activity[$i]['name'];?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
					</div>
                    
					<div class="col-md-6">
						<div class="form-group">
                            <label>Nominasi (KL)</label>
                            <input class="form-control" type="text" id="f_nominasi" placeholder="Nominasi (KL)">
						</div>
                    </div>
                    
                                    
					<div class="col-md-6">
						<div class="form-group">
							<label>Destination</label>
                            <input class="form-control" type="text" id="f_destination" placeholder="Destination">
						</div>
                    </div>                    
                    
					<div class="col-md-6">
						<div class="form-group">
							<label>Rate Aggrement (KL/HOUR)</label>
                            <input class="form-control" type="text" id="f_rate" placeholder="Rate Aggrement (KL/HOUR)">
						</div>
					</div>      

					<div class="col-md-6">
						<div class="form-group">
							<label>Stop By</label>
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
					
                    <h3 class="col-lg-12">Route</h3>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tank Number</label>
							<select class="form-control" id="f_tank_number">
								<option value=""> - - - - - </option>
								<?php
									if ($tank_number != array()) {
										# code...
										for ($i=0; $i < count($tank_number); $i++) { 
											# code...
								?>
											<option value="<?=$tank_number[$i]['id'];?>"><?=$tank_number[$i]['name'];?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Product</label>
							<input class="form-control" id="f_product" disabled="disabled">
						</div>
					</div>					
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Pipeline</label>
							<select class="form-control" id="f_pipeline">
							</select>
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group">
							<label>Pump Number</label>
							<select class="form-control" id="f_pump_number">
							</select>
						</div>
					</div>					                                 

				</div>

			</div><!-- /.box-body -->
			<div class="box-footer">
				<a class="btn btn-success pull-right" id="activity_btn-trigger-controll"><i class="fa fa-save"></i>&nbsp; Simpan</a>
			</div>
		</div><!-- /.box -->
	</div>    
</section>
<script>
$(document).ready(function(){
    $("#loadprosess").modal('hide');				    
	$(".closeData").click(function(){
        $("#activity_maindata").css({"display": "none"})				
        $("#viewdata").css({"display": ""})		
	})   

    $("#closeData").click(function() {
        $("#activity_formdata").css({"display": "none"})
        $("#activity_viewdata").css({"display": ""})		        
    })

	$("#addData").click(function()
	{
		$(".form-control").val('');
		$("#activity_formdata").css({"display": ""})
		// $("#activity_viewdata").css({"display": "none"})
		$("#activity_formdata > div > div.box-header > h3").html("Add Data");		
		$("#activity_crud").val('insert');
	})

	$("#f_tank_number").change(function() {
		var val_data = $(this).val();		
		$.ajax({
			url  : "<?php echo site_url();?>master/pipeline/get_product_tank",
			type : "post",
			data : "val_data="+val_data,
			beforeSend:function(){
				$("#loadprosess").modal('show');
				$("#f_product").html('');				
			},
			success:function(msg){
				var obj = jQuery.parseJSON (msg);
				if (obj.status == 1)
				{
					$("#f_product").val(obj.data[0]['name_product']);
					$("#loadprosess").modal('hide');				
				}
				else 
				{
					$("#loadprosess").modal('hide');
				}	
			}
		})		

		$.ajax({
			url  : "<?php echo site_url();?>master/pipeline/get_pipeline",
			type : "post",
			data : "val_data="+val_data,
			beforeSend:function(){
				$("#loadprosess").modal('show');
				$("#f_pipeline").html('');				
			},
			success:function(msg){
				$("#f_pipeline").html(msg);
				setTimeout(function(){
					$("#loadprosess").modal('hide');
				}, 500);
			}
		})				
	})

	$("#f_pipeline").change(function() {
		var id_tank_number = $("#f_tank_number").val();
		var id_pipeline = $(this).val();        		
		var data_sender = {
			'id_tank_number' : id_tank_number,
			'id_pipeline' : id_pipeline
		}

		$.ajax({
			url  : "<?php echo site_url();?>master/pump_number/get_pump_number",
			type : "post",
            data:{data_sender : data_sender},
			beforeSend:function(){
				$("#loadprosess").modal('show');
				$("#f_pump_number").html('');				
			},
			success:function(msg){
				$("#f_pump_number").html(msg);
				setTimeout(function(){
					$("#loadprosess").modal('hide');
				}, 500);
			}
		})		
	})        

	$("#activity_btn-trigger-controll").click(function(){
		var res_status        = 0;
		var flag_allowed      = 0;
		var oid               = $("#activity_oid").val();
		var oid_activity	  = $("#activity_oid_vessel_activity").val();
		var crud              = $("#activity_crud").val();
		var f_id_tank_number      = $("#f_tank_number").val();		
		var f_id_pipeline     = $("#f_pipeline").val();		
		var f_id_pump_number = $("#f_pump_number").val();

		var f_id_activity     = $("#f_activity").val();
		var f_nominasi        = $("#f_nominasi").val();
		var f_destination     = $("#f_destination").val(); 				
		var f_rate            = $("#f_rate").val();


		var data_sender = {
			'oid'   			: oid,
			'oid_activity'		: oid_activity,
			'crud'  			: crud,
			'f_id_tank_number'		: f_id_tank_number,
			'f_id_pipeline' 	: f_id_pipeline,
			'f_id_pump_number'  : f_id_pump_number,
			'f_id_activity' 	: f_id_activity,
			'f_nominasi'		: f_nominasi,
			'f_destination'		: f_destination,			
			'f_rate'			: f_rate,
			'status_stop'		: $("#f_stop_by").val()			
		}

		if (crud == 'insert') {
			flag_allowed = 1;				
		}
		else
		{
			flag_allowed = 1;
		}

		$.ajax({
			url :"<?php echo site_url();?>transaction/check_activity",
			type:"post",
			data:{data_sender : data_sender},
			beforeSend:function(){
				$("#editData").modal('hide');
				$("#loadprosess").modal('show');
			},
			success:function(msg){
				var obj = jQuery.parseJSON (msg);
				if (obj.status == 1)
				{
					$("#loadprosess").modal('hide');        
					Lobibox.confirm({
						title   : "Konfirmasi",
						msg     : obj.text,
						callback: function ($this, type) {
							if (type === 'yes'){			
								if (flag_allowed == 1) 
								{
									$.ajax({
										url :"<?php echo site_url();?>transaction/store_activity",
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
						}
					})					
				}
				else
				{
					if (flag_allowed == 1) 
					{
						$.ajax({
							url :"<?php echo site_url();?>transaction/store_activity",
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
			},
			error:function(jqXHR,exception)
			{
				ajax_catch(jqXHR,exception);					
			}
		})
	})	
});

function activity_edit(id){
	$.ajax({
		url :"<?php echo site_url();?>transaction/get_data/"+id+"/ajax/tr_vessel_activity",
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
		},
		success:function(msg){
			var obj = jQuery.parseJSON (msg);
			if (obj.status == 1)
			{
				$("#activity_formdata").css({"display": ""})
				// $("#activity_viewdata").css({"display": "none"})
				$("#activity_formdata > div > div.box-header > h3").html("Edit Data");		
				$("#activity_crud").val('update');
				$("#activity_oid_vessel_activity").val(obj.data[0]['id']);
				$("#f_activity").val(obj.data[0]['id_activity']);
				$("#f_product").val(obj.data[0]['id_product']);				
				$("#f_nominasi").val(obj.data[0]['nominasi']);								
				$("#f_destination").val(obj.data[0]['destination']);
				$("#f_rate").val(obj.data[0]['rate']);						

				if (obj.data.pipeline.length != 0) 
				{
					var toAppend1 = '<option value=""> - - - </option>';					
					for (index = 0; index < obj.data.pipeline.length; index++) 
					{
						_text = "";
						if (obj.data.pipeline[index]['id'] == obj.data.pipeline_master[0]['id']) {
							_text = "selected";
						}

						toAppend1 += '<option value="'+obj.data.pipeline[index].id+'" '+_text+'>'+obj.data.pipeline[index].name+'</option>';					
					}
					$('#f_pipeline').append(toAppend1);					
				}

				if (obj.data.pump_data.length != 0) 
				{
					var toAppend1 = '<option value=""> - - - </option>';					
					for (index = 0; index < obj.data.pump_data.length; index++) 
					{
						_text = "";
						if (obj.data.pump_data[index]['id'] == obj.data.pipeline_master[0]['id_pump_number']) {
							_text = "selected";
						}

						toAppend1 += '<option value="'+obj.data.pump_data[index].id+'" '+_text+'>'+obj.data.pump_data[index].name+'</option>';					
					}
					$('#f_pump_number').append(toAppend1);					
				}								

				if (obj.data.tank_data.length != 0) 
				{
					var toAppend1 = '<option value=""> - - - </option>';					
					for (index = 0; index < obj.data.tank_data.length; index++) 
					{
						_text = "";
						if (obj.data.tank_data[index]['id'] == obj.data.pipeline_master[0]['id_tank_number']) {
							_text = "selected";
						}

						toAppend1 += '<option value="'+obj.data.tank_data[index].id+'" '+_text+'>'+obj.data.tank_data[index].name+'</option>';					
					}
					$('#f_tank_number').append(toAppend1);					
				}				

				$("#loadprosess").modal('hide');				
			}
			else
			{
				Lobibox.notify('warning',{msg: obj.text});
				setTimeout(function(){
					$("#loadprosess").modal('hide');
				}, 500);
			}						
		},
		error:function(jqXHR,exception)
		{
			ajax_catch(jqXHR,exception);					
		}
	})
}

function activity_del(id,oid)
{		
	var data_sender = {
			'oid'		: oid
		}				
	Lobibox.confirm({
		title   : "Konfirmasi",
		msg     : "Anda yakin akan menghapus data ini ?",
		callback: function ($this, type) {
			if (type === 'yes'){			
				$.ajax({
					url :"<?php echo site_url();?>transaction/store_activity/"+'delete/'+id,
					data:{data_sender : data_sender},					
					type:"post",
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
}

function activity_proses(id,oid) {
	$.ajax({
		url :"<?php echo site_url();?>transaction/activity_proses/"+id+"/"+oid,
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
		},
		success:function(msg){
			$("#activity_proses_viewdata").css({"display": ""})
			// $("#activity_viewdata").css({"display": "none"})
			$("#activity_proses_viewdata").html(msg);			
			$("#loadprosess").modal('hide');						
		},
		error:function(jqXHR,exception)
		{
			ajax_catch(jqXHR,exception);					
		}
	})	
}
</script>