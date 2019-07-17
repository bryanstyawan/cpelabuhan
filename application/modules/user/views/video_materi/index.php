<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,700);
*, *:before, *:after {
	list-style: none;	
	box-sizing: border-box;
}
/* body {
  background: #c5ddeb;
  font: 14px/20px "Lato", Arial, sans-serif;
  padding: 40px 0;
  color: white;
} */
/* .container {
  margin: 0 auto;
  width: 750px;
  background: #444753;
  border-radius: 5px;
} */
.people-list {
  width: 260px;
  float: left;
}
.people-list .search {
  padding: 20px;
}
.people-list input {
  border-radius: 3px;
  border: none;
  padding: 14px;
  color: white;
  background: #6a6c75;
  width: 90%;
  font-size: 14px;
}
.people-list .fa-search {
  position: relative;
  left: -25px;
}
.people-list ul {
  padding: 20px;
  height: 770px;
}
.people-list ul li {
  padding-bottom: 20px;
}
.people-list img {
  float: left;
}
.people-list .about {
  float: left;
  margin-top: 8px;
}
.people-list .about {
  padding-left: 8px;
}
.people-list .status {
  color: #92959e;
}
.chat {
    width: 445px;
    float: left;
    background: #f2f5f8;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    color: #434651;
}
.chat .chat-header {
  padding: 20px;
  border-bottom: 2px solid white;
}
.chat .chat-header img {
  float: left;
}
.chat .chat-header .chat-about {
  float: left;
  padding-left: 10px;
  margin-top: 6px;
}
.chat .chat-header .chat-with {
  font-weight: bold;
  font-size: 16px;
}
.chat .chat-header .chat-num-messages {
  color: #92959e;
}
.chat .chat-header .fa-star {
  float: right;
  color: #d8dadf;
  font-size: 20px;
  margin-top: 12px;
}
.chat .chat-history {
  padding: 30px 30px 20px;
  border-bottom: 2px solid white;
  overflow-y: scroll;
  height: 300px;
}
.chat .chat-history .message-data {
  margin-bottom: 15px;
}
.chat .chat-history .message-data-time {
  color: #a8aab1;
  padding-left: 6px;
}
.chat .chat-history .message {
  color: white;
  padding: 18px 20px;
  line-height: 26px;
  font-size: 16px;
  border-radius: 7px;
  margin-bottom: 30px;
  width: 90%;
  position: relative;
}
.chat .chat-history .message:after {
  bottom: 100%;
  left: 7%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-bottom-color: #86bb71;
  border-width: 10px;
  margin-left: -10px;
}
.chat .chat-history .my-message {
  background: #86bb71;
}
.chat .chat-history .other-message {
  background: #94c2ed;
}
.chat .chat-history .other-message:after {
  border-bottom-color: #94c2ed;
  left: 93%;
}
.chat .chat-message {
  padding: 30px;
}
.chat .chat-message textarea {
  width: 100%;
  border: none;
  padding: 10px 20px;
  font: 14px/22px "Lato", Arial, sans-serif;
  margin-bottom: 10px;
  border-radius: 5px;
  resize: none;
}
.chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
  font-size: 16px;
  color: gray;
  cursor: pointer;
}
.chat .chat-message button {
  float: right;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  font-weight: bold;
  background: #4CAF50;
}
.chat .chat-message button:hover {
  color: #75b1e8;
}
.online, .offline, .me {
  margin-right: 3px;
  font-size: 10px;
}
.online {
  color: #86bb71;
}
.offline {
  color: #e38968;
}
.me {
  color: #94c2ed;
}
.align-left {
  text-align: left;
}
.align-right {
  text-align: right;
}
.float-right {
  float: right;
}
.clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}

#f_video_detail
{
  width:100%;
  height: 100%;
}

	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		#headerdata
		{

		}

		#container_1
		{
			/* margin-top: 100px; */
		}

		#container_2
		{
			
		}		

    #f_video_detail
    {

    } 

    .chat 
    {
      width: 287%;        
    }       

    .chat .chat-history
    {
      padding: 5px 5px 5px;      
    }    

    .chat .chat-header
    {
      padding: 5px;      
    }    

    .chat .chat-message
    {
      padding: 5px;
    }    
	} 

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		#headerdata
		{
			
		}

		#container_1
		{

		}

		#container_2
		{
			
		}						

    #f_video_detail
    {

    }       

    .chat 
    {
      
    }            
	} 

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		#headerdata
		{
			
		}

		#container_1
		{

		}

		#container_2
		{
			
		}		

    #f_video_detail
    {

    }       

    .chat 
    {
      
    }            				
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		#headerdata
		{
			
		}

		#container_1
		{

		}

		#container_2
		{
			
		}		

    #f_video_detail
    {

    }       

    .chat 
    {
      
    }            				
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		#headerdata
		{
			
		}

		#container_1
		{

		}

		#container_2
		{
			
		}		

    #f_video_detail
    {

    }       

    .chat 
    {
      
    }            							
	}	

