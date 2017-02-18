jQuery(function ($) {
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	var msViewportStyle = document.createElement('style')
	msViewportStyle.appendChild(
		document.createTextNode(
			'@-ms-viewport{width:auto!important}'
		)
	)
	document.querySelector('head').appendChild(msViewportStyle)
}



$('.count').css('opacity', 0);

var eventFired = false,
objectPositionTop = $('#fixed-bg').offset().top - 300;

$(window).on('scroll', function() {

 var currentPosition = $(document).scrollTop();

 if (currentPosition > objectPositionTop && eventFired === false) {
    console.log($(window).scrollTop());
    eventFired = true;
        $('.count').css('opacity', 1);
    start_count();
 }

});

function start_count(){

$('.count').each(function () {
	$(this).prop('Counter',0).animate({
		Counter: $(this).text()
	}, {
		duration: 4000,
		easing: 'swing',
		step: function (now) {
			$(this).text(Math.ceil(now));
		}
	});
});
}
//<span class="count">200</span>/
});