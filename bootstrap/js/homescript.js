$(function(){
	var scrollAmount = 300;
	$(window).scroll(function(){
		
		if($(window).scrollTop() > scrollAmount){
			$('.scroll-up').fadeIn('slow');
		}

		else{
			$('.scroll-up').fadeOut('slow');
		}
	})


	$('.scroll-up').click(function(){
		$('html, body').animate({
			scrollTop: 0
		},700);
		return false;
	})
});