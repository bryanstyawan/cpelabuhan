<input type="hidden" id="oid_header" value="">
<section id="quiz_section" class="col-xs-12" style="display:none;">
	<input type="hidden" id="quiz_true" value="">
	<input type="hidden" id="quiz_false" value="">
	<input type="hidden" id="quiz_result" value="">		
	<div class="row">
		<div class="col-lg-12">
			<h3 class="box-title pull-left col-lg-12">
				Pembahasan Quiz
				<div class="box-tools pull-right">
					<button class="btn btn-block btn-primary follow-scroll" onclick="view_analisis('result_analisis')"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button>
				</div>
			</h3>																				
		</div>
	</div>
	<div class="col-lg-9">
	<?php
	if ($list != array()) {
		$quiz_true   = 0;
        $quiz_false  = 0;
        $quiz_result = 0;
		# code...
		for ($i=0; $i < count($list); $i++) { 
			# code...
	?>
	<div class="box" id="div_soal_<?=$list[$i]['id'];?>">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
						<label class="col-lg-1"><?=$i+1;?>.</label>
						<label class="col-lg-11"><?=$list[$i]['name'];?></label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped" id="table_<?=$list[$i]['id'];?>">
						<body>
							<?php
								$detail = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list[$i]['id']))->result_array();
								if ($detail != array()) {
									# code...
									$check_data   = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_paket'=>$paket,'id_soal'=>$list[$i]['id']))->result_array();
									$check_choice = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list[$i]['id'],'jawaban'=>'true'))->result_array();
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
											<td style="width: 100%;"><?=$detail[$ii]['name'];?>.</td>
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
					<label><?=$list[$i]['desc_pembahasan'];?></label>
				</div>
			</div>			

		</div><!-- /.box-body -->
	</div><!-- /.box -->		
	<?php
        }	
        
        $quiz_result = ($quiz_true/count($list))*100;
        
	}
	?>
	</div>	
	<div class="col-lg-3 follow-scroll" id="counter">
		<div class="col-lg-12">
			<?php
				$counter_soal_x = 0;
				if ($list != array()) {
					# code...
					for ($i=0; $i < count($list); $i++) { 
						# code...
						$background_color = '';
						$color            = "";
						$check_choice     = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list[$i]['id'],'jawaban'=>'true'))->result_array();						
						$check_data       = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list[$i]['id_parent'],'id_paket'=>$list[$i]['id_paket'],'id_soal'=>$list[$i]['id']))->result_array();
						if ($check_data != array()) {
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
						// $data_soal        = $this->Allcrud->getdata('mr_try_out_soal',array('id'=>$list[$i]['id']))->result_array();
						
						$counter = ($i < 10) ? str_pad($i+1,2,"0",STR_PAD_LEFT) : $i + 1;
			?>
						<a href="#div_soal_<?=$list[$i]['id'];?>" class="btn btn-default" style="<?=$background_color;?><?=$color;?>"><?=$counter;?></a>
			<?php
					}								
				}
			?>
		</div>
	</div>	
</section>

<section id="analisis_pre_test_quiz_section" class="col-lg-12" style="">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Mini Try Out - <?=$data_paket[0]['name'];?></h3>
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
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-lg-12 text-center">
					<button class="btn btn-primary" id="btn_pembahasan" onclick="view_analisis('quiz')"><i class="fa fa-x"></i> Pembahasan Mini Try Out</button>				
					<!-- <a class="btn btn-success" onclick="finish()">Kembali Ke Materi</a> -->
				</div>
			</div>

		</div><!-- /.box-body -->		
	</div>
</section>

<script>
$(document).ready(function(){		
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
							window.location.href = "<?php echo site_url();?>user/bimbingan_belajar";							
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