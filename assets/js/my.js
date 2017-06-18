$(function(){
	var winh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    var winw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var screenProp = winw/winh;
	
	$('.nav-menu li a').hover(function(){
		$(this.getElementsByTagName('DIV')[0]).addClass('nav-animation-hold-item');
	},function(){
		$(this.getElementsByTagName('DIV')[0]).removeClass('nav-animation-hold-item');
	});
	
	textRed = $('.f16-red').text();
	textRed = textRed.substring(0,1) + '<span class="f16-red-red">' + textRed.substring(1,2) 
	+ '</span>' + textRed.substring(2,textRed.length);
	$('.f16-red').html(textRed);
})