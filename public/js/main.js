$(document).ready(function () {
   $.ajaxSetup({
      cache: false
      //type: "POST"
   });

   $('#radio').buttonset();
   $('#date').datepicker({ dateFormat:"yy-mm-dd" });
/*
   $( ".ui-datepicker" ).on( "mouseover", function() {
     $( this ).zIndex(99999);
   });

   $( "#ui-datepicker-div" ).hover(function() {
   	$('#ui-datepicker-div').zIndex(99999);
   });
*/

   $("#date").on( "click", function() {
   	$('#ui-datepicker-div').zIndex(99999);
   });

   // $('.ui-datepicker').css("z-index", 99999);
   // $.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
   $('#track').button();
   // $( "input[type=submit], a, button" ).button().click(function( event ) { event.preventDefault(); });
   $( '#locate' ).button().click(function( event ) { event.preventDefault(); });
/*
   $('.autoplay').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 4000,
   });
*/
});
