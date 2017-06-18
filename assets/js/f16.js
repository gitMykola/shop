$(function(){
	var winh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    var winw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var screenProp = winw/winh;
	
	var deltaStartText = 0;
	
	$('#startSlide').css('min-height',winh);
	$(window).on('resize',function(){
		response();
		deltaStartText = 0;
	});
	$(window).on('orientationchange',function(){
		response();
		deltaStartText = 0;
	});
	$(window).on('scroll',function(){
		var bodyScroll = $('body').scrollTop();
		if (deltaStartText == 0) deltaStartText = $('#startSlide .nameText').position().top - $('#startSlide .startText').position().top - $('#startSlide .startText').outerHeight();
		$('.test').text(deltaStartText);
		if (bodyScroll > ((deltaStartText < 0)?0:deltaStartText)){
			$('#startSlide .startText').fadeOut();
			$('#startSlide > H1').fadeOut();
		}else{
			if($('#startSlide .startText').css('display') == 'none')$('#startSlide .startText').fadeIn();
			if($('#startSlide > H1').css('display') == 'none')$('#startSlide > H1').fadeIn();
		};
	});
	
})
function response(){
	var winh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    var winw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var screenProp = winw/winh;
	$('#startSlide').css('min-height',winh);
}	