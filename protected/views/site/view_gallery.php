
<link href="<?php echo Yii::app()->theme->baseUrl.'/assets/css/jquery.bxslider.css'; ?>" rel="stylesheet">
<script src="<?php echo Yii::app()->theme->baseUrl.'/assets/js/jquery.bxslider.min.js'; ?>"></script>


<!-- Header bradcrumb -->
    <header class="bread_crumb">
        <div class="pag_titl_sec">
            <h1 class="pag_titl"> Gallery </h1>
            <h4 class="sub_titl">  </h4>
        </div>
        <div class="pg_links">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Home </a> </p>
                        <p class="lnk_pag"> / </p>
                        <p class="lnk_pag"> Photo Gallery </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="lnk_pag"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> Go Back to Home </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    

    <div class="spacer-60"></div>
    <div class="container">
        <div class="row">
            
            
        <p class="text-right"><a href="<?php echo Yii::app()->createUrl('site/gallery'); ?>"> Go Back to Gallery </a> </p>
        <section id="photosection" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <h4><?php echo $model->title;?></h4>
                    <hr>

                    <div class="pro_gallery">
                        <ul id="lightgallery" class="list-unstyled row">
                        <?php    
                            if(!empty($get_property_photos))
                            {
                                foreach($get_property_photos as $photos)
                                {
                           ?>
                                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="<?php echo Yii::app()->baseUrl.$photos->path; ?>, <?php echo Yii::app()->baseUrl.$photos->path; ?>, <?php echo Yii::app()->baseUrl.$photos->path; ?>" data-src="<?php echo Yii::app()->baseUrl.$photos->path; ?>">
                                     <a href="" class="border_box">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.$photos->path; ?>">
                                    </a>
                                </li>
                        <?php
                                }
                            }
                            else
                            {
                                echo "No result found!";
                            }
                        ?>
                                </ul>
                    </div>               


                    </div>
                </div>
            </div>
        </section>
        
	<div class="spacer-30"></div>
	
	
        </div>
    </div>
    
    
    
    <script>
        /* Product Slider Codes */
        $(document).ready(function () 
        {
            'use strict';

            $('#prop_slid').bxSlider({
                pagerCustom: '#slid_nav'
            });
			
			$('ul.drop_menu [data-toggle=dropdown]').on('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollToTop').fadeIn();
				} else {
					$('.scrollToTop').fadeOut();
				}
			});
			
			
			$('.scrollToTop').click(function(){
				$('html, body').animate({scrollTop : 0},800);
				return false;
			});
			});
    </script>
    
    <script type="text/javascript">
	$(document).ready(function () {

    var menu = $('.menu');
    var origOffsetY = menu.offset().top;

    function scroll() {
        if ($(window).scrollTop() >= origOffsetY) {
            $('.menu').addClass('sticky');
            $('.content').addClass('menu-padding');
        } else {
            $('.menu').removeClass('sticky');
            $('.content').removeClass('menu-padding');
        }


    }

    document.onscroll = scroll;

});
	</script>