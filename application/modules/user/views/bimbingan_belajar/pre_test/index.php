<style>
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		.follow-scroll
		{
			float: right;
		}

		#headerdata
		{

		}

		.main-sidebar
		{
			
		}		
	} 

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		.follow-scroll
		{
			float: right;			
		}

		#headerdata
		{
			
		}

		.main-sidebar
		{
			
		}				
	} 

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		.follow-scroll
		{
			float: right;			
		}

		#headerdata
		{
			
		}

		.main-sidebar
		{
			
		}				
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		.follow-scroll
		{
			float: right;
		}

		#headerdata
		{
			
		}

		.main-sidebar
		{
			width: 600%;			
		}				
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		.follow-scroll
		{
			float: right;			
		}

		#headerdata
		{
			
		}

		.main-sidebar
		{
			
		}							
	}	
</style>
<div id="viewdata" class="col-lg-2 col-sm-2 col-xs-2 hidden-xs hidden-sm">
	<?=$this->load->view('templates/sidebar/main');?>
</div>
<div class="col-lg-10 col-sm-10 col-xs-10">
	<section class="col-lg-2 col-sm-2 col-xs-2 follow-scroll">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12">
						<?php
							if ($list != array()) {
								# code...
								for ($i=0; $i < count($list); $i++) { 
									# code...
									$background_color = '';
									$color            = "";
									$check_data  = $this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_type'=>$type,'id_materi'=>$materi,'id_soal'=>$list[$i]['id']))->result_array();
									if ($check_data != array()) {
										# code...
										$background_color = "background-color:#4CAF50;";
									}								
						?>
									<a href="#div_soal_<?=$list[$i]['id'];?>" class="btn btn-default col-lg-6 col-xs-12" id="counter_choice_<?=$list[$i]['id'];?>" style="<?=$background_color;?><?=$color;?>"><?=$i+1;?></a>
						<?php
								}								
							}
						?>
					</div>
				</div>

			</div><!-- /.box-body -->		
		</div>
	</section>

	<section id="headerdata" class="col-xs-10">
		<input type="hidden" id="oid_header" value="">				
		<?php
		if ($list != array()) {
			# code...
			for ($i=0; $i < count($list); $i++) { 
				# code...
		?>
		<div class="box" id="div_soal_<?=$list[$i]['id'];?>">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
							<label class="col-lg-1 col-xs-1"><?=$i+1;?>.</label>
							<?php
								if ($list[$i]['image'] == NULL) {
									# code...
							?>
								<label class="col-lg-11 col-xs-9"><?=$list[$i]['name'];?></label>							
							<?php
								}
								else
								{
							?>
									<img src="<?=base_url();?>public/soal/<?=$list[$i]['image'];?>">							
							<?php
								}
							?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<table class="table table-bordered table-striped" id="table_<?=$list[$i]['id'];?>">
					<body>
						<?php
							$detail = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$list[$i]['id']))->result_array();
							if ($detail != array()) {
								# code...
								$check_data  = $this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_type'=>$type,'id_materi'=>$materi,'id_soal'=>$list[$i]['id']))->result_array();
								for ($ii=0; $ii < count($detail); $ii++) { 
									# code...
									$mark = '';
									if ($check_data != array()) {
										# code...
										if ($detail[$ii]['id'] == $check_data[0]['id_jawaban']) {
											# code...
											$mark = "style='background-color:#4CAF50;'";
										}										
									}

									$hidden_btn  = "";
									$show_choice = "";
									if ($track != array()) {
										# code...
										if ($track[0]['status'] == 1) {
											# code...
											$hidden_btn  = "style='display:none;'";
											$show_choice = $detail[$ii]['choice'];
										}
									}
						?>
									<tr class="tr_choice" id="tr_<?=$detail[$ii]['id'];?>" <?=$mark;?>>
										<td >
											<a <?=$hidden_btn;?> class="btn btn-primary" onclick="choice(<?=$detail[$ii]['id'];?>,<?=$detail[$ii]['id_soal'];?>,<?=$materi;?>,<?=$type;?>)"><?=$detail[$ii]['choice'];?></a>
											<?=$show_choice;?>
										</td>								
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
									</tr>
						<?php
								}
							}
						?>
					</body>
					</table>
					</div>
				</div>

			</div><!-- /.box-body -->
		</div><!-- /.box -->		
		<?php
			}			
		}
		?>
	</section>

	<section class="col-lg-12 col-sm-12 col-xs-12">
		<div class="box" style="background: none;border-top: none;box-shadow: none;">
			<div class="box-header">
					<h3 class="box-title"></h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-lg-12 text-center">
							<a class="btn btn-success" onclick="finish(<?=$materi;?>,<?=$type;?>)"><?=($type==1)?'Lanjut ke Video Materi':'Lanjut ke Analisis';?></a>
						</div>
					</div>

				</div><!-- /.box-body -->		
			</div>
		</div>
	</section>
</div>

<script>
$(document).ready(function(){
    var element = $('.follow-scroll'),
        originalY = element.offset().top;

    // Space between element and top of screen (when scrolling)
    var topMargin = 100;

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

	var title = "";
	if (_type == 1) {
		title = 'Pre Test';
	}
	else if(_type == 3)
	{
		title = "Quiz";
	}

	Lobibox.confirm({
		title   : "Konfirmasi",
		msg     : "Anda yakin ingin menyelesaikan "+title+" ini ?",
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
							window.location.href = "<?php echo site_url();?>user/zbimbingan_belajar/<?=($type==1)?'video_materi':'analisis';?>/<?=$type+1;?>/<?=$materi;?>";							
						}
						else
						{
							if (obj.status == 2) {
								Lobibox.notify('warning', {msg: obj.text});								
							}
							else
							{
								Lobibox.notify('warning', {msg: obj.text+' ,silahkan ulangi kembali'});
							}							
							$("#loadprosess").modal('hide');							
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
</script>