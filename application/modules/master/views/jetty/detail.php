<?php
	if ($list != array()) {
		# code...
?>

<section id="headerdata" >
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div>
			<div class="box-body">
				<div class="row">
				<input type="hidden" id="oid_header" value="<?=$list[0]['id'];?>">				
					<div class="col-md-6">
						<div class="form-group">
							<label>Deskripsi Soal</label>
							<textarea class="form-control" id="f_name_soal" rows="3" placeholder="Deskripsi Soal" disabled="disabled"><?=$list[0]['name'];?></textarea>
						</div>
					</div>

					<div class="col-md-6">						
						<div class="form-group">
							<label>Deskripsi Pembahasan</label>
							<textarea class="form-control" id="f_desc_pembahasan_soal" rows="3" placeholder="Deskripsi Pembahasan" disabled="disabled"><?=$list[0]['desc_pembahasan'];?></textarea>
						</div>						
					</div>
				</div>

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
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
					<th>Jawaban</th>
					<th>action</th>
				</tr>
				</thead>
				<tbody>
				<?php $x=1;
					foreach($detail->result() as $row)
					{
						$color_row = "";
						if ($row->jawaban == 'true') {
							# code...
							$color_row = "background-color:#8BC34A;";
						}
						else
						{
							$color_row = "";							
						}
				?>
						<tr style="<?=$color_row;?>">
							<td><?php echo $x;?></td>
							<td><?php echo $row->name;?></td>
							<td>
								<button class="btn btn-primary btn-xs" onclick="edit('<?php echo $row->id;?>')"><i class="fa fa-edit"></i> Ubah</button>&nbsp;&nbsp;
								<?php
									if ($row->jawaban == 'false') {
										# code...
								?>
								<!-- <button class="btn btn-success btn-xs" onclick="true_answer('<?php echo $row->id;?>')"><i class="fa "></i> Jawaban Yang Benar</button>								 -->
								<?php
									}
								?>
								<button class="btn btn-danger btn-xs" onclick="del('<?php echo $row->id;?>')"><i class="fa fa-trash"></i> Hapus</button>
							</td>
						</tr>
					<?php $x++; }
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
							<label>Jawaban</label>
							<textarea class="form-control form-control-detail" id="f_name" rows="3" placeholder="Jawaban"></textarea>
						</div>
					</div>

					<div class="col-md-6">						
						<div class="form-group">
							<label>Jawaban yang benar</label>
							<br>
							<input class="minimal" id="f_jawaban" type="checkbox" style="display: block;position: absolute;width: 4%;height: 100%;">
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

<?php
	}
	else {
		# code...
?>
<section id="headerdata" >
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div>
			<div class="box-body">
				<div class="row">

					<div class="col-md-12">
						<div class="form-group">
							<h3 class="text-center">Data Tidak Ditemukan</h3>
						</div>
					</div>

				</div>

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</section>
<?php
	}
?>

<script>
$(document).ready(function(){
	$("#addData").click(function()
	{
		$(".form-control-detail").val('');
		$("#formdata").css({"display": ""})
		$("#viewdata").css({"display": "none"})
		$("#formdata > div > div > div.box-header > h3").html("Tambah Data Jawaban");		
		$("#crud").val('insert');
	})

	$("#closeData").click(function(){
		$("#formdata").css({"display": "none"})
		$("#viewdata").css({"display": ""})		
	})	

	$("#btn-trigger-controll").click(function(){
		var res_status = 0;
		var oid_header = $("#oid_header").val();
		var oid        = $("#oid").val();
		var crud       = $("#crud").val();
		var f_name     = $("#f_name").val();
		var f_jawaban  = $("#f_jawaban").is(":checked");

		var data_sender = {
			'oid'       : oid,
			'crud'      : crud,			
			'oid_header': oid_header,
			'f_name'    : f_name,
			'f_jawaban' : f_jawaban
		}

		if (f_name.length <= 0) {
			if (f_name.length <= 0) {
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					title: 'Peringatan',					
					msg: "Data Jawaban belum terisi, mohon lengkapi data tersebut"
				});				
			}
		}
		else
		{
			$.ajax({
				url :"<?php echo site_url();?>bank_data/soal/store_detail",
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
		url :"<?php echo site_url();?>bank_data/soal/get_data/"+id+"/ajax/mr_soal_detail",
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
				$("#formdata > div > div > div.box-header > h3").html("Ubah Data Soal");		
				$("#crud").val('update');
				$("#oid").val(obj.data[0]['id']);
				$("#f_name").val(obj.data[0]['name']);
				$("#f_jawaban").val(obj.data[0]['name']);												
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
					url :"<?php echo site_url();?>bank_data/soal/store/"+'delete/'+id,
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