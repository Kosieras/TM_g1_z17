
<html>
  <head>
  </head>
  <body>
    

<?php
    session_start();
$dbhost = "localhost";
    $dbuser = "kosierap_z17";
    $dbpassword = "Laboratorium123";
    $dbname = "kosierap_z17";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    	if($_SESSION["user"] == "admin@google.com") $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny where errors>0");
     else $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny where user_id=".$_SESSION['user_id']." and errors>0");
    echo "<h2>NIEDZIAŁAJĄCE USŁUGI</h2>";
    echo "<img style='max-height:50px' src='svg/error.svg'/>";
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      $id = $wiersz[0];
      $host = $wiersz[1];
      $port = $wiersz[2];
 $fp = @fsockopen($host, $port, $errno, $errstr, 30);
  if($fp){
    $stan = "Ok";
    
 
  }else{
    $stan = "$errno $errstr";
	
    }
       echo "<h4><a style='color:red'>$host</a> o porcie $port -> status:<a style='color:red'> $stan</a>";
      
     
    
    echo "</h4>";
  };
   
     



    mysqli_close($polaczenie);
?>
  </body>
</html>