<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  </HEAD>
<BODY>
<?php
$host = htmlentities ($_POST['host'], ENT_QUOTES, "UTF-8"); 
$port = htmlentities ($_POST['port'], ENT_QUOTES, "UTF-8");
$link = mysqli_connect(localhost, kosierap_z17, Laboratorium123, kosierap_z17);

if(!$link) { echo"Error: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
mysqli_query($link, "SET NAMES 'utf8'");
 
     $sql = "INSERT INTO domeny (host,port) VALUES ('$host', '$port');"; //Komenda MySQL do dodawania uzytkownika
    if (mysqli_query($link, $sql)) {
      echo "Dodano HOST o podanym porcie!";
	   header("Refresh: 1; URL=dodaj1.php");
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($link); //Wyswietl blad z MySQL
}
 }
 
?> </BODY> </html>