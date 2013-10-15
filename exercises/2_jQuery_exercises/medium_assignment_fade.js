$(document).ready(function() {


$('img').click(function(){
		$(this).fadeTo(250, 0.0);
	});

$('#restore').click(function(){
	$('img').fadeTo(250, 1.0);
})

});