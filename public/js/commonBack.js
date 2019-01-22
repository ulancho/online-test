// (function ($){

//     $.fn.bekeyProgressbar = function(options){

//         options = $.extend({
//         	animate     : true,
//           animateText : true
//         }, options);

//         var $this = $(this);
      
//         var $progressBar = $this;
//         var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
//         var $circle = $progressBar.find('.ProgressBar-circle');
//         var percentageProgress = $progressBar.attr('data-progress');
//         var percentageRemaining = (100 - percentageProgress);
//         var percentageText = $progressCount.parent().attr('data-progress');
      
//         //Calcule la circonférence du cercle
//         var radius = $circle.attr('r');
//         var diameter = radius * 2;
//         var circumference = Math.round(Math.PI * diameter);

//         //Calcule le pourcentage d'avancement
//         var percentage =  circumference * percentageRemaining / 100;

//         $circle.css({
//           'stroke-dasharray' : circumference,
//           'stroke-dashoffset' : percentage
//         })
        
//         //Animation de la barre de progression
//         if(options.animate === true){
//           $circle.css({
//             'stroke-dashoffset' : circumference
//           }).animate({
//             'stroke-dashoffset' : percentage
//           }, 3000 )
//         }
        
//         //Animation du texte (pourcentage)
//         if(options.animateText == true){
 
//           $({ Counter: 0 }).animate(
//             { Counter: percentageText },
//             { duration: 3000,
//              step: function () {
//                $progressCount.text( Math.ceil(this.Counter) + '%');
//              }
//             });

//         }else{
//           $progressCount.text( percentageText + '%');
//         }
      
//     };

// })(jQuery);
// $('.ProgressBar--animateAll').bekeyProgressbar();
// $('.ProgressBar--animateAll2').bekeyProgressbar();
// $('.ProgressBar--animateAll3').bekeyProgressbar();
// $('.ProgressBar--animateAll4').bekeyProgressbar();
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
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });

        $('#demo-pie-2').pieChart({
          barColor: '#5cb85c',
          trackColor: '#eee',
          lineCap: 'butt',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });

        $('#demo-pie-3').pieChart({
          barColor: '#5bc0de',
          trackColor: '#eee',
          lineCap: 'square',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
          }
        });

        $('#demo-pie-4').pieChart({
          barColor: '#f0ad4e',
          trackColor: '#eee',
          lineCap: 'round',
          lineWidth: 8,
          rotate: 90,
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
});