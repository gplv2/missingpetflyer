$(document).ready(function () {
   $.ajaxSetup({
      cache: false
      //type: "POST"
   });

   $("#radio" ).buttonset();
   $('#date').datepicker({ dateFormat:"yy-mm-dd" });
});
