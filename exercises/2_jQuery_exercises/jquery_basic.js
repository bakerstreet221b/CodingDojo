$(document).ready(function() {

	
    $( "#accordion" ).accordion();
  	
  	$( ".datepicker" ).datepicker();
  	
    $( "#dialog" ).dialog();
  	
    $( "#tabs" ).tabs();

	$('#btn1').click(function() {
		$(this).addClass('pink');
	});
	$('#btn_push').click(function(){
		$('#btn_push').after('<div class="alert alert-success"><b>Yay!</b> It worked. You just appended this element to the document and all with just one click!</div>');
	});
	$('#append').click(function(){
		$('#append').append(' <span class="glyphicon glyphicon-ok red"></span>')
	});
	$('#btn_kitten').click(function(){
		$('#btn_kitten').before('<img src="http://placekitten.com/g/300/200"><br><br>');
	});
	$('#btn1').focus(function() {
		$(this).css('outline-color', '#D8005F');
	});
	$('.cube').hover(function(){
		$(this).toggleClass('green');
	});
	$('#btn_hide').click(function(){
		$('.cubebox').hide();
	});
	$('#btn_show').click(function(){
		$('.cubebox').show();
	});
	$('#btn_slideDown').click(function(){
		$('.slide').slideDown('slow');
	});
	$('#btn_slideUp').click(function(){
		$('.slide').slideUp('slow');
	});
	$('#btn_slideToggle').click(function(){
		$('.slide').slideToggle('fast');
	});
	$('#btn_fadeIn').click(function(){
		$('.faDe').fadeIn('slow');
	});
	$('#btn_fadeOut').click(function(){
		$('.faDe').fadeOut('slow');
	});
	$( "#btn_input" ).focus(function() {
		$(this).css('outline-color', '#63DD8D')
	});
	$( '#email' ).focus(function() {
		$(this).css('outline-color', '#63DD8D')
	});
	$( "#btn_input" ).click(function() {
  		var text = $('#email').val();
  		$( "#p_email" ).append( text );
  	});
  	$('#text_submit').submit(function(event){
  		alert("success");
  		$('#text_span').text( $('#text_box').val() ).show();
  		event.preventDefault();
  	});
// 	$( "button" ).click(function() {
//   var text = $( this ).text();
//   $( "input" ).val( text );
// });
	$( "check1" ).change(function() {
	    var $input = $( "check1" );
	    $( "p" ).html( ".attr( 'checked' ): <b>" + $input.attr( "checked" ) + "</b><br>" +
	      ".prop( 'checked' ): <b>" + $input.prop( "checked" ) + "</b><br>" +
	      ".is( ':checked' ): <b>" + $input.is( ":checked" ) + "</b>" );
	})
	$( "check1" ).change();

	function showValues() {
	    var str = $( "form" ).serialize();
	    $( "#results" ).text( str );
	}
	$( "input[type='checkbox'], input[type='radio']" ).on( "click", showValues );
	$( "select" ).on( "change", showValues );
	showValues();
	
});