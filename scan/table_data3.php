
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
    echo "<center><b><h1 style='color:red'>ODŚWIEŻANIE CO 1 SEKUNDĘ</h1></b></center>";
    echo "<table id='tabela1' cellpadding=5 border=1 class='table table-hover table-dark'>";
    echo "<thead><tr><th class='th-sm'>HOST</th><th class='th-sm'>PORT</th><th class='th-sm'>STAN</th><th class='th-sm'>ERROR</th><th class='th-sm'>ERROR TIME</th><th class='th-sm'>TOTAL ERRORS</th><th class='th-sm'>GRAPHIC</th></tr></thead><tbody>\n";
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      $id = $wiersz[0];
      $host = $wiersz[1];
      $port = $wiersz[2];
      $error = $wiersz[4];
	  $datetime = $wiersz[5];      
      $total_errors = $wiersz[6];
 $fp = @fsockopen($host, $port, $errno, $errstr, 30);
  if($fp){
    $stan = "Ok";
    $datetime = " - ";
    if($error == 0) $error = " - ";
   $usun = mysqli_query($polaczenie, "Update domeny set errors=0 where id=".$id);
  }else{
    $stan = "$errno $errstr";
	if($error == 0) {
     $date = date('Y-m-d H:i:s');
      $update = mysqli_query($polaczenie, "Update domeny set failure='".$date."' where id=".$id);
    }
     $error +=1;
     $total_errors +=1;
      $usun = mysqli_query($polaczenie, "Update domeny set total_errors=".$total_errors." where id=".$id);
   $total = mysqli_query($polaczenie, "Update domeny set errors=".$error." where id=".$id);

  };
     $hours = floor($total_errors / 3600); // liczba pełnych godzin
$minutes = floor(($total_errors % 3600) / 60); // liczba pełnych minut
$seconds = $total_errors % 60; // liczba pozostałych sekund
      echo "<tr><td>$host</td><td>$port</td><td>$stan</td><td>$error</td><td>$datetime</td><td>";
      
      if ($hours > 0) {
  echo "{$hours} godz. ";
}
if ($minutes > 0) {
  echo "{$minutes} min ";
}
       if($total_errors == 0) echo " - ";
else echo "{$seconds} sek";
      
     echo "</td><td style='max-height:50px'>";
     if( $error == 0 )echo "<img src='svg/good.svg'/>";
     if($error >1 && $error <= 20) echo "<img src='svg/error.svg'/>";
     if($error >20)echo "<iframe class='anim' src='svg/error_anim.svg' scrolling='no'></iframe>";
       if($error >40)$_SESSION["alert"] = 1;
      else $_SESSION["alert"] = 0;
     echo "</td></tr>\n";
    }
    echo "</tbody></table>";



    mysqli_close($polaczenie);
?>
  </body>
</html>