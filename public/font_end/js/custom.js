// page init
jQuery(function(){
  "use strict";
  tab_btns();
});
/*
         * ----------------------------------------------------------------------------------------
         *  CHANGE MENU BACKGROUND JS
         * ----------------------------------------------------------------------------------------
         */





 /* --------------------------------------------------------
	 JQUERY TYPED
	----------------------------------------------------------- */
    $(function(){
        "use strict";
        if($("#typed").length > 0 ) {
            $("#typed").typed({
                stringsElement: $('#typed-strings'),
                startDelay: 2000,
                typeSpeed: 50,
                backDelay: 500,
                loop: true,
                contentType: 'html', 
                loopCount: false,
            });
        };
    });


     $(function(){
        "use strict";
        if($("#typeds").length > 0 ) {
            $("#typeds").typed({
                stringsElement: $('#typed-strings2'),
                startDelay: 1000,
                typeSpeed: 50,
                backDelay: 500,
                loop: true,
                contentType: 'html', 
                loopCount: false,
            });
        };
    });

     $(function(){
        "use strict";
        if($("#typedss").length > 0 ) {
            $("#typedss").typed({
                stringsElement: $('#typed-strings3'),
                startDelay: 1000,
                typeSpeed: 50,
                backDelay: 500,
                loop: true,
                contentType: 'html', 
                loopCount: false,
            });
        };
    });


     $(function(){
        "use strict";
        if($("#typedsss").length > 0 ) {
            $("#typedsss").typed({
                stringsElement: $('#typed-strings4'),
                startDelay: 1000,
                typeSpeed: 50,
                backDelay: 500,
                loop: true,
                contentType: 'html', 
                loopCount: false,
            });
        };
    });


///////////////////////////////////////min Slider
  $('.custom-carousel').each(function(){
    var owl = jQuery(this),
      itemsNum = $(this).attr('data-appeared-items'),
      sliderNavigation = $(this).attr('data-navigation');
      
    if ( sliderNavigation == 'false' || sliderNavigation == '0' ) {
      var returnSliderNavigation = false
    }else {
      var returnSliderNavigation = true
    }
    if( itemsNum == 1) {
      var deskitemsNum = 1;
      var desksmallitemsNum = 1;
      var tabletitemsNum = 1;
    } 
    else if (itemsNum >= 2 && itemsNum < 4) {
      var deskitemsNum = itemsNum;
      var desksmallitemsNum = itemsNum - 1;
      var tabletitemsNum = itemsNum - 1;
    } 
    else if (itemsNum >= 4 && itemsNum < 8) {
      var deskitemsNum = itemsNum -1;
      var desksmallitemsNum = itemsNum - 2;
      var tabletitemsNum = itemsNum - 3;
    } 
    else {
      var deskitemsNum = itemsNum -3;
      var desksmallitemsNum = itemsNum - 6;
      var tabletitemsNum = itemsNum - 8;
    }
    owl.owlCarousel({
      slideSpeed : 300,
      stopOnHover: true,
      autoPlay: true,
      navigation : returnSliderNavigation,
      pagination: false,
      lazyLoad : true,
      items : itemsNum,
      itemsDesktop : [1000,deskitemsNum],
      itemsDesktopSmall : [900,desksmallitemsNum],
      itemsTablet: [600,tabletitemsNum],
      itemsMobile : true,
      /**transitionStyle : "goDown",**/
    });
  });
  /*----------------------------------------------------*/
  /*  Change Slider Nav Icons
  /*----------------------------------------------------*/
  
  $('.touch-slider').find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
  $('.touch-slider').find('.owl-next').html('<i class="fa fa-angle-right"></i>');
  $('.touch-carousel').find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
  $('.touch-carousel').find('.owl-next').html('<i class="fa fa-angle-right"></i>');



// 2.tab grou
function tab_btns () {
  if ($('.tab_group').length) {
    
    $('.tab_group').each(function () {
      var accrodionName = $(this).data('grp-name');
      var Self = $(this);
      Self.addClass(accrodionName);
      Self.find('.tab_butns .tab-content').hide();
      Self.find('.tab_butns.active').find('.tab-content').show();
      Self.find('.tab_butns').each(function() {

        $(this).find('.tab-title').on('click', function () {
          if ($(this).parent().hasClass('active') === false ) {         
            $('.tab_group.'+accrodionName).find('.tab_butns').removeClass('active');
            $('.tab_group.'+accrodionName).find('.tab_butns').find('.tab-content').slideUp();
            $(this).parent().addClass('active');          
            $(this).parent().find('.tab-content').slideDown();  
          };
        });
      });
    });
    
  };
}

(function ($) {
    "use strict"; // use strict to start

    var rambleApp = {
     
        /* ---------------------------------------------
         smooth scroll
         --------------------------------------------- */
        smoothscroll: function () {
            if (typeof smoothScroll == 'object') {
                smoothScroll.init();
            }
        },
       
        /* ---------------------------------------------
         Scroll top
         --------------------------------------------- */
        scroll_top: function () {
            
            var $scrolltop = $('#scroll-top');
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > $(this).height()) {
                    $scrolltop
                        .addClass('btn-show')
                        .removeClass('btn-hide');
                } else {
                    $scrolltop
                        .addClass('btn-hide')
                        .removeClass('btn-show');
                }
            });
            $("a[href='#top']").on('click', function () {
                $("html, body").animate({
                    scrollTop: 0
                }, "normal");
                return false;
            });
        },
        
        /* ---------------------------------------------
         Initialize All Function
         --------------------------------------------- */
        initializ: function () {
       
            rambleApp.scroll_top();
        }
    };
    /* ---------------------------------------------
     Document ready function
     --------------------------------------------- */
    $(function () {
        rambleApp.initializ();
    });
    /* ---------------------------------------------
     Without Document ready function
     --------------------------------------------- */
    rambleApp.contact_form();
})(jQuery);