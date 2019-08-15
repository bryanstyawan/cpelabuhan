<section id="viewdata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-primary" id="addData"><i class="fa fa-plus-square"></i> Add Data</button></div>
			</div><!-- /.box-header -->
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Product</th>					
					<th>Tank Number</th>
					<th>Pipeline</th>					
					<th>action</th>
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
							<td><?php echo $list[$i]->name_product;?></td>							
							<td><?php echo $list[$i]->name_tank_number;?></td>														
							<td><?php echo $list[$i]->name;?></td>
							<td>
								<button class="btn btn-primary btn-xs" onclick="edit('<?php echo $list[$i]->id;?>')"><i class="fa fa-edit"></i> Ubah</button>&nbsp;&nbsp;
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
							<label>Tank Number</label>
							<select class="form-control" id="f_tank_number">
								<option value="0"> - - - - - </option>
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
							<input type="text" class="form-control" id="f_name" placeholder="Pipeline">
						</div>
					</div>
				</div>

			</div><!-- /.box-body -->
			<div class="box-footer">
				<a class="btn btn-success pull-right" id="btn-trigger-controll"><i class="fa fa-save"></i>&nbsp; Save</a>
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
		$("#formdata > div > div > div.box-header > h3").html("Add Data");		
		$("#crud").val('insert');
		$("#section_file").css({"display": "none"})				
	})

	$("#closeData").click(function(){
		$("#formdata").css({"display": "none"})
		$("#viewdata").css({"display": ""})		
	})	

	$("#f_tank_number").change(function() {
		var val_data = $(this).val();		
		$("#f_product").val('');						
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
	})

	$("#btn-trigger-controll").click(function(){
		var res_status       = 0;
		var flag_allowed     = 0;
		var oid              = $("#oid").val();
		var crud             = $("#crud").val();
		var f_id_tank_number = $("#f_tank_number").val();		
		var f_name           = $("#f_name").val();

		var data_sender = {
			'oid'   			: oid,
			'crud'  			: crud,
			'f_id_tank_number' 	: f_id_tank_number,
			'f_name'			: f_name
		}

		if (crud == 'insert') {
			flag_allowed = 1;				
		}
		else
		{
			flag_allowed = 1;
		}

		if (f_name.length <= 0) {
			if (f_name.length <= 0) {
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					title: 'Peringatan',					
					msg: "Data Judul Buku belum terisi, mohon lengkapi data tersebut"
				});				
			}
		}
		else
		{
			if (flag_allowed == 1) {
				$.ajax({
					url :"<?php echo site_url();?>master/pipeline/store",
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

function edit(id){
	$.ajax({
		url :"<?php echo site_url();?>master/pipeline/get_data/"+id+"/ajax/mr_pipeline",
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
				$("#f_tank_number").val(obj.data[0]['id_tank_number']);
				$("#f_pump_number").val(obj.data[0]['id_pump_number']);								
				$("#f_name").val(obj.data[0]['name']);		
				console.log(obj.data);
				if (obj.data.pump_data.length != 0) 
				{
					var toAppend1 = '<option value=""> - - - </option>';					
					for (index = 0; index < obj.data.pump_data.length; index++) 
					{
						_text = "";
						if (obj.data.pump_data[index]['id'] == obj.data[0]['id_pump_number']) {
							_text = "selected";
						}

						toAppend1 += '<option value="'+obj.data.pump_data[index].id+'" '+_text+'>'+obj.data.pump_data[index].name+'</option>';					
					}
					$('#f_pump_number').append(toAppend1);					
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