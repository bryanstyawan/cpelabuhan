<style>
.box-header-try-out > div > div
{
	border: 1px solid #f4f4f4;
}

.box-header-try-out > div > div > h3
{
	text-align: center;
}

.box-header-try-out > div > div > .box-title
{
    padding: 8px;
    text-align: center;
}

#p_soal
{
	font-size: 22px;
    text-align: justify;
}

#p_nomor
{
	font-size: 22px;
}

.cls_choice
{
	padding-left: 0px;font-size:22px;text-align: justify;
}

.cls_choice_btn > a
{
	font-size:20px;
}
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		.box-header-try-out > div > div > h3
		{
			font-size: 23px;
		}

		.hidden-border-custom
		{
			border:none!important;
		}		

		#p_soal
		{
			font-size:16px;
		}

		#p_nomor
		{
			font-size:16px;
		}
		
		#container-soal
		{
			padding:0px;
		}

		.cls_choice
		{
			padding-left: 0px;font-size:16px;text-align: justify;
		}

		.cls_choice_btn > a
		{
			font-size:16px;
		}		

		#btn-step1
		{
			margin-top:10px;
		}

		#btn-step2
		{
			margin-top:10px;
		}

	} 

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		.box-header-try-out > div > div > h3
		{
		}		
	} 

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		.box-header-try-out > div > div > h3
		{
			font-size: 13px;
		}		
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		.box-header-try-out > div > div > h3
		{
		}		
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		.box-header-try-out > div > div > h3
		{
		}		
	}	
</style>
<?php
if ($list_soal != array()) {
	# code...
?>
<section id="headerdata" class="container">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-header-try-out">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<h3>Judul</h3>
						</div>			
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<h3>Waktu</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs">
							<h3>Jumlah Soal</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs">
							<h3>Sudah Dijawab</h3>
						</div>				
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs">
							<h3>Belum Dijawab</h3>
						</div>				
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 hidden-xs">
							<h3>Selesai Ujian</h3>
						</div>				
					</div>
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 hidden-border-custom">
							<h3 class="col-lg-12 box-title"><?=$paket_name[0]['name'].' '.$parent_name[0]['name'];?></h3>				
						</div>			
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 hidden-border-custom">
							<h3 class="col-lg-12 box-title"><div id="time_counter"></div></h3>				
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs">
							<h3 class="col-lg-12 box-title"><?=count($list_soal);?></h3>				
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs">
							<h3 class="col-lg-12 box-title">
								<?=count($this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list_soal[0]['id_parent'],'id_paket'=>$list_soal[0]['id_paket'],'status'=>1))->result_array());?>
							</h3>				
						</div>				
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs">
							<h3 class="col-lg-12 box-title"><?=count($list_soal)-count($this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list_soal[0]['id_parent'],'id_paket'=>$list_soal[0]['id_paket'],'status'=>1))->result_array());?></h3>
						</div>				
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 hidden-border-custom">
							<h3 class="col-lg-12 col-xs-12 text-center box-title">
								<a onclick="end_test(<?=$list_soal[0]['id_parent'];?>,<?=$list_soal[0]['id_paket'];?>)" class="btn btn-success btn-xs">Selesai Ujian</a>
							</h3>				
						</div>									
					</div>																
				</div>
			</div>
			<div class="box-body">

				<div class="row">					
