<?php


 ?>

 <!DOCTYPE html >
 <html>
 <head>

   <title> Crime Buster </title>
   <script type="text/javascript">

   $.ajax({
       url: "https://data.baltimorecity.gov/resource/4ih5-d5d5.json",
       type: "GET",
       data: {
         "$limit" : 5000,
         "$$app_token" : "YOURAPPTOKENHERE"
       }
   }).done(function(data) {
     alert("Retrieved " + data.length + " records from the dataset!");
     console.log(data);
   });




   </script>



</head>
</html>