</style>
<?php
if ($list != array()) {
    # code...
    ?>
    <div class="container" id="main_video_section">
				<div class="box-header with-border text-center hidden-lg hidden-md" style="border-bottom: none;margin-bottom: 20px;">
					<a href="#" id="btn_type_1" class="col-xs-6" style="background: #E91E63;color: #fff;padding: 10px 0px 10px 0px;"><h3 class="box-title"><?=$list[0]['name'];?></h3></a>
					<a href="#" id="btn_type_2" class="col-xs-6" style="background: #03A9F4;color: #fff;padding: 10px 0px 10px 0px;"><h3 class="box-title"><?=$list[1]['name'];?></h3></a>					
				</div>			
            
        <div id="type_1" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hidden-xs hidden-sm">
            <div id="container_1" class="box box-solid" style="">
                <div class="box-header with-border text-center" style="background: #f39c12;color: #fff;">
                    <h3 class="box-title"><?=$list[0]['name'];?></h3>
                </div>
                <div class="box-body no-padding" style="display: block;">
                    
                    <?php
                        $child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[0]['id']))->result_array();
                        for ($ii=0; $ii < count($child); $ii++) 
                        { 
                            # code...
                            $arg_video  = "";
                            $id_video   = "";
                            $file_video = "";
                            $get_video  = $this->Allcrud->getData('mr_video',array('id_materi'=>$child[$ii]['id'],'id_parent'=>$child[$ii]['id_parent']))->result_array();
                            $lock       = "";
                            if ($get_video != array()) {
                                # code...
                                $id_video   = $get_video[0]['id'];
                                $file_video = $get_video[0]['file'];
                                if ($verify_user_paid != array()) {
                                    # code...
                                    $check_data_next  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>2,'id_materi'=>$child[$ii]['id']))->result_array();
                                    if ($check_data_next != array()) {
                                        # code...
                                        $arg_video = 'unlock';
                                        $lock       = '<i class="fa fa-play" style="font-size: 41px;"></i>';                                        
                                    }
                                    else {
                                        # code...
                                        $arg_video  = 'lock';
                                        $file_video = 'maaf, anda diharuskan menyelesaikan materi sebelumnya.';
                                        $lock       = '<i class="fa fa-lock" style="font-size: 41px;"></i>';
                                    }
                                }
                                else {
                                    # code...
                                    if ($ii < 1) {
                                        # code...
                                        $arg_video = 'unlock';
                                        $lock       = '<i class="fa fa-play" style="font-size: 41px;"></i>';                                        
                                    }
                                    else {
                                        # code...
                                        $arg_video  = 'lock';
                                        $file_video = "Maaf, video ini akan terbuka jika anda telah membeli paket bimbingan belajar";
                                        $lock       = '<i class="fa fa-lock" style="font-size: 41px;"></i>';                                    
                                    }
                                }
                            }
                            else {
                                # code...
                                $arg_video = 'NA';
                                $lock       = '<i class="fa fa-lock" style="font-size: 41px;"></i>';                            
                            }
    
                    ?>
                    <a class="row" onclick="view_video('<?=$arg_video;?>','<?=$child[$ii]['id'];?>','<?=$file_video;?>','<?=$child[$ii]['name'];?>')" style="margin: 0px;cursor: pointer;">                
                        <div class="col-lg-12" style="padding-left: 0px;">
                            <div class="box box-warning direct-chat direct-chat-warning" style="height: 120px;">
                                <div class="box-header with-border text-center" style="border-bottom: transparent;">
                                    <h3 class="box-title"><?=$child[$ii]['name'];?></h3>
                                </div>        
                                <div class="box-body">
                                    <div class="row text-center">
                                    <?=$lock;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>                
                    <?php
                        }                                            
                    ?>
                </div>
            </div>
        </div>
        <div id="type_2" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hidden-xs hidden-sm">
            <div id="container_1" class="box box-solid" style="">
                <div class="box-header with-border text-center" style="background: #f39c12;color: #fff;">
                    <h3 class="box-title"><?=$list[1]['name'];?></h3>
                </div>
                <div class="box-body no-padding" style="display: block;">
                    
                    <?php
                        $child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[1]['id']))->result_array();
                        for ($ii=0; $ii < count($child); $ii++) 
                        { 
                            # code...
                            $arg_video  = "";
                            $id_video   = "";
                            $file_video = "";
                            $get_video  = $this->Allcrud->getData('mr_video',array('id_materi'=>$child[$ii]['id'],'id_parent'=>$child[$ii]['id_parent']))->result_array();
                            $lock       = "";
                            if ($get_video != array()) {
                                # code...
                                $id_video   = $get_video[0]['id'];
                                $file_video = $get_video[0]['file'];
                                if ($verify_user_paid != array()) {
                                    # code...
                                    $check_data_next  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>2,'id_materi'=>$child[$ii]['id']))->result_array();
                                    if ($check_data_next != array()) {
                                        # code...
                                        $arg_video = 'unlock';
                                        $lock       = '<i class="fa fa-play" style="font-size: 41px;"></i>';                                        
                                    }
                                    else {
                                        # code...
                                        $arg_video  = 'lock';
                                        $file_video = 'maaf, anda diharuskan menyelesaikan materi sebelumnya.';
                                        $lock       = '<i class="fa fa-lock" style="font-size: 41px;"></i>';
                                    }
                                }
                                else {
                                    # code...
                                    if ($ii < 1) {
                                        # code...
                                        $arg_video = 'unlock';
                                        $lock       = '<i class="fa fa-play" style="font-size: 41px;"></i>';                                        
                                    }
                                    else {
                                        # code...
                                        $arg_video  = 'lock';
                                        $file_video = "Maaf, video ini akan terbuka jika anda telah membeli paket bimbingan belajar";
                                        $lock       = '<i class="fa fa-lock" style="font-size: 41px;"></i>';                                    
                                    }
                                }
                            }
                            else {
                                # code...
                                $arg_video = 'NA';
                                $lock       = '<i class="fa fa-lock" style="font-size: 41px;"></i>';                            
                            }
    
                    ?>
                    <a class="row" onclick="view_video('<?=$arg_video;?>','<?=$child[$ii]['id'];?>','<?=$file_video;?>','<?=$child[$ii]['name'];?>')" style="margin: 0px;cursor: pointer;">                
                        <div class="col-lg-12" style="padding-left: 0px;">
                            <div class="box box-warning direct-chat direct-chat-warning" style="height: 120px;">
                                <div class="box-header with-border text-center" style="border-bottom: transparent;">
                                    <h3 class="box-title"><?=$child[$ii]['name'];?></h3>
                                </div>        
                                <div class="box-body">
                                    <div class="row text-center">
                                    <?=$lock;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>                
                    <?php
                        }                                            
                    ?>
                </div>
            </div>
        </div>
    </div>        
    <?php    
}
?>

