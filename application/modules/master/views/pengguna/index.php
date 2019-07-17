<!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> -->
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
					<th>Nama</th>
					<th>Username</th>
					<th>Level Pengguna</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $x=1;
				if ($list != array()) {
					# code...
					for ($i=0; $i < count($list); $i++) { 
						# code...
				?>
					<tr>
						<td><?=$i+1;?></td>
						<td><?=$list[$i]['name'];?></td>
						<td><?=$list[$i]['username'];?></td>
						<td></td>
						<td></td>	
						<td>
								<button class="btn btn-primary btn-xs" onclick="edit('<?php echo $list[$i]['id'];?>')"><i class="fa fa-edit"></i> Ubah</button>&nbsp;&nbsp;&nbsp;
								<button class="btn btn-danger btn-xs" onclick="del('<?php echo $list[$i]['id'];?>')"><i class="fa fa-trash"></i> Hapus</button>
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
							<label>Username</label>
							<input type="text" class="form-control" id="f_username" placeholder="Username">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" id="f_name" placeholder="Nama">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" id="f_password" placeholder="Password">
						</div>
					</div>										

					<div class="col-md-6">
						<div class="form-group">
							<label>Level Pengguna</label>
							<select class="form-control" id="f_role">
								<option value="">- - - - - </option>							
							<?php
								if ($role_user->result_array() != array()) {
									# code...
									for ($i=0; $i < count($role_user->result_array()); $i++) { 
										# code...
							?>
										<option value="<?=$role_user->result_array()[$i]['id_role'];?>"><?=$role_user->result_array()[$i]['nama_role'];?></option>
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
		$("#formdata > div > div > div.box-header > h3").html("Tambah Data Pengguna");		
		$("#crud").val('insert');
	})

	$("#closeData").click(function(){
		$("#formdata").css({"display": "none"})
		$("#viewdata").css({"display": ""})		
	})	

	$("#btn-trigger-controll").click(function(){
		var res_status = 0;
		var oid        = $("#oid").val();
		var crud       = $("#crud").val();
		var f_username = $("#f_username").val();
		var f_name     = $("#f_name").val();
		var f_password = $("#f_password").val();
		var f_role     = $("#f_role").val();

		var data_sender = {
			'oid'       : oid,
			'crud'      : crud,
			'f_username': f_username,
			'f_name'    : f_name,
			'f_password': f_password,
			'f_role'    : f_role
		}

		if (crud == 'insert') {
			if (f_username.length <= 0 || f_name.length <= 0 || f_password.length <= 0 || f_role.length <= 0) {
				res_status = 0;
				if (f_username.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Username belum terisi, mohon lengkapi data tersebut"
					});				
				} else if(f_name.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Nama belum terisi, mohon lengkapi data tersebut"
					});								
				} else if(f_password.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Password belum terisi, mohon lengkapi data tersebut"
					});								
				} else if(f_role.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Level Pengguna belum terisi, mohon lengkapi data tersebut"
					});								
				}
			}
			else
			{
				res_status = 1;
			}			
		}
		else if(crud == 'update')
		{
			if (f_username.length <= 0 || f_name.length <= 0 || f_role.length <= 0) {
				res_status = 0;
				if (f_username.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Username belum terisi, mohon lengkapi data tersebut"
					});				
				} else if(f_name.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Nama belum terisi, mohon lengkapi data tersebut"
					});								
				} else if(f_role.length <= 0) {
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						title: 'Peringatan',					
						msg: "Data Level Pengguna belum terisi, mohon lengkapi data tersebut"
					});								
				}
			}
			else
			{
				res_status = 1;
			}			
		}

		if(res_status == 1)
		{
			$.ajax({
				url :"<?php echo site_url();?>bank_data/user/store",
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
		url :"<?php echo site_url();?>bank_data/user/get_data/"+id+"/ajax/mr_user",
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
				$("#viewdata").css({"display": "none"})
				$("#formdata > div > div > div.box-header > h3").html("Ubah Data Pengguna");		
				$("#crud").val('update');
				$("#oid").val(obj.data[0]['id']);
				$("#f_username").val(obj.data[0]['username']);								
				$("#f_name").val(obj.data[0]['name']);				
				$("#f_role").val(obj.data[0]['id_role']);								
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
					url :"<?php echo site_url();?>bank_data/user/store/"+'delete/'+id,
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
</script>