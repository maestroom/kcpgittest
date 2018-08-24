<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title><?php echo (isset($this->pageTitle) && trim($this->pageTitle) != '') ? $this->pageTitle : "KCP Real Estate"; ?></title>
    
        
        <?php
                $cs        = Yii::app()->clientScript;
                $themePath = Yii::app()->theme->baseUrl;

                /* StyleSHeets */
                $cs->registerCssFile($themePath . '/assets/css/bootstrap.css');
                $cs->registerCssFile($themePath . '/assets/css/owl.carousel.css');
                $cs->registerCssFile($themePath . '/assets/css/owl.theme.css');
                $cs->registerCssFile($themePath . '/assets/css/owl.transitions.css');
                $cs->registerCssFile($themePath . '/assets/css/flexslider.css');
                $cs->registerCssFile($themePath . '/assets/css/main_style.css');
                $cs->registerCssFile($themePath . '/assets/css/font-awesome.min.css');
                
                $cs->registerCssFile($themePath . '/assets/dist/css/lightgallery.css');
              
                
				

                /* JavaScripts */
                $cs->registerCoreScript('jquery', CClientScript::POS_END);
                $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
                $cs->registerScriptFile($themePath . '/assets/js/bootstrap.min.js', CClientScript::POS_BEGIN);
                $cs->registerScriptFile($themePath . '/assets/js/owl.carousel.min.js', CClientScript::POS_BEGIN);
                $cs->registerScriptFile($themePath . '/assets/js/jquery.flexslider-min.js', CClientScript::POS_BEGIN);
                
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lightgallery.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-fullscreen.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-thumbnail.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-video.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-autoplay.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-zoom.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-hash.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lightbox/lg-pager.js', CClientScript::POS_BEGIN);
                 $cs->registerScriptFile($themePath . '/assets/lib/jquery.mousewheel.min.js', CClientScript::POS_BEGIN);
                              
    
          ?>
          
        <?php /*  SEO script from admin panel */ ?>
		<script type="application/ld+json"><?php echo (isset($this->seo_text) && trim($this->seo_text)!='') ? $this->seo_text: ""; ?></script>                 
        
        <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <!-- on key press numbers only function -->
        <script src="<?php echo Yii::app()->theme->baseUrl.'/assets'; ?>/js/custom.js"></script>
    
    </head>
<body>

    <!-- Top Bar -->
    <?php include Yii::app()->basePath.'/components/header.php'; ?>

    
    <?php echo $content; ?>


    <div class="spacer-60"></div>

    <!-- Footer -->	
    <?php include Yii::app()->basePath.'/components/footer.php'; ?>


    <!-- Script to Activate the Carousels -->
    <script type="text/javascript">
        $(document).ready(function () {
            'use strict';
            $("#owl-carousel").owlCarousel({
                items: 5,
                itemsDesktop: [1199, 5],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [768, 2],
                itemsMobile: [479, 1],
                navigation: true,
                navigationText: [
      "<i class='fa fa-chevron-left icon-white'></i>",
      "<i class='fa fa-chevron-right icon-white'></i>"
      ],
                autoPlay: false,
                pagination: false
            });

            
			
	$("#slide_pan").owlCarousel({
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1],
                navigation: true,
                navigationText: [
      "<i class='fa fa-chevron-left icon-white'></i>",
      "<i class='fa fa-chevron-right icon-white'></i>"
      ],
                autoPlay: false,
                pagination: false
            });

            $(".testim_sec").owlCarousel({
                items: 2,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1],
                navigation: true,
                navigationText: [
      "<i class='fa fa-chevron-left icon-white'></i>",
      "<i class='fa fa-chevron-right icon-white'></i>"
      ],
                autoPlay: false,
                pagination: false
            });


            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false
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




</body>
</html>

