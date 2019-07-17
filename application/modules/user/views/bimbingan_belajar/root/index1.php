<?php
if($verify_user_paid->result_array() == array())
{
?>
<style>
	@import url(https://fonts.googleapis.com/css?family=Lato:400,700);

	body {
	background: #F2F2F2;
	padding: 0;
	maring: 0;
	}

	#price {
	text-align: center;
	}

	.plan {
	display: inline-block;
	margin: 10px 1%;
	font-family: 'Lato', Arial, sans-serif;
	}

	.plan-inner {
	background: #fff;
	margin: 0 auto;
	min-width: 280px;
	max-width: 100%;
	position:relative;
	}

	.entry-title {
	background: #53CFE9;
	height: 140px;
	position: relative;
	text-align: center;
	color: #fff;
	margin-bottom: 30px;
	}

	.entry-title>h3 {
	background: #20BADA;
	font-size: 20px;
	padding: 5px 0;
	text-transform: uppercase;
	font-weight: 700;
	margin: 0;
	}

	.entry-title .price {
	position: absolute;
	bottom: -25px;
	background: #20BADA;
	height: 95px;
	width: 95px;
	margin: 0 auto;
	left: 0;
	right: 0;
	overflow: hidden;
	border-radius: 50px;
	border: 5px solid #fff;
	line-height: 80px;
	font-size: 28px;
	font-weight: 700;
	}

	.price span {
	position: absolute;
	font-size: 9px;
	bottom: -10px;
	left: 30px;
	font-weight: 400;
	}

	.entry-content {
	color: #323232;
	}

	.entry-content ul {
	margin: 0;
	padding: 0;
	list-style: none;
	text-align: center;
	}

	.entry-content li {
	border-bottom: 1px solid #E5E5E5;
	padding: 10px 0;
	}

	.entry-content li:last-child {
	border: none;
	}

	.btn {
	padding: 3em 0;
	text-align: center;
	}

	.btn a {
	background: #323232;
	padding: 10px 30px;
	color: #fff;
	text-transform: uppercase;
	font-weight: 700;
	text-decoration: none;
	padding-left: 0px;
    padding-right: 0px;
    margin-bottom: 6px;	
	}
	.hot {
		position: absolute;
		top: -7px;
		background: #F80;
		color: #fff;
		text-transform: uppercase;
		z-index: 2;
		padding: 2px 5px;
		font-size: 9px;
		border-radius: 2px;
		right: 10px;
		font-weight: 700;
	}
	.basic .entry-title {
	background: #75DDD9;
	}

	.basic .entry-title > h3 {
	background: #44CBC6;
	}

	.basic .price {
	background: #44CBC6;
	}

	.standard .entry-title {
	background: #4484c1;
	}

	.standard .entry-title > h3 {
	background: #3772aa;
	}

	.standard .price {
	background: #3772aa;
	}

	.ultimite .entry-title > h3 {
	background: #DD4B5E;
	}

	.ultimite .entry-title {
	background: #F75C70;
	}

	.ultimite .price {
	background: #DD4B5E;
	}
</style>
<div id="price">
    <!--price tab-->
	<input type="hidden" id="oid">
	<div class="plan">
		<div class="plan-inner">
			<div class="entry-title">
				<h3>Free</h3>
				<div class="price">Free<span></span>
				</div>
			</div>
			<div class="entry-content">
				<ul>
				<li><strong>Bimbingan Belajar</strong> - 3 Materi</li>
				<li><strong>-</strong></li>
				<li><strong>Try Out</strong> - Trial</li>
				</ul>
			</div>
			<div class="btn">
				<a class="col-xs-12" href="<?=base_url();?>user/bimbingan_belajar_trial">Coba Sekarang</a>
                <a class="col-xs-12" href="#" style="cursor: default;background: transparent;">Cara Beli</a>								
			</div>
		</div>
	</div>
    <!-- end of price tab-->
    <!--price tab-->
    <div class="plan basic">
        <div class="plan-inner">
            <div class="entry-title">
                <h3>Paket A</h3>
                <div class="price">A<span></span>
                </div>
            </div>
            <div class="entry-content">
                <ul>
                    <li><strong>Bimbingan Belajar</strong></li>
                    <li><strong>Raport</strong></li>
                    <li><strong>Try Out</strong> -  Trial</li>
                </ul>
            </div>
            <div class="btn">
                <a class="col-xs-12" href="#" onclick="bimbel_package('1')">Beli Sekarang</a>
                <a class="col-xs-12" href="#" onclick="cara_beli()">Cara Beli</a>				
            </div>
        </div>
    </div>

    <div class="plan ultimite">
        <div class="plan-inner">
            <div class="hot">Hot</div>        
            <div class="entry-title">
                <h3>Paket B</h3>
                <div class="price">B<span></span>
                </div>
            </div>
            <div class="entry-content">
                <ul>
                    <li><strong>Bimbingan Belajar</strong></li>
                    <li><strong>Raport</strong></li>
                    <li><strong>Try Out</strong></li>
                </ul>
            </div>
            <div class="btn">
                <a class="col-xs-12" href="#" onclick="bimbel_package('2')">Beli Sekarang</a>
                <a class="col-xs-12" href="#" onclick="cara_beli()">Cara Beli</a>				
            </div>
        </div>
    </div>    

</div>

<div class="example-modal">
	<div class="modal modal-success fade" id="newData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="box-content">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#00a7d0!important;border-color:#00a7d0!important;">
						<h4 class="modal-title">Masukan Token</h4>
						<button type="button" class="close hot" data-dismiss="modal" aria-label="Close" style="color: #795548;font-size: 39px;top: 0px;margin-top: 0px;">
							<span aria-hidden="true">&times;</span>
						</button>						
					</div>
					<div class="modal-body" style="background-color: #fff!important;">
						<label style="color: #000;font-weight: 400;font-size: 19px;">Token</label>
						<div class="form-group">
							<div class="input-group col-lg-12">
								<input type="text" id="token" name="token" class="form-control" placeholder="Token" maxlength="6">
							</div>
							<div class="input-group col-lg-12">
								<div class="btn">
									<a href="#" id="btn-verify">Verifikasi Token</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
else {
	# code...
?>
<section id="viewdata">
	<?=$this->load->view('templates/sidebar/main');?>
	<div class="col-xs-10">
		<div class="box">
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Materi</th>
					<th>Sub Materi</th>					
					<th>Pre Test</th>
					<th>Video Materi</th>					
					<th>Quiz</th>
					<th>Analisis</th>					
				</tr>
				</thead>
				<tbody>
				<?php 
					if ($list != array()) {
						# code...
						for ($i=0; $i < count($list); $i++) { 
							# code...
							// $child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[$i]['id']))->result_array();
							$child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[$i]['id']))->result_array();														
							for ($ii=0; $ii < count($child); $ii++) { 
								# code...
				?>
								<tr>
									<td></td>
									<td><?php echo $list[$i]['name'];?></td>									
									<td><?php echo $child[$ii]['name'];?></td>
				<?php
									$type = $this->Allcrud->listData('lt_tipe_bimbingan_belajar')->result_array();
									for ($j=0; $j < count($type); $j++) { 
										# code...
										$text    = "";
										$display = "";
										if ($type[$j]['id'] == 1) {
											# code...
											$text = "Mulai";
										}
										elseif ($type[$j]['id'] == 2) {
											# code...
											$text = "Lihat video materi";											
										}
										elseif ($type[$j]['id'] == 3) {
											# code...
											$text = "Mulai";											
										}
										elseif ($type[$j]['id'] == 4) {
											# code...
											$text = "Lihat analisis";											
										}

										$check_data  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>$type[$j]['id'],'id_materi'=>$child[$ii]['id']))->result_array();										
										if ($check_data == array()) {
											# code...
											$display = "display:none;";
											if ($type[$j]['id'] == 1) {
												# code...
												if ($ii == 0) {
													# code...
													$display = "";
												}
												else {
													# code...
													$check_data_next  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>3,'id_materi'=>$child[$ii-1]['id']))->result_array();													
													if ($check_data_next != array()) {
														# code...
														if ($check_data_next[0]['status'] == 1) {
															# code...
															$display = "";															
														}
													}
												}
											}																							
										}
				?>
										<td><a class="btn btn-primary" style="<?=$display;?>" href="<?=base_url();?>user/bimbingan_belajar/<?php echo $type[$j]['name'];?>/<?php echo $type[$j]['id'];?>/<?php echo $child[$ii]['id'];?>"><i class="fa fa-hourglass-start"></i> <?=$text;?></a></td>
				<?php
									}
				?>		
								</tr>
				<?php								
							}							
						}
					}
				?>
				</tbody>
				</table>
				
			</div><!-- /.box-body -->
			</div><!-- /.box -->
	</div>
</section>
<?php
}
?>

<script>
function bimbel_package(arg) {
	$("#newData").modal('show');  
	if (arg == 1) {
		$(".modal-title").html("Masukan Token Paket A");
	}
	else if(arg == 2)
	{
		$(".modal-title").html("Masukan Token Paket B");		
	}
	$("#oid").val(arg);
}

$(document).ready(function(){
	$("#btn-verify").click(function() {
		var oid   = $("#oid").val();
		var token = $("#token").val();
		data_sender = {
			'oid'  : oid,
			'token': token,
			'type' : 'bimbel'
		}

		$.ajax({
			url :"<?php echo site_url();?>user/verify_token",
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
	})
});
</script>