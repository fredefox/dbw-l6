$(document).ready(function() {
	$(".navbar li a").click(function() {
		$(this).parent().addClass("active");
		$(this).parent().siblings().removeClass("activ");
	});
});
