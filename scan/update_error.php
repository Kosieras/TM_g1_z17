
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
    	if($_SESSION["user"] == "admin@google.com") $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny");
     else $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny where user_id=".$_SESSION['user_id']);
   
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      $id = $wiersz[0];
      $host = $wiersz[1];
      $port = $wiersz[2];
      $error = $wiersz[4] + 1;
 $fp = @fsockopen($host, $port, $errno, $errstr, 30);
  if($fp){
   
    $stan = "Ok";
  }else{
    $usun = mysqli_query($polaczenie, "Update domeny set d=".$error." where id=".$id);
    	
    	
  };
    
    }
   
    mysqli_close($polaczenie);
?>
  </body>
</html>