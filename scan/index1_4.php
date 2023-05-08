<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
  	header('Location: index.php'); //Powrot do panelu logowania
	exit(); 
}
  ?>
<html>
<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
</head>
<body>
<div id="wynik"></div>
</body>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>

  $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "table_data2.php",
					success: function(result) {
						$("#wynik").html(result);
					}
				});
			}, 1000); // odświeżaj co sekundę
		});
      
  </script>
   
  
  
</html>