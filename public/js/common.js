$(window).scroll(function (){
   $('.progress').each(function (){
     var imagePos = $(this).offset().top;
     var topOfWindow = $(window).scrollTop();
     if (imagePos < topOfWindow+500) {
       $(document).ready(function () {
        $('.demo-pie-1').pieChart({
          barColor: '#337ab7',
          trackColor: '#eee',
          lineCap: 'round',
          lineWidth: 4,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });

        $('#demo-pie-2').pieChart({
          barColor: '#5cb85c',
          trackColor: '#eee',
          lineCap: 'butt',
          lineWidth: 4,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });

        $('#demo-pie-3').pieChart({
          barColor: '#5bc0de',
          trackColor: '#eee',
          lineCap: 'square',
          lineWidth: 4,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });

        $('#demo-pie-4').pieChart({
          barColor: '#f0ad4e',
          trackColor: '#eee',
          lineCap: 'round',
          lineWidth: 4,
          // rotate: 90,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });
      });
     }
   });
 });﻿
$(document).ready(function() {
	// $(window).scroll(function (){
	// 	$(' .advantagesList').each(function (){
	// 		var imagePos = $(this).offset().top;
	// 		var topOfWindow = $(window).scrollTop();
	// 		if (imagePos < topOfWindow+300) {
	// 			$(this).addClass('bounceInUp');
	// 		}
	// 	});
	// });﻿


	// -----
	$('.slider').bxSlider();
	// -----
	$(".regular").slick({
		dots: true,
		arrows:false,
		infinite: true,
		slidesToShow: 3,
		arrow:false,
		slidesToScroll: 3,
		responsive: [
		{
			breakpoint: 880,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});
	// -----
	$(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true,
        arrows:true
      });
  // -----
  $('.menu-toggle-icon').click(function(){
        $('.mob-links-overlay').toggleClass('open');
        $('body').toggleClass('overflowHid');
        $('.mob-menu').toggleClass('dNone');
        return false;
    });
 $('.mob-close').click(function(){
        $('.mob-links-overlay').removeClass('open');
        $('body').removeClass('overflowHid');
        $('.mob-menu').removeClass('dNone');
        return false;
    });
 (function($) {
  var dialog;
  $('.trigger').on('click', function() {
    dialog = $('#' + $(this).data('dialog'));
    $(dialog).addClass('dialog--open');
  });
  $('.action, .dialog__overlay').on('click', function() {
    $(dialog).removeClass('dialog--open');
    $(dialog).addClass('dialog--close');
    $(dialog).find('.dialog__content').on('webkitAnimationEnd MSAnimationEnd oAnimationEnd animationend', function() {
      $(dialog).removeClass('dialog--close');
    });
  });
})(jQuery);
});