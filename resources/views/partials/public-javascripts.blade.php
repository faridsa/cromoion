<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed&display=swap" rel="stylesheet"> 
<script src="{{ asset('js/app.js') }}"></script>

<script>
	jQuery(document).ready(function ($) {

		/*$(".dismissable").delay(6000).slideUp();*/

		var menu = $('.navbar');
		var origOffsetY = $('header').innerHeight();
		$('.back-top').click(function(){
			$("html, body").animate({
				scrollTop: $('body').offset().top
			});
		});
		$('body').css('padding-top',origOffsetY);
	});     

window.onload = function() {
  AOS.init({
	  disable: 'phone', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
	  duration: 600, // values from 0 to 3000, with step 50ms
	});

  var shareBtn = document.querySelector(".share-email");


};
</script>
