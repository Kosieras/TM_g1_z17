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

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  </HEAD>
<BODY>
<?php
$user = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8"); 
$worker = htmlentities ($_POST['worker'], ENT_QUOTES, "UTF-8");
$user_id = $_SESSION["user_id"];
$link = mysqli_connect(localhost, kosierap_z17, Laboratorium123, kosierap_z17);

if(!$link) { echo"Error: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
mysqli_query($link, "SET NAMES 'utf8'");
 
     $sql = "Update users set worker=".$worker." where id=".$user.""; //Komenda MySQL do dodawania uzytkownika
    if (mysqli_query($link, $sql)) {
      echo "Zmieniono workera!";
	   header("Refresh: 1; URL=worker.php");
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($link); //Wyswietl blad z MySQL
}
 
 
?> </BODY> </html>