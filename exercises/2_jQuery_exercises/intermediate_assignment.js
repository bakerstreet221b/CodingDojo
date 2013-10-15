$(document).ready(function() {

  	$( ".datepicker" ).datepicker();

  	$('#submit_date').click(function(){
  		var date1 = $('.date_from').val()
  		var date2 = $('.date_to').val()
		$('#result').html('<div class="alert alert-success">Your form information:<br>From: ' + date1 + '<br>To: ' + date2 + '</div<').show();
	});


});