<style>
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		#headerdata
		{

		}

		.main-sidebar
		{
			
		}	

		#container_1
		{
			margin-top: 100px;
		}

		#container_2
		{
			
		}		
	} 

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		#headerdata
		{
			
		}

		.main-sidebar
		{
			
		}		

		#container_1
		{

		}

		#container_2
		{
			
		}						
	} 

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		#headerdata
		{
			
		}

		.main-sidebar
		{
			
		}		

		#container_1
		{

		}

		#container_2
		{
			
		}						
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		#headerdata
		{
			
		}

		.main-sidebar
		{
			width: 600%;			
		}		

		#container_1
		{

		}

		#container_2
		{
			
		}						
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		#headerdata
		{
			
		}

		.main-sidebar
		{
			
		}		

		#container_1
		{

		}

		#container_2
		{
			
		}									
	}	
</style>

<input type="hidden" id="oid_header" value="">
<div id="viewdata" class="col-lg-2 col-sm-2">
	<?=$this->load->view('templates/sidebar/main');?>
</div>
<section id="pre_test_section" class="col-xs-10" style="display:none;">
	<input type="hidden" id="pre_test_true" value="">
	<input type="hidden" id="pre_test_false" value="">
	<input type="hidden" id="pre_test_result" value="">			
	<div class="row">
		<div class="col-lg-12">
			<h3 class="box-title pull-left col-lg-12">Pembahasan Pre Test<div class="box-tools pull-right"><button class="btn btn-block btn-primary" onclick="view_analisis('result_analisis')"><i class="fa fa-arrow-circle-o-left"></i></button></div></h3>																				
		</div>
	</div>
	<?php
	$pre_test_true   = 0;
	$pre_test_false  = 0;
	$pre_test_result = 0;
	if ($pre_test != array()) {
		# code...
		for ($i=0; $i < count($pre_test); $i++) { 
			# code...
	?>
	<div class="box">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
						<label class="col-lg-1"><?=$i+1;?>.</label>
						<label class="col-lg-11"><?=$pre_test[$i]['name'];?></label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped" id="table_<?=$pre_test[$i]['id'];?>">
						<body>
							<?php
								$detail = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$pre_test[$i]['id']))->result_array();
								if ($detail != array()) {
									# code...
									$check_data   = $this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_type'=>1,'id_materi'=>$materi,'id_soal'=>$pre_test[$i]['id']))->result_array();
									$check_choice = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$pre_test[$i]['id'],'jawaban'=>'true'))->result_array();
									for ($ii=0; $ii < count($detail); $ii++) { 
										# code...
										$mark = '';
										$mark_right = '';								
										if ($check_data != array()) {
											# code...
											if ($detail[$ii]['id'] == $check_data[0]['id_jawaban']) {
												# code...
												$mark = "background-color:#4CAF50;";
											}										
										}

										if ($check_choice != array()) {
											# code...
											if ($check_data != array()) {
												# code...
												if ($detail[$ii]['id'] == $check_choice[0]['id']) {
													# code...
													if ($check_choice[0]['id'] == $check_data[0]['id_jawaban']) {
														# code...
														$mark = "background-color:#4CAF50;";
														$pre_test_true += 1;											
													}
													else {
														# code...
														$mark_right = "background-color:red;";											
														$pre_test_false += 1;
													}
												}																						
											}
											else {
												# code...
												if ($detail[$ii]['id'] == $check_choice[0]['id']) {
													# code...
													$mark_right = "background-color:red;";											
													$pre_test_false += 1;
												}																												
											}
										}								
							?>
										<tr class="tr_choice" id="tr_<?=$detail[$ii]['id'];?>" style="<?=$mark;?><?=$mark_right;?>">
											<td style="width: 5%;"><?=$detail[$ii]['choice'];?>.</td>
											<td style="width: 100%;"><?=$detail[$ii]['name'];?>.</td>
											<td><a class="btn btn-primary" onclick="choice(<?=$detail[$ii]['id'];?>,<?=$detail[$ii]['id_soal'];?>,<?=$materi;?>,<?=$type;?>)">Pilih</a></td>
										</tr>
							<?php
									}
								}
							?>
						</body>
					</table>
					<div class="row">
						<div class="col-lg-12">
							<label><?=$pre_test[$i]['desc_pembahasan'];?></label>
						</div>
					</div>
				</div>
			</div>

		</div><!-- /.box-body -->
	</div><!-- /.box -->		
	<?php
		}			
	}
	$pre_test_result = $pre_test_true * 20;
	?>
</section>

