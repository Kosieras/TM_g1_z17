<html>
<head>
<meta http-equiv="refresh" content="10" />
</head>
<body>
<?php
$dbhost="localhost"; $dbuser="kosierap_z17"; $dbpassword="Laboratorium123"; $dbname="kosierap_z17"; $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$polaczenie) {
echo "Błąd połączenia z MySQL." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
}
$rezultat = mysqli_query($polaczenie," SELECT * FROM domeny") or die ("Błąd zapytania do bazy: $dbname"); print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>id</TD><TD>Host</TD><TD>Port</TD><TD>Stan</TD></TR>\n";
while ($wiersz = mysqli_fetch_array ($rezultat)) {
  $id = $wiersz[0];
  $host = $wiersz[1];
  $port = $wiersz[2];
  $fp = @fsockopen($host, $port, $errno, $errstr, 30);
  if($fp){$stan = "Ok";}else{$stan = "$errno $errstr";};
  print "<TR><TD>$id</TD><TD>$host</TD><TD>$port</TD><TD>$stan</TD></TR>\n";
}
print "</TABLE>"; mysqli_close($polaczenie);
?>
</body>
</html>