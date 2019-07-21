<section id="activitydata">

</section>

<section id="viewdata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-primary" id="addData"><i class="fa fa-plus-square"></i> Tambah Data</button></div>
			</div><!-- /.box-header -->
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Jetty</th>
					<th>Vessel</th>
					<th>Date</th>
					<th>Last Activity</th>					
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php
						if ($list != 0) {
							# code...
							for ($i=0; $i < count($list); $i++) { 
								# code...
					?>
						<tr>
							<td><?php echo $i+1;?></td>
							<td><?php echo $list[$i]->name_jetty;?></td>
							<td><?php echo $list[$i]->name_vessel;?></td>
							<td><?php echo $list[$i]->date;?></td>
							<td><?php echo $list[$i]->last_activity;?></td>																												
							<td>
								<button class="btn btn-primary btn-xs" onclick="activity('<?php echo $list[$i]->id;?>')"><i class="fa fa-edit"></i> Activity</button>&nbsp;&nbsp;								
								<button class="btn btn-warning btn-xs" onclick="edit('<?php echo $list[$i]->id;?>')"><i class="fa fa-edit"></i> Ubah</button>&nbsp;&nbsp;
								<button class="btn btn-danger btn-xs" onclick="del('<?php echo $list[$i]->id;?>')"><i class="fa fa-trash"></i> Hapus</button>
							</td>
						</tr>					
					<?php
							}
						}
					?>
				</tbody>
				</table>
				
			</div><!-- /.box-body -->
			</div><!-- /.box -->
	</div>
</section>

<section id="formdata" style="display:none">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-danger" id="closeData"><i class="fa fa-close"></i></button></div>				
			</div>
			<div class="box-body">
				<div class="row">
					<input class="form-control" type="hidden" id="oid">
					<input class="form-control" type="hidden" id="crud">					
		
					<div class="col-md-6">
						<div class="form-group">
							<label>Jetty</label>
							<select class="form-control" id="f_jetty">
								<option value=""> - - - - - </option>
								<?php
									if ($jetty != array()) {
										# code...
										for ($i=0; $i < count($jetty); $i++) { 
											# code...
								?>
											<option value="<?=$jetty[$i]['id'];?>"><?=$jetty[$i]['name'];?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Vessel</label>
							<select class="form-control" id="f_vessel">
								<option value=""> - - - - - </option>								
								<?php
									if ($vessel != array()) {
										# code...
										for ($i=0; $i < count($vessel); $i++) { 
											# code...
								?>
											<option value="<?=$vessel[$i]['id'];?>"><?=$vessel[$i]['name'];?></option>
								<?php
										}
									}
								?>								
							</select>
						</div>
					</div>					

				</div>

			</div><!-- /.box-body -->
			<div class="box-footer">
				<a class="btn btn-success pull-right" id="btn-trigger-controll"><i class="fa fa-save"></i>&nbsp; Simpan</a>
			</div>
		</div><!-- /.box -->
	</div>
</section>
<script>
$(document).ready(function(){
	$("#addData").click(function()
	{
		$(".form-control").val('');
		$("#formdata").css({"display": ""})
		$("#viewdata").css({"display": "none"})
		$("#formdata > div > div > div.box-header > h3").html("Tambah Data");		
		$("#crud").val('insert');
		$("#section_file").css({"display": "none"})				
	})

	$(".closeData").click(function(){
		$("#activitydata").css({"display": "none"})				
		$("#formdata").css({"display": "none"})
		$("#viewdata").css({"display": ""})		
	})	

	$("#closeData").click(function(){
		$("#activitydata").css({"display": ""})				
		$("#formdata").css({"display": "none"})
		$("#viewdata").css({"display": ""})		
	})	

	$("#btn-trigger-controll").click(function(){
		var res_status       = 0;
		var flag_allowed     = 0;
		var oid              = $("#oid").val();
		var crud             = $("#crud").val();
		var f_id_jetty       = $("#f_jetty").val();		
		var f_id_vessel      = $("#f_vessel").val();

		var data_sender = {
			'oid'   			: oid,
			'crud'  			: crud,
			'f_id_jetty' 		: f_id_jetty,
			'f_id_vessel' 		: f_id_vessel
		}

		if (crud == 'insert') {
			flag_allowed = 1;				
		}
		else
		{
			flag_allowed = 1;
		}

		if (flag_allowed == 1) {
			$.ajax({
				url :"<?php echo site_url();?>transaction/store",
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
	})
})

function edit(id){
	$.ajax({
		url :"<?php echo site_url();?>transaction/get_data/"+id+"/ajax/tr_vessel_jetty",
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
		},
		success:function(msg){
			var obj = jQuery.parseJSON (msg);
			if (obj.status == 1)
			{
				$(".form-control").val('');
				$("#formdata").css({"display": ""})
				$("#section_file").css({"display": ""})										
				$("#viewdata").css({"display": "none"})
				$("#formdata > div > div > div.box-header > h3").html("Ubah Data");		
				$("#crud").val('update');
				$("#oid").val(obj.data[0]['id']);
				$("#f_jetty").val(obj.data[0]['id_jetty']);
				$("#f_vessel").val(obj.data[0]['id_vessel']);								
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

function activity(id)
{					
	$.ajax({
		url :"<?php echo site_url();?>transaction/vessel_activity/"+id,
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
			$("#viewdata").css({"display": "none"})			
		},
		success:function(msg){			
            $("#loadprosess").modal('hide');								
			$("#activitydata").html(msg);
		},
		error:function(jqXHR,exception)
		{
			ajax_catch(jqXHR,exception);					
		}
	})	
}


function del(id)
{					
	Lobibox.confirm({
		title   : "Konfirmasi",
		msg     : "Anda yakin akan menghapus data ini ?",
		callback: function ($this, type) {
			if (type === 'yes'){			
				$.ajax({
					url :"<?php echo site_url();?>master/pipeline/store/"+'delete/'+id,
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

function detail(id) {
	window.location.href = "<?php echo site_url();?>bank_data/soal/detail/"+id
}
</script>