<section id="quiz_section" class="col-xs-10" style="display:none;">
	<input type="hidden" id="quiz_true" value="">
	<input type="hidden" id="quiz_false" value="">
	<input type="hidden" id="quiz_result" value="">		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="box-title pull-left col-lg-12 col-sm-12 col-xs-12">
				<label>Pembahasan Quiz</label>
				<div class="box-tools pull-right">
					<button class="btn btn-block btn-primary follow-scroll" onclick="view_analisis('result_analisis')"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button>
				</div>
			</h3>																				
		</div>
	</div>
	<div class="col-lg-9">	
	<?php
	$quiz_true   = 0;
	$quiz_false  = 0;
	$quiz_result = 0;	
	if ($quiz != array()) {
		# code...
		for ($i=0; $i < count($quiz); $i++) { 
			# code...
	?>
	<div class="box">
		<div class="box-body" id="div_soal_<?=$quiz[$i]['id'];?>">
			<div class="row">
				<div class="col-md-12">
						<label class="col-lg-1"><?=$i+1;?>.</label>
						<?php
							if ($quiz[$i]['image'] == NULL) {
								# code...
						?>
							<label class="col-lg-11"><?=$quiz[$i]['name'];?></label>							
						<?php
							}
							else
							{
						?>
								<img src="<?=base_url();?>public/soal/<?=$quiz[$i]['image'];?>">							
						<?php
							}
						?>						
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped" id="table_<?=$quiz[$i]['id'];?>">
						<body>
							<?php
								$detail = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$quiz[$i]['id']))->result_array();
								if ($detail != array()) {
									# code...
									$check_data   = $this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_type'=>3,'id_materi'=>$materi,'id_soal'=>$quiz[$i]['id']))->result_array();
									$check_choice = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$quiz[$i]['id'],'jawaban'=>'true'))->result_array();
									for ($ii=0; $ii < count($detail); $ii++) { 
										# code...
										$mark = '';$mark_right = '';								
										if ($check_data != array()) {
											# code...
											if ($detail[$ii]['id'] == $check_data[0]['id_jawaban']) {
												# code...
												$mark = "background-color:#4CAF50;";
											}										
										}

										if ($check_choice != array()) {
											# code...
											if ($check_data != array()) {
												# code...
												if ($detail[$ii]['id'] == $check_choice[0]['id']) {
													# code...
													if ($check_choice[0]['id'] == $check_data[0]['id_jawaban']) {
														# code...
														$mark = "background-color:#4CAF50;";
														$quiz_true += 1;											
													}
													else {
														# code...
														$mark_right = "background-color:red;";											
														$quiz_false += 1;
													}
												}																						
											}
											else {
												# code...
												if ($detail[$ii]['id'] == $check_choice[0]['id']) {
													# code...
													$mark_right = "background-color:red;";											
													$quiz_false += 1;
												}																												
											}
										}								
							?>
										<tr class="tr_choice" id="tr_<?=$detail[$ii]['id'];?>" style="<?=$mark;?><?=$mark_right;?>">
											<td style="width: 5%;"><?=$detail[$ii]['choice'];?>.</td>
											<td style="width: 100%;">
												<?php
													if ($detail[$ii]['image'] == NULL) {
														# code...
												?>
													<?=$detail[$ii]['name'];?>.											
												<?php
													} else {
														# code...
												?>
													<img src="<?=base_url();?>public/jawaban/<?=$detail[$ii]['image'];?>">											
												<?php
													}	
												?>											
											</td>
											<td><a class="btn btn-primary" onclick="choice(<?=$detail[$ii]['id'];?>,<?=$detail[$ii]['id_soal'];?>,<?=$materi;?>,<?=$type;?>)">Pilih</a></td>
										</tr>
							<?php
									}
								}
							?>
						</body>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php
						if ($quiz[$i]['image_desc'] == NULL) {
							# code...
					?>
						<h3>Pembahasan</h3>
						<label><?=$quiz[$i]['desc_pembahasan'];?></label>							
					<?php
						}
						else
						{
					?>
							<h3>Pembahasan</h3>					
							<img src="<?=base_url();?>public/pembahasan/<?=$quiz[$i]['image_desc'];?>">							
					<?php
						}
					?>				
				</div>
			</div>			

		</div><!-- /.box-body -->
	</div><!-- /.box -->		
	<?php
		}			
	}

	$quiz_result = $quiz_true * 5;
	?>
	</div>
	<div class="col-xs-2 follow-scroll">
		<div class="box">
		<div class="box-header">
				<h3 class="box-title"></h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12">
						<?php
							if ($quiz != array()) {
								# code...
								for ($i=0; $i < count($quiz); $i++) { 
									# code...
									$background_color = '';
									$color            = "";
									$check_choice     = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$quiz[$i]['id'],'jawaban'=>'true'))->result_array();									
									$check_data       = $this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_type'=>3,'id_materi'=>$materi,'id_soal'=>$quiz[$i]['id']))->result_array();									
									// print_r($check_data);
									if ($check_data != array()) {
										# code...
										if ($check_choice != array()) {
											# code...
											if ($check_choice[0]['id'] == $check_data[0]['id_jawaban']) {
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
										else
										{
											
										}									
									}								
						?>
									<a href="#div_soal_<?=$quiz[$i]['id'];?>" class="btn btn-default col-xs-6" id="counter_choice_<?=$quiz[$i]['id'];?>" style="<?=$background_color;?><?=$color;?>"><?=$i+1;?></a>
						<?php
								}								
							}
						?>
					</div>
				</div>

			</div><!-- /.box-body -->		
		</div>
	</div>		
