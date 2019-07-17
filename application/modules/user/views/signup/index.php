<!-- Jquery -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css'; ?>");</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/registration/login.css">
<script type='text/javascript' src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/loadme/style/loadme.css'; ?>");</style>
<!-- Lobi box -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/lobibox/dist/css/Lobibox.min.css'; ?>");</style>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/lobibox/js/Lobibox.js"></script>
<style>@import url('https://fonts.googleapis.com/css?family=Poppins');</style>
<style type="text/css">@import url("<?php echo base_url() . 'assets/font/css/font-awesome.min.css'; ?>");</style>
<div class="example-modal">
    <div class="modal modal-success fade" id="loadprosess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="box-content">

                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: transparent;border:none;">
                        <div style="margin-top: 320px;">
                            <div class="loadme-rotateplane"></div>
                            <div class="loadme-mask"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


<body style="background-image: url('<?php echo base_url(); ?>assets/css/registration/3_1920.jpg')">
	<div class="login-wrapper fadeInDown animated">
		<!--Sign up form-->
		<form action="#" class="lobi-form signup-form visible">
			<div class="login-header">
				Pendaftaran
			</div>
			<div class="login-body no-padding">
				<fieldset>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control" id="f_name" placeholder="Nama Lengkap">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" id="f_username" placeholder="Username">
						</div>
					</div>					

					<div class="col-md-12">
						<div class="form-group">
							<label>Alamat Lengkap</label>
							<textarea class="form-control" id="f_alamat" rows="3" placeholder="Alamat Lengkap"></textarea>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label>Asal Sekolah</label>
							<input type="text" class="form-control" id="f_asal_sekolah" placeholder="Asal Sekolah">
						</div>
					</div>										

					<div class="col-md-4">
						<div class="form-group">
							<label>No HP</label>
							<input type="number" class="form-control" id="f_no_hp" placeholder="No Hp">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>No WA</label>
							<input type="number" class="form-control" id="f_no_wa" placeholder="No WA">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>ID LINE</label>
							<input type="number" class="form-control" id="f_id_line" placeholder="ID LINE">
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
							<label>Password</label>
							<input type="password" class="form-control" id="f_password_repeat" placeholder="Ulangi Password">
						</div>
					</div>					

					<div class="row">
						<div class="col-xs-4 col-xs-offset-8">
							<button type="submit" class="btn btn-info btn-block" id="btn-signup">Mendaftar</button>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="login-footer">
				Sudah mempunyai akun? <button type="button" class="btn btn-md btn-info btn-sign-in pull-right">Masuk</button>
			</div>
		</form>

	</div>
</body>

<script>
$(document).ready(function(){
	$("#btn-signup").click(function ()
	{  
		var f_name            = $("#f_name").val();
		var f_username        = $("#f_username").val();
		var f_alamat          = $("#f_alamat").val();
		var f_asal_sekolah    = $("#f_asal_sekolah").val();
		var f_no_hp           = $("#f_no_hp").val();
		var f_no_wa           = $("#f_no_wa").val();
		var f_id_line         = $("#f_id_line").val();
		var f_password        = $("#f_password").val();
		var f_password_repeat = $("#f_password_repeat").val();

		if (f_name.length <= 0 || f_username.length <= 0 || f_alamat.length <= 0 || f_asal_sekolah.length <= 0 
		|| f_no_hp.length <= 0 || f_no_wa.length <= 0 || f_password.length <= 0 || f_password_repeat.length <= 0) {
			if(f_name.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi nama lengkap"
				});
			}
			else if(f_username.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi username"
				});
			}
			else if(f_alamat.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi alamat"
				});
			}
			else if(f_asal_sekolah.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi asal sekolah"
				});
			}
			else if(f_no_hp.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi no hp"
				});
			}
			else if(f_no_wa.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi no wa"
				});
			}
			else if(f_password.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi password"
				});
			}
			else if(f_password_repeat.length <= 0)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, harap lengkapi password"
				});
			}
		} else {
			if(f_password != f_password_repeat)
			{
				Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					msg: "Tidak bisa melakukan pendaftaran, kedua password tidak cocok"
				});				
			}
			else 
			{
				if(f_password.length < 6)
				{
					Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
					{
						msg: "Tidak bisa melakukan pendaftaran, password minimal 6 karakter"
					});					
				}
				else
				{
					login();
				}
			}
		}
	})
});

function login() {
	var f_name            = $("#f_name").val();
	var f_username        = $("#f_username").val();
	var f_alamat          = $("#f_alamat").val();
	var f_asal_sekolah    = $("#f_asal_sekolah").val();
	var f_no_hp           = $("#f_no_hp").val();
	var f_no_wa           = $("#f_no_wa").val();
	var f_id_line         = $("#f_id_line").val();
	var f_password        = $("#f_password").val();
	var f_password_repeat = $("#f_password_repeat").val();

	var data_sender = {
		'oid'         : '',
		'crud'        : 'insert',
		'name'        : f_name,
		'username'    : f_username,
		'alamat'      : f_alamat,
		'asal_sekolah': f_asal_sekolah,
		'no_hp'       : f_no_hp,
		'no_wa'       : f_no_wa,
		'id_line'     : f_id_line,
		'password'    : f_password
	}
	
	$.ajax({
		url :"<?php echo base_url();?>signup/store",
		type:"post",
		data:{data_sender : data_sender},
		beforeSend:function(){
			$("#editData").modal('hide');
			$("#loadprosess").modal('show');
			$("#btn-signup").attr("disabled", true);			
		},
		success:function(msg){
			var obj = jQuery.parseJSON (msg);
			if (obj.status == 1)
			{
				Lobibox.notify('success', {msg: obj.text});				
				setTimeout(function(){
					$("#loadprosess").modal('hide');
					setTimeout(function(){
						window.location.href = "<?=base_url();?>auth";							
					}, 1500);
				}, 1500);
			}
			else
			{
				Lobibox.notify('warning', {msg: obj.text});
				setTimeout(function(){
					$("#loadprosess").modal('hide');
				}, 500);
				$("#btn-signup").attr("disabled", false);							
			}
		},
		error:function(jqXHR,exception){
			if (jqXHR.status === 0) 
			{
				Lobibox.notify('error', {
					title: 'ERROR '+jqXHR.status,
					msg: 'Not connect.\n Verify Network.'
				});        
			} 
			else if (jqXHR.status == 404) 
			{
				Lobibox.notify('error', {
					title: 'ERROR '+jqXHR.status,
					msg: 'Requested page not found. [404]'
				});
			} 
			else if (jqXHR.status == 500) 
			{
				Lobibox.notify('error', {
					title: 'ERROR '+jqXHR.status,
					msg: jqXHR.statusText
				});
			} 
			else if (exception === 'parsererror') 
			{
				Lobibox.notify('error', {
					title: exception,
					msg: 'Requested JSON parse failed.'
				});        
			} 
			else if (exception === 'timeout') 
			{
				Lobibox.notify('error', {
					title: exception,
					msg: 'Time out error.'
				});                
			} 
			else if (exception === 'abort') 
			{
				Lobibox.notify('error', {
					title: exception,
					msg: 'Ajax request aborted.'
				});                        
			} 
			else 
			{
				Lobibox.notify('error', {
					title: 'ERROR '+jqXHR.status,
					msg: 'Uncaught Error.\n' + jqXHR.responseText
				});                        
			}

			setTimeout(function(){
				setTimeout(function(){
					$("#loadprosess").modal('hide');
					$("#btn-signup").attr("disabled", false);												
				}, 500);
			}, 500);   		
		}
	})	
}
</script>