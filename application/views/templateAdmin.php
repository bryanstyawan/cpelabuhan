<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Controlling Pelabuhan</title>

<!--  favicon
    <link rel="shortcut icon" href="<?php echo base_url();?>assets_home/logo.png"> 
-->

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css'; ?>");</style>
<!-- Gauge -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/jqWidget/css/jqx.base.css'; ?>");</style>
<!-- Font Awesome -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/font/css/font-awesome.min.css'; ?>");</style>
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/ionicons/css/ionicons.min.css'; ?>");</style>
<!-- Theme style -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css'; ?>");</style>
<!-- AdminLTE Skins. Choose a skin from the css/skins
 folder instead of downloading all of them to reduce the load. -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css'; ?>");</style>
<!-- iCheck -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/iCheck/flat/blue.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/iCheck/all.css'; ?>");</style>
<!-- Morris chart -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/morris/morris.css'; ?>");</style>
<!-- jvectormap -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>");</style>
<!-- Date Picker -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/datepicker/css/bootstrap-datepicker3.css'; ?>");</style>
<!-- Date Picker -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css'; ?>");</style>
<!-- Daterange picker -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker-bs3.css'; ?>");</style>
<!-- Select2 -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/select2/select2.min.css'; ?>");</style>
<!-- Lobi box -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/lobibox/dist/css/Lobibox.min.css'; ?>");</style>
<!-- DataTables -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css'; ?>");</style>
<!-- Tour guide -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/bootstrap/css/bootstrap-tour.min.css'; ?>");</style>
<!-- bootstrap wysihtml5 - text editor -->
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/loadme/style/loadme.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'assets/css/mobile/mobile-base.css'; ?>");</style>
<!-- Jquery -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- CKeditors -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/ckeditor5/ckeditor.js"></script>
<style>
.footer-icon > i
{
  background: #fff;
  color: #00a85a;
  padding: 10px;
  border-radius: 50%;
  font-size: 15px;
}
.footer-icon
{
  color: #fff;
}

.footer-icon > label
{
  padding-left: 10px;
}

.main_background
{
    /* background-image: url(<?php echo base_url() . 'assets/images/web_backgound.jpg'; ?>)!important; */
    background-size: cover!important;
    background-position: 50% 50%!important;
}

.main_text_menu
{
    margin: 0px;
    z-index: 100;
    position: absolute;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    top: 115px;    
}
</style>
<script type="text/javascript">
/*********************************************************************************************/
/* function = getCookie(cname)
/* used for = get data to cookie
/*
/*********************************************************************************************/
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1);
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
  }
  return "";
}

/*********************************************************************************************/
/* function = current_date()
/* used for = get current date
/*
/*********************************************************************************************/
function change_format_date(arg,param) {
    var newdate = '';
    if (param == 'yyyy-mm-dd') {
        var date    = arg;
        var d       = new Date(date.split("-").reverse().join("-"));
        var dd      = d.getDate();
        var mm      = d.getMonth()+1;
        if (mm < 10) mm = '0'+mm;
        if (dd < 10) dd = '0'+dd;        
        var yy      = d.getFullYear();
        newdate = yy+"-"+mm+"-"+dd;
    }
    // console.log(newdate);
    return newdate;
}

function current_date() {
    // body...
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    if(month < 10)month = '0'+month;
    if(day < 10)day = '0'+day;    

    // var output = d.getFullYear() + '-' +
    //     ((''+month).length<2 ? '0' : '') + month + '-' +
    //     ((''+day).length<2 ? '0' : '') + day;
    var output = d.getFullYear() + '-' + month + '-' + day;

    return output;
}

$(document).ready(function()
{
    $('.timerange').datepicker({
        maxDate: new Date,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        daysOfWeekHighlighted: "0,6"
    });

    $('.timerangewithtime').datetimepicker({
        // maxDate: new Date,
        // format: 'dd-mm-yyyy',
        // todayHighlight: true,
        // daysOfWeekHighlighted: "0,6"
    });    

    $(".timerange").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

    $("#noti-tab").click(function(){
        // body...
        show_time = $(".noti-container").css('display');
        if (show_time == 'none')
        {
          $.ajax({
              url :"<?php echo site_url()?>dashboard/delete_common_notify/notify",
              type:"post",
              success:function(msg){
              }
          })
        }
    })
});


$(document).click(function(e) {
    $("#viewnavbarcontent").attr("class", "fa fa-navicon");            
    show_time = $(".noti-container").css('display');
    if (show_time == 'block')
    {
        $(".noti-container").css({"display": "none"});
    }
});

</script>
</head>
<body class="hold-transition skin-red-kemendagri sidebar-mini">
    <div class="wrapper">

        <header class="main-header" style="position:fixed;width:100%;">
            <?php menu_header();?>
        </header>

        <aside class="content-mobile main-sidebar hidden-sm hidden-xs">
            <section class="sidebar" style="height: auto;">
                <ul class="sidebar-menu tree" data-widget="tree">
                    <?php menuSamping();?>
                </ul>
            </section>        
        </aside>

        <div class="content-wrapper main_background">
			<section class="content">
                <?php
                    if(isset($subtitle) != '')
                    {
                ?>
                <h1 class="row main_background">
                    <?php echo $title;?>
                    <i id="subtitle">
                        <small> <?php if(isset($subtitle)){ echo $subtitle;} ?></small>
                    </i>
                </h1>                                
                <?php
                    }
                ?>
    			<div class="row main_background">                    
                    <section>
                        <div class="col-xs-12" style="margin-top: 10px;">
                            <div class="box" style="background: none;border-top: none;box-shadow: none;margin-bottom: 0px;">
                                <div class="box-header">
                                    <h2 style="font-size: 30px;font-weight: 600;" class="box-title">
                                        <?php echo $title;?>
                                        <i id="subtitle">
                                            <small> <?php if(isset($subtitle)){ echo $subtitle;} ?></small>
                                        </i>                                                    
                                    </h3>
                                </div>
                            </div>                    
                        </div>                    
                    </section>                                                
                    <?php $this->load->view($content);?>
    			</div>
            </section>
        </div>    
    </div>

    <footer class="main-footer" style="margin-left:0px;background-color: #00a85a;padding:26px!important;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center" style="color:#fff;">
                            <span>Copyright@2019. </span>
                            <span>V.1.0.0-Alpha</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>    