</section>

<section id="analisis_pre_test_quiz_section" class="col-lg-10 col-sm-10" style="">
	<div id="container_1" class="col-lg-6 col-sm-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Pre Test</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-md-6">
							<div class="form-group">
								<label>Benar</label>
								<input type="text" class="form-control" id="f_pre_test_true" disabled="disabled">
							</div>
						</div>

						<div class="col-md-6">						
							<div class="form-group">
								<label>Salah</label>
								<input type="text" class="form-control" id="f_pre_test_false" disabled="disabled">
							</div>						
						</div>

						<div class="col-md-12">						
							<div class="form-group">
								<label>Nilai</label>
								<input type="text" class="form-control" id="f_pre_test_result" disabled="disabled">
							</div>						
						</div>							
					</div>
				</div>
			</div><!-- /.box-body -->		
		</div>
	</div>
	<div id="container_2" class="col-lg-6 col-sm-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Quiz</h3>
				<div class="box-tools pull-right"></div>				
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-md-6">
							<div class="form-group">
								<label>Benar</label>
								<input type="text" class="form-control" id="f_quiz_true" disabled="disabled">
							</div>
						</div>

						<div class="col-md-6">						
							<div class="form-group">
								<label>Salah</label>
								<input type="text" class="form-control" id="f_quiz_false" disabled="disabled">
							</div>						
						</div>

						<div class="col-md-12">						
							<div class="form-group">
								<label>Nilai</label>
								<input type="text" class="form-control" id="f_quiz_result" disabled="disabled">
							</div>						
						</div>							
					</div>
				</div>
			</div><!-- /.box-body -->		
		</div>
	</div>

	</div>
</section>


<section class="col-lg-12">
	<div class="box" style="background: transparent;border-top: transparent;box-shadow: none;">
		<div class="box-header">
			<h3 class="box-title"></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-lg-12 text-center">
					<button class="btn btn-primary" id="btn_pembahasan" onclick="view_analisis('quiz')"><i class="fa fa-x"></i> Pembahasan Quiz</button>				
					<a style="display:none;" class="btn btn-success" onclick="finish(<?=$materi;?>,<?=$type;?>)">Kembali Ke Materi</a>
				</div>
			</div>

		</div><!-- /.box-body -->		
	</div>
</section>

<?php
	$check_data_analisis   = $this->Allcrud->getData('tr_analisis_bimbel',array('id_user'=>$this->session->userdata('session_user'),'id_materi'=>$materi))->result_array();
	if ($check_data_analisis == array()) {
		# code...
		$data_store = array
					(
						'id_user'         => $this->session->userdata('session_user'),
						'id_materi'       => $materi,
						'pre_test_true'   => $pre_test_true,
						'pre_test_false'  => $pre_test_false,
						'pre_test_empty'  => '',
						'pre_test_value'  => $pre_test_result,
						'pre_test_status' => '',
						'quiz_true'       => $quiz_true,
						'quiz_false'      => $quiz_false,
						'quiz_empty'      => '',
						'quiz_value'      => $quiz_result,
						'quiz_status'     => ''						
					);
		$res_data    = $this->Allcrud->addData('tr_analisis_bimbel',$data_store);					
	}