<div class="container" id="detail_video_section" style="display:none;">
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <h3 class="pull-left" id="header_video_section"></h3>
        <div class="pull-right"><button class="btn btn-block btn-danger" id="closeData"><i class="fa fa-close"></i></button></div>    
    </div>
    <div class="col-lg-7 col-xs-12">
        <input type="hidden" id="oid_header" value="">				
        <video id="f_video_detail" width="854" height="480" controls controlsList="nodownload">
            <source id="f_source_detail" src="" type="video/mp4">
        </video>
    </div>
    <div id="headerdata" class="col-xs-5">
        <div class="clearfix">		
            <div class="chat">
                <div class="chat-header clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
                    
                    <div class="chat-about">
                        <div class="chat-with">Chat Dengan Admin</div>
                    </div>
                </div> <!-- end chat-header -->
                
                <div class="chat-history">
                    <ul id="list-chat">				                        
                    </ul>
                </div> <!-- end chat-history -->
                
                <div class="chat-message clearfix">
				<input type="hidden" id="oid_materi">                
                    <textarea name="message-to-send" id="message-to-send" placeholder ="Tulis pesan" rows="3"></textarea>				
                    <button class="btn btn-primary" id="btn-trigger-controll">Kirim</button>
                </div> <!-- end chat-message -->
            </div> <!-- end chat -->
        </div> <!-- end container -->
    </div>    
</div>

