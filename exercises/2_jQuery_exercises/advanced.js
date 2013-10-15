$(document).ready(function() {

  	$('.kitten').mouseenter(function(){
  		$(this).fadeOut(function(){  			
  			$(this).fadeIn('slow').attr('src', "http://placekitten.com/g/200/300");
  		});	
	});	

	$('.kitten').mouseleave(function(){
  		$(this).fadeOut(function() {
			$(this).fadeIn().attr('src',"http://placekitten.com/200/300");
		});
	});

	$('#add_user').click(function(click){
  		var first_name = $('#first_name').val();
  		var last_name = $('#last_name').val();
  		var email = $('#email').val();
  		var number = $('#number').val();
		$('#table tr:last').after('<tr><td>'+first_name+'</td><td>'+last_name+'</td><td>'+email+'</td><td>'+number+'</td></tr>');
		$('#form').each(function(){
			this.reset();
		});
		click.preventDefault();
	});
});



