$(document).ready(function(){
	$(function() {
	    $( "#sortable_pics" ).sortable();
	    $( "#sortable_pics" ).disableSelection();
	});
	$('#ninja1').click(function(){
		$(this).html('<img src="pics/cat1.png">');		
	});
	$('#ninja2').click(function(){
		$(this).html('<img src="pics/cat2.png">');		
	});
	$('#ninja3').click(function(){
		$(this).html('<img src="pics/cat3.png">');		
	});
	$('#ninja4').click(function(){
		$(this).html('<img src="pics/cat4.png">');		
	});
	$('#ninja5').click(function(){
		$(this).html('<img src="pics/cat5.png">');		
	});
});