</body>
</html>

<div class="example-modal">
    <div class="modal modal-success fade" id="loadprosess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="box-content">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div style="margin-top: 320px;">
                            <div class="loadme-rotateplane"></div>
                            <div class="loadme-mask"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


<!-- jQuery UI 1.11.4 -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Moment.js dari cdn -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/daterangepicker/moment.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.5 -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts  -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
<!-- InputMask -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.bundle.js" type="text/javascript"></script> -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


<!-- Sparkline -->
<!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/sparkline/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- daterangepicker -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- datetimepicker -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- Lobi box -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/lobibox/js/Lobibox.js"></script>
<!-- AUTO numeric -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/autonumeric/autoNumeric.js"></script>
<!-- Select2 -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>

<!-- iCheck 1.0.1 -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FLOT CHARTS -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- tour guide -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-tour.min.js"></script>
<!-- DataTables -->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  /*********************************************************************************************/
/* function = numberWithCommas(x)
/* used for = give comma in number
/*
/*********************************************************************************************/
// _force();
function _force() {
	document.addEventListener('contextmenu', event => event.preventDefault());
	document.onkeydown = function(e) {
		if(event.keyCode == 123) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
			return false;
		}
		if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
			return false;
		}
	}    
}

function cara_beli() {
	Lobibox.window({
            title  : 'Cara Membeli Token',
            content:    '<div class="container">'+    
                        '<div class="col-lg-12">'+
                        '<div><div class="row"><h3>cara membeli token</h3></div>'+
                        '<div class="row"><span class="col-lg-3">1. Token dapat dibeli melalui :</span></div>'+
                        '<div class="row"><p class="col-lg-3">a. Whatsapps :</p></div>'+
                        '<div class="row"><p class="col-lg-3"><span>- 0858 5181 6987 (Kak Saka)</span></p></div>'+
                        '<div class="row"><p class="col-lg-3"><span>- 0812 4915 2180 (Kak Arief)</span></p></div>'+                                                
                        // '<div class="row"><p>b. Shopee : <a href="https://shopee.co.id/PAKET-LULUS-SPMB-PKN-STAN-ECODU-i.63017014.1896730820">Klik Disini</a></p></div>'+
                        '<div class="row"><p class="col-lg-3">b. LINE : @ecodu.id</p></div>'+
                        '<div class="row"><p class="col-lg-3">2. Setelah mendapatkan token, klik tombol beli sekarang dan masukkan token.</p></div>'+
                        '<div class="row"><span class="col-lg-3">3. Verifikasi Token.</span></div>'+
                        '<div class="row"><span class="col-lg-3">4. Selesai.</span></div>'+
                        '</div></div>'  
        }); 	
}


function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function ajax_status(obj)
{
    if (obj.status == 1)
    {
        Lobibox.notify('success', {msg: obj.text});
        setTimeout(function(){
            $("#loadprosess").modal('hide');
            setTimeout(function(){
                location.reload();
            }, 500);
        }, 500);
    }
    else
    {
        $("#loadprosess").modal('hide');        
        Lobibox.notify('warning', {msg: obj.text});
    }
}

function convertDate(dateString){
    var p = dateString.split(/\D/g)
    return [p[2],p[1],p[0] ].join("-")
}

function ajax_catch(jqXHR,exception) {

    if (jqXHR.status === 0) 
    {
        Lobibox.notify('error', {
            title: 'ERROR '+jqXHR.status,
            msg: 'Not connect.\n Verify Network.'
        });        
        alert('');
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
        }, 500);
    }, 500);    
}

    $(document).ready(function(){        

        $(".closeData").click(function(){
            $("#formdata").css({"display": "none"})
            $("#timelinedata").css({"display": "none"})
            $("#forensikdata").css({"display": "none"})				
            $("#viewdata").css({"display": ""})		
        })

        $(".table-view").DataTable({
            // "oLanguage": {
            //     "sSearch"    : "Pencarian :",
            //     "sInfoEmpty" : "",
            //     "sLengthMenu": "Show _MENU_ entries",
            //     "oPaginate"  : {
            //         "sFirst"   : "Halaman Pertama",       // This is the link to the first page
            //         "sPrevious": "Halaman Sebelumnya",    // This is the link to the previous page
            //         "sNext"    : "Halaman Selanjutnya",   // This is the link to the next page
            //         "sLast"    : "Halaman Terakhir"       // This is the link to the last page
            //     },
            //     "sSearchPlaceholder": "Ketik untuk mencari",
            //     "sLengthMenu"       : "Menampilkan &nbsp; _MENU_ &nbsp;Data",
            //     "sInfo"             : "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            //     "sZeroRecords"      : "Data tidak ditemukan"
            // },
            "dom": "<'row'<'col-sm-6'f><'col-sm-6'l>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "bSort": false

            // "dom": '<"top"f>rt'
            // "dom": '<"top"fl>rt<"bottom"ip><"clear">'
        });

        ClassicEditor
            .create( document.querySelector( '.editor-classic' ) )
            .catch( error => {
                console.error( error );
            } );        
    });
</script>