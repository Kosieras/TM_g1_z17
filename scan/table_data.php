<?php  
$dbhost = "localhost";
    $dbuser = "kosierap_z17";
    $dbpassword = "Laboratorium123";
    $dbname = "kosierap_z17";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny");
    echo "<table cellpadding=5 border=1>";
    echo "<tr><td>HOST</td><td>PORT</td><td>STAN</td></tr>\n";
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      $host = $wiersz[1];
      $port = $wiersz[2];
 $fp = @fsockopen($host, $port, $errno, $errstr, 30);
  if($fp){$stan = "Ok";}else{$stan = "$errno $errstr";};
      echo "<tr><td>$host</td><td>$port</td><td>$stan</td></tr>\n";
    }
    echo "</table>";
    mysqli_close($polaczenie);
?>