<?php
	if(($counter_soal+1) <= count($list_soal))
	{
?>
					<input type="hidden" id="oid_soal" value="<?=$list_soal[$counter_soal]['id'];?>">
					<input type="hidden" id="oid_parent" value="<?=$list_soal[0]['id_parent'];?>">									
					<input type="hidden" id="oid_paket" value="<?=$list_soal[0]['id_paket'];?>">
                    <div id="container-soal" class="col-lg-9 col-xs-12">
                        <div class="col-lg-12" style="padding-bottom: 45px;">
                            <div class="form-group">
								<div class="col-lg-1 col-xs-1">
									<p id="p_nomor"><?=(($counter_soal+1) < 10) ? str_pad(($counter_soal+1),2,"0",STR_PAD_LEFT) : ($counter_soal+1);?>.</p> 									
								</div>
								<div class="col-lg-11 col-xs-10"><p id="p_soal"><?=($list_soal[$counter_soal]['image'] == '') ? $list_soal[$counter_soal]['name'] : '<img src="'.base_url().'public/soal/'.$list_soal[$counter_soal]['image'].'">';?></p></div>
                            </div>
                        </div>
                        
						<div class="col-lg-6">
                            <?php
								$get_data_detail = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list_soal[$counter_soal]['id']))->result_array();
								$check_data      = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list_soal[$counter_soal]['id_parent'],'id_paket'=>$list_soal[$counter_soal]['id_paket'],'id_soal'=>$list_soal[$counter_soal]['id']))->result_array();
								// print_r($check_data[0]);die();
								if ($get_data_detail != array()) {
                                    # code...
                                    for ($i=0; $i < count($get_data_detail); $i++) { 
										# code...
										$style_background = "";
										if ($check_data != array()) {
											# code...
											if ($check_data[0]['id_jawaban'] == $get_data_detail[$i]['id']) {
												# code...
							?>
												<input type="hidden" id="res_status_choice" value="1">
							<?php
												$style_background = "background-color:#4CAF50;"; 												
											}
										}
										else {
											# code...
							?>
												<input type="hidden" id="res_status_choice" value="0">							
							<?php
										}
                            ?>
                                        <div onclick="choice(<?=$get_data_detail[$i]['id'];?>,<?=$get_data_detail[$i]['id_soal'];?>,<?=$list_soal[$counter_soal]['id_parent'];?>,<?=$list_soal[$counter_soal]['id_paket'];?>)" class="row row_choice" id="row_<?=$get_data_detail[$i]['id'];?>" style="padding:10px;<?=$style_background;?>">
                                            <div class="col-lg-2 col-xs-3 cls_choice_btn"><a class="btn btn-warning"><?=$get_data_detail[$i]['choice'];?></a></div>
                                            <div class="col-lg-10 cls_choice"><?=($get_data_detail[$i]['image'] == '') ? $get_data_detail[$i]['name'] : '<img src="'.base_url().'public/soal/'.$get_data_detail[$i]['image'].'">' ;?></div>                                        
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
						
						<?php  
						if($counter_soal != count($list_soal))
						{
						?>
						<div class="col-lg-12 box-footer">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a id="btn-step1" onclick="go(<?=$list_soal[$counter_soal]['id_parent'];?>,<?=$list_soal[$counter_soal]['id_paket'];?>,<?=$counter_soal+1;?>,1)" class="btn btn-primary col-xs-12">SIMPAN DAN LANJUTKAN </a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a id="btn-step2" onclick="go(<?=$list_soal[$counter_soal]['id_parent'];?>,<?=$list_soal[$counter_soal]['id_paket'];?>,<?=$counter_soal+1;?>,0)" class="btn btn-primary col-xs-12 pull-right">LEWATKAN SOAL INI </a>
							</div>
						</div>						
						<?php
						}
						?>
                    </div>
				</div>
<?php
	}	
	else {
		# code...
?>
					<div class="col-lg-8 col-xs-12">
						<h3 class="text-center">Mohon diperiksa kembali, jika anda telah menyelesaikan try out ini.</h3>
					</div>
<?php				
	}
?>
                    <div class="col-lg-3 text-center" id="counter">
                        <div class="col-lg-12">
                            <?php
								$counter_soal_x = 0;
                                if ($list_soal != array()) {
                                    # code...
                                    for ($i=0; $i < count($list_soal); $i++) { 
                                        # code...
                                        $background_color = '';
                                        $color            = "";
										$check_data       = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list_soal[$i]['id_parent'],'id_paket'=>$list_soal[$i]['id_paket'],'id_soal'=>$list_soal[$i]['id']))->result_array();
										if ($check_data != array()) {
											# code...
											if ($check_data[0]['status'] == 1) {
												# code...
												$color            = "color:#fff;";
												$background_color = "background-color:#4CAF50;";												
											}
											else {
												# code...
												$color            = "color:#fff;";
												$background_color = "background-color:red;";												
											}
										}										
										// $data_soal        = $this->Allcrud->getdata('mr_try_out_soal',array('id'=>$list_soal[$i]['id']))->result_array();
										
										$counter = ($i < 10) ? str_pad($i+1,2,"0",STR_PAD_LEFT) : $i + 1;
										if (($counter_soal+1) == $counter) {
											# code...
											$color            = "color:#000;";
											$background_color = "background-color:yellow;";											
										}										
                            ?>
                                        <a onclick="go(<?=$list_soal[$counter_soal_x]['id_parent'];?>,<?=$list_soal[$counter_soal_x]['id_paket'];?>,<?=$i;?>,2)" class="btn btn-default" style="<?=$background_color;?><?=$color;?>"><?=$counter;?></a>
                            <?php
                                    }								
                                }
                            ?>
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
	var time_server = "<?=$timeout;?>";
	var upgradeTime = time_server;
	var seconds     = upgradeTime;
	function timer() {

		var days        = Math.floor(seconds/24/60/60);
		var hoursLeft   = Math.floor((seconds) - (days*86400));
		var hours       = Math.floor(hoursLeft/3600);
		var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
		var minutes     = Math.floor(minutesLeft/60);
		var remainingSeconds = seconds % 60;
		function pad(n) {
			return (n < 10 ? "0" + n : n);
		}
		document.getElementById('time_counter').innerHTML = pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
		if (seconds == 0) {
			clearInterval(countdownTimer);
			document.getElementById('time_counter').innerHTML = "Jam ujian telah telah selesai";
			window.location.href = "<?php echo site_url();?>user/try_out/analisis/"+$("#oid_parent").val()+"/"+$("#oid_paket").val();					
		} else {
			
			if (seconds <= 600) {
				$("#time_counter").css({"color": "red"})									
			}
			seconds--;
		}
	}
		// var countdownTimer = setInterval('timer()', 1000);		
	if (seconds <= 0) {
		window.location.href = "<?php echo site_url();?>user/try_out/analisis/"+$("#oid_parent").val()+"/"+$("#oid_paket").val();
	} else {
		var countdownTimer = setInterval('timer()', 1000);		
	}


	function choice(_choice,_soal,_parent,_type) {
		data_sender = {
			'choice': _choice,
			'soal'  : _soal,
			'parent': _parent,
			'paket' : _type
		}

		$.ajax({
			url :"<?php echo site_url();?>user/ztry_out/store_choice",
			type:"post",
			data:{data_sender : data_sender},
			beforeSend:function(){
				$(".row_choice").css({"background-color": ""})				
				$("#row_"+_choice).css({"background-color": "#4CAF50"})
				$("#counter_choice_"+_soal).css({"background-color": "#4CAF50"})							
				$("#res_status_choice").val(0);				
			},
			success:function(msg){
				var obj = jQuery.parseJSON (msg);
				if (obj.status == 1)
				{	
					$("#res_status_choice").val(1);
				}
				else
				{
					$("#res_status_choice").val(0);					
					$("#row_"+_choice).css({"background-color": ""})					
					Lobibox.notify('warning', {msg: obj.text+' ,silahkan pilih kembali pilihan anda'});
				}
			},
			error:function(jqXHR,exception)
			{
				$("#res_status_choice").val(0);				
				$("#table_"+_soal+" #tr_"+_choice).css({"background-color": ""})								
				ajax_catch(jqXHR,exception);					
			}
		})
	}

	function go(parent,paket,counter,arg) {
		var res_choice = $("#res_status_choice").val();
		if (res_choice == 1) 
		{
			window.location.href = "<?php echo site_url();?>user/try_out/mulai/"+parent+"/"+paket+"/"+counter+"/"+arg;
		}
		else
		{
			if (arg == 1) 
			{
				Lobibox.alert('warning', {msg: "Harap jawab soal ini terlebih dahulu."});				
			}		
			else
			{
				window.location.href = "<?php echo site_url();?>user/try_out/mulai/"+parent+"/"+paket+"/"+counter+"/"+arg;
			}			
		}
	}

	function end_test(parent,paket) {
		Lobibox.confirm({
		title   : "Konfirmasi",
		msg     : "Anda yakin akan menyelesaikan try out ini ?",
		callback: function ($this, type) {
			if (type === 'yes'){			
				$.ajax({
					url :"<?php echo site_url();?>user/ztry_out/end_test/"+parent+"/"+paket,
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