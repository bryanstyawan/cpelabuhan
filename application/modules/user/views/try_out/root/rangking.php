<style>
    .pagination{

        padding:20px;

        &,
        *{
        user-select: none;
        }

        a{
        display:inline-block;
        padding:0 10px;
        cursor:pointer;
        &.disabled{
            opacity:.3;
            pointer-events: none;
        cursor:not-allowed;
        }
        &.current{
            background:#f3f3f3;
        }
        }
    }

    .div_row_header
    {
        border: 1px solid #f4f4f4;
    }

    .div_row_header > div
    {
        padding: 10px;        
        border-right: 1px solid #f4f4f4;
    }    
    
    .div_row_table
    {
        border: 1px solid #f4f4f4;
        padding:10px;        
    }

    .div_row_table > div 
    {

    }

    .row .label-primary
    {
        padding: 10px 0px 10px 0px;
        margin-bottom: 10px;        
    }

</style>


<?php
$posisitin_rangking_user     = 0;
$posisitin_rangking_username = "";
$tipe                        = $tipe;
?>
<?=$this->load->view('templates/sidebar/main');?>
<section>
    <?php
        if ($this->uri->segment(4) != '') {
            # code...
            if ($this->uri->segment(5) != '') {
                # code...
    ?>
                <div class="col-xs-7">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" id="table_fill">
                            <div class="box-body">
                                <div class="col-lg-12 div_row_header">
                                    <div class="col-lg-1">No</div>
                                    <div class="col-lg-2">Nama</div>
                                    <div class="col-lg-2">Asal Sekolah</div>                                    
                                    <?php
                                        if ($parent == 2) {
                                            # code...
                                    ?>
                                            <div class="col-lg-1">TWK</div>
                                            <div class="col-lg-1">TIU</div>
                                            <div class="col-lg-1">TKP</div>
                                            <div class="col-lg-2">Total Nilai</div>
                                            <div class="col-lg-2" style="border-right: none;">Keterangan</div>                                                                                                                                    
                                    <?php
                                        }
                                        else {
                                            # code...
                                    ?>
                                            <div class="col-lg-2">TPA</div>
                                            <div class="col-lg-2">TBI</div>
                                            <div class="col-lg-1">Total Nilai</div>
                                            <div class="col-lg-2" style="border-right: none;">Keterangan</div>                    
                                    <?php
                                        }
                                    ?>
                                </div>            
                                <?php
                                    if ($list_rangking != 0) {
                                        # code...
                                        for ($i=0; $i < count($list_rangking); $i++) { 
                                            # code...
                                            if ($list_rangking[$i]->id_user == $this->session->userdata('session_user')) {
                                                # code...
                                                $posisitin_rangking_user = $i+1;
                                                $posisitin_rangking_username = $list_rangking[$i]->b_name;                                    
                                            }
                                    ?>
                                    <div class="col-lg-12 div_row_table">
                                        <div class="col-lg-1"><?=$i+1;?></div>
                                        <div class="col-lg-2"><?=$list_rangking[$i]->b_name;?></div>                    
                                        <div class="col-lg-2"><?=$list_rangking[$i]->b_asal_sekolah;?></div>                
                                        <?php
                                            if ($parent == 2) {
                                                # code...
                                        ?>
                                                <div class="col-lg-1"><?=$list_rangking[$i]->twk_value;?></div>
                                                <div class="col-lg-1"><?=$list_rangking[$i]->tiu_value;?></div>
                                                <div class="col-lg-1"><?=$list_rangking[$i]->tkp_value;?></div>
                                                <div class="col-lg-2"><?=$list_rangking[$i]->total_value;?></div>
                                                <div class="col-lg-2"><?=$list_rangking[$i]->end_status;?></div>                                                                                                                                    
                                        <?php
                                            }
                                            else {
                                                # code...
                                        ?>
                                                <div class="col-lg-2">
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Benar : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tpa_true;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Salah : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tpa_false;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Kosong : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tpa_empty;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Nilai : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tpa_value;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-11">Keterangan : </div>
                                                        <div class="col-lg-1"><?=$list_rangking[$i]->tpa_status;?></div>                                            
                                                    </div>                                                                                                                                                        
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Benar : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tbi_true;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Salah : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tbi_false;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Kosong : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tbi_empty;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-7">Nilai : </div>
                                                        <div class="col-lg-4"><?=$list_rangking[$i]->tbi_value;?></div>                                            
                                                    </div>
                                                    <div class="row label-primary">
                                                        <div class="col-lg-11">Keterangan : </div>
                                                        <div class="col-lg-1"><?=$list_rangking[$i]->tbi_status;?></div>                                            
                                                    </div>                                                                                                                                                        
                                                </div>
                                                <div class="col-lg-1"><?=$list_rangking[$i]->total_value;?></div>
                                                <div class="col-lg-2"><?=$list_rangking[$i]->end_status;?></div>
                                        <?php
                                            }
                                        ?>                    
                                    </div>        
                                    <?php
                                        }                        
                                    }
                                    else {
                                        # code...
                                ?>
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Data tidak ditemukan</h3>
                                    </div>
                                <?php                            
                                    }
                                ?>                                
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>

                <div class="col-xs-3">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Statistik User</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" id="table_fill">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        Rangking :
                                    </div>        
                                    <div class="col-lg-8">
                                        <?=$posisitin_rangking_user;?>
                                    </div>            
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        Nama :
                                    </div>        
                                    <div class="col-lg-8">
                                        <?=$posisitin_rangking_username;?>
                                    </div>            
                                </div>                    
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>    
    <?php
            }
            else
            {
                load_paket_rangking($tipe);
            }
        }
        else {
            # code...
            load_paket_rangking($tipe);
        }
    ?>