<script>
function view_video(arg,id,file,materi) {
    if (arg == 'NA') {
        Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					title: 'Peringatan',					
					msg: "Maaf, video tidak tersedia"
				});        
    } 
    else 
    {
        if (arg == 'lock') {
            Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
				{
					title: 'Peringatan',					
					msg: file
				});            
        }
        else if(arg == 'unlock')
        {
            var data_sender = {
                'oid_user'  : '<?=$this->session->userdata('session_user');?>',
                'oid_materi': id
            }
            $.ajax({
                url :"<?php echo site_url();?>user/zchat/get_chat_user",
                type:"post",
                data:{data_sender : data_sender},
                beforeSend:function(){
                    $("#loadprosess").modal('show');
                    $('#list-chat').html('');                                
                },			
                success:function(msg){
                    var obj = jQuery.parseJSON (msg);            
                    console.table(obj.chat);
                    console.log(materi);            
                    for (index = 0; index < obj.chat.length; index++) {
                        if (obj.chat[index].id_admin_sender == 0) {
                            var newrec  = '<li>'+
                                                '<div class="message-data">'+
                                                    '<span class="message-data-name"><i class="fa fa-circle online"></i> Admin</span>'+
                                                    '<span class="message-data-time">'+obj.chat[index].audit_time_insert+'</span>'+
                                                '</div>'+
                                                '<div class="message my-message">'+obj.chat[index].name+'</div>'+
                                            '</li>';
                            $('#list-chat').append(newrec);                    
                        }
                        else
                        {
                            var newrec  = '<li class="clearfix">'+
                                                '<div class="message-data align-right">'+
                                                    '<span class="message-data-time" >'+obj.chat[index].audit_time_insert+'</span> &nbsp; &nbsp;'+
                                                    '<span class="message-data-name" >Anda</span> <i class="fa fa-circle me"></i>'+
                                                '</div>'+
                                                '<div class="message other-message float-right">'+obj.chat[index].name+'</div>'+
                                            '</li>';
                            $('#list-chat').append(newrec);                    
                        }
                        // console.log(obj[index].name);
                    }
                    var source = '<?=base_url();?>public/video/'+file;
                    var f_video = document.getElementById('f_video_detail');
                    var f_source = document.getElementById('f_source_detail');
                    f_source.src = source;
                    f_video.load();
                    $("#loadprosess").modal('hide');            
                    $("#main_video_section").css({"display": "none"});
                    $("#detail_video_section").css({"display": ""});
                    $("#header_video_section").html(materi);
                    $("#oid_materi").val(id);                            
                }
            })  
        }        
        
    }
}
$(document).ready(function()
{
	$("#btn_type_1").click(function() {
		$("#type_2").addClass("hidden-xs");
		$("#type_2").addClass("hidden-sm");		
    $("#type_1").removeClass("hidden-xs");
    $("#type_1").removeClass("hidden-sm");		
		$("#type_2").css({"display": "none"})
		$("#type_1").css({"display": ""})				
	})

	$("#btn_type_2").click(function() {
		$("#type_1").addClass("hidden-xs");
		$("#type_1").addClass("hidden-sm");		
    $("#type_2").removeClass("hidden-xs");
    $("#type_2").removeClass("hidden-sm");		
		$("#type_2").css({"display": ""})
		$("#type_1").css({"display": "none"})				
	})	

	$("#closeData").click(function(){
		$("#detail_video_section").css({"display": "none"})
		$("#main_video_section").css({"display": ""})		
    })	

	$("#btn-trigger-controll").click(function(){
		var f_name = $("#message-to-send").val();
		var oid    = $("#oid_materi").val();

		var data_sender = {
			'f_name': f_name,
			'oid'   : oid,
			'crud'  : 'insert'
		}

		if (f_name.length <= 0) {
			// $("#formdata").css({"display": "none"})
		}
		else
		{
			$.ajax({
				url :"<?php echo site_url();?>user/zchat/send_message",
				type:"post",
				data:{data_sender : data_sender},
				beforeSend:function(){
					$("#loadprosess").modal('show');
				},
				success:function(msg){
					var newrec  = '<li class="clearfix">'+
										'<div class="message-data align-right">'+
											'<span class="message-data-time" ><?=date('d-m-Y');?></span> &nbsp; &nbsp;'+
											'<span class="message-data-name" >Anda</span> <i class="fa fa-circle me"></i>'+
										'</div>'+
										'<div class="message other-message float-right">'+f_name+'</div>'+
									'</li>';
					$('#list-chat').append(newrec);
					$("#message-to-send").val('');	
					$("#loadprosess").modal('hide');														
				},
				error:function(jqXHR,exception)
				{
					ajax_catch(jqXHR,exception);					
				}
			})
		}
	})    
});
</script>