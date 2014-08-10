$(document).ready(function () {
   $.ajaxSetup({
      cache: false
      //type: "POST"
   });

   $('#radio').buttonset();
   $('#date').datepicker({ dateFormat:"yy-mm-dd" });
   $('#track').button();

   // $( "input[type=submit], a, button" ).button().click(function( event ) { event.preventDefault(); });
   $( '#locate' ).button().click(function( event ) { event.preventDefault(); });
});