</section>
<script>
(function($) {
	var pagify = {
		items: {},
		container: null,
		totalPages: 1,
		perPage: 3,
		currentPage: 0,
		createNavigation: function() {
			this.totalPages = Math.ceil(this.items.length / this.perPage);

			$('.pagination', this.container.parent()).remove();
			var pagination = $('<div class="pagination col-lg-12"></div>').append('<a class="nav prev disabled btn btn-primary" style="margin-right: 10px;" data-next="false">&nbsp;<</a>');

			for (var i = 0; i < this.totalPages; i++) {
				var pageElClass = "page";
				if (!i)
					pageElClass = "page current";
				var pageEl = '<a class="' + pageElClass + ' btn btn-primary" style="margin-right: 10px;" data-page="' + (
				i + 1) + '">' + (
				i + 1) + "</a>";
				pagination.append(pageEl);
			}
			pagination.append('<a class="nav next btn btn-primary" data-next="true">&nbsp;></a>');

			this.container.after(pagination);

			var that = this;
			$("body").off("click", ".nav");
			this.navigator = $("body").on("click", ".nav", function() {
				var el = $(this);
				that.navigate(el.data("next"));
			});

			$("body").off("click", ".page");
			this.pageNavigator = $("body").on("click", ".page", function() {
				var el = $(this);
				that.goToPage(el.data("page"));
			});
		},
		navigate: function(next) {
			// default perPage to 5
			if (isNaN(next) || next === undefined) {
				next = true;
			}
			$(".pagination .nav").removeClass("disabled");
			if (next) {
				this.currentPage++;
				if (this.currentPage > (this.totalPages - 1))
					this.currentPage = (this.totalPages - 1);
				if (this.currentPage == (this.totalPages - 1))
					$(".pagination .nav.next").addClass("disabled");
				}
			else {
				this.currentPage--;
				if (this.currentPage < 0)
					this.currentPage = 0;
				if (this.currentPage == 0)
					$(".pagination .nav.prev").addClass("disabled");
				}

			this.showItems();
		},
		updateNavigation: function() {

			var pages = $(".pagination .page");
			pages.removeClass("current");
			$('.pagination .page[data-page="' + (
			this.currentPage + 1) + '"]').addClass("current");
		},
		goToPage: function(page) {

			this.currentPage = page - 1;

			$(".pagination .nav").removeClass("disabled");
			if (this.currentPage == (this.totalPages - 1))
				$(".pagination .nav.next").addClass("disabled");

			if (this.currentPage == 0)
				$(".pagination .nav.prev").addClass("disabled");
			this.showItems();
		},
		showItems: function() {
			this.items.hide();
			var base = this.perPage * this.currentPage;
			this.items.slice(base, base + this.perPage).show();

			this.updateNavigation();
		},
		init: function(container, items, perPage) {
			this.container = container;
			this.currentPage = 0;
			this.totalPages = 1;
			this.perPage = perPage;
			this.items = items;
			this.createNavigation();
			this.showItems();
		}
	};

	// stuff it all into a jQuery method!
	$.fn.pagify = function(perPage, itemSelector) {
		var el = $(this);
		var items = $(itemSelector, el);

		// default perPage to 5
		if (isNaN(perPage) || perPage === undefined) {
			perPage = 3;
		}

		// don't fire if fewer items than perPage
		if (items.length <= perPage) {
			return true;
		}

		pagify.init(el, items, perPage);
	};
})(jQuery);

$(".container").pagify(6, ".col-lg-12");

</script>