?>
<script>
$(document).ready(function(){
	$("#pre_test_true").val('<?=$pre_test_true;?>');
	$("#pre_test_false").val('<?=$pre_test_false;?>');
	$("#pre_test_result").val('<?=$pre_test_result;?>');

	$("#f_pre_test_true").val('<?=$pre_test_true;?>');
	$("#f_pre_test_false").val('<?=$pre_test_false;?>');
	$("#f_pre_test_result").val('<?=$pre_test_result;?>');			

	$("#quiz_true").val('<?=$quiz_true;?>');
	$("#quiz_false").val('<?=$quiz_false;?>');
	$("#quiz_result").val('<?=$quiz_result;?>');

	$("#f_quiz_true").val('<?=$quiz_true;?>');
	$("#f_quiz_false").val('<?=$quiz_false;?>');
	$("#f_quiz_result").val('<?=$quiz_result;?>');				

	data_sender = {
		'true'  : $("#pre_test_true").val(),
		'false' : $("#pre_test_false").val(),
		'result': $("#pre_test_result").val()
	}
	console.table(data_sender);

	data_sender = {
		'true'  : $("#quiz_true").val(),
		'false' : $("#quiz_false").val(),
		'result': $("#quiz_result").val()
	}
	console.table(data_sender);	
})

$(document).ready(function(){
    var element = $('.follow-scroll'),
        originalY = element.offset().top;

    // Space between element and top of screen (when scrolling)
    var topMargin = 0;

    // Should probably be set in CSS; but here just for emphasis
    element.css('position', 'relative');

    $(window).on('scroll', function(event) {
        var scrollTop = $(window).scrollTop();

        element.stop(false, false).animate({
            top: scrollTop < originalY
                    ? 0
                    : scrollTop - originalY + topMargin
        }, 300);
    });
})

function choice(_choice,_soal,_materi,_type) {
	data_sender = {
		'choice': _choice,
		'soal'  : _soal,
		'materi': _materi,
		'type'  : _type
	}

	$.ajax({
		url :"<?php echo site_url();?>user/zbimbingan_belajar/store_choice",
		type:"post",
		data:{data_sender : data_sender},
		beforeSend:function(){
			$("#table_"+_soal+" .tr_choice").css({"background-color": ""})				
			$("#table_"+_soal+" #tr_"+_choice).css({"background-color": "#4CAF50"})
			$("#counter_choice_"+_soal).css({"background-color": "#4CAF50"})							
		},
		success:function(msg){
			var obj = jQuery.parseJSON (msg);
			if (obj.status == 1)
			{
				// Lobibox.notify('success', {msg: obj.text});
			}
			else
			{
				$("#table_"+_soal+" #tr_"+_choice).css({"background-color": ""})					
				Lobibox.notify('warning', {msg: obj.text+' ,silahkan pilih kembali pilihan anda'});
			}
		},
		error:function(jqXHR,exception)
		{
			$("#table_"+_soal+" #tr_"+_choice).css({"background-color": ""})								
			ajax_catch(jqXHR,exception);					
		}
	})
}

function finish(_materi,_type)
{	
	data_sender = {
		'materi': _materi,
		'type'  : _type
	}					
	Lobibox.confirm({
		title   : "Konfirmasi",
		msg     : "Anda yakin ingin menyelesaikan pre test ini ?",
		callback: function ($this, type) {
			if (type === 'yes'){			
				$.ajax({
					url :"<?php echo site_url();?>user/zbimbingan_belajar/finish_step",
					type:"post",
					data:{data_sender : data_sender},
					beforeSend:function(){
						$("#loadprosess").modal('show');
					},
					success:function(msg){
						var obj = jQuery.parseJSON (msg);
						if (obj.status == 1)
						{
							Lobibox.notify('success', {msg: obj.text});
							window.location.href = "<?php echo site_url();?>user/bimbingan_belajar_trial";							
						}
						else
						{
							Lobibox.notify('warning', {msg: obj.text+' ,silahkan ulangi kembali'});
						}						
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

function view_analisis(params) {
	if (params == 'pre_test') {
		$("#pre_test_section").css({"display": ""});
		$("#btn_pembahasan").css({"display": "none"});				
		$("#analisis_pre_test_quiz_section").css({"display": "none"});		
	} 
	else if(params == 'quiz') {
		$("#quiz_section").css({"display": ""});
		$("#btn_pembahasan").css({"display": "none"});
		// $(".main_background").css({"background-image": "url(http://localhost/ecodu/assets/images/web_backgound.jpg)!important","background-size":"cover!important","background-position":"50% 50%!important"});		
		$("#analisis_pre_test_quiz_section").css({"display": "none"});
	}
	else if(params == 'result_analisis')
	{
		$("#pre_test_section").css({"display": "none"});
		$("#btn_pembahasan").css({"display": ""});		
		$("#quiz_section").css({"display": "none"});
		$("#analisis_pre_test_quiz_section").css({"display": ""});
		
	}
}
</script>