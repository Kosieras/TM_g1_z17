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
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
	<meta name="description" content="Twój Opis">
	<meta name="author" content="Twoje dane">
	<meta name="keywords" content="Twoje słowa kluczowe">
	<title>Kosierkiewicz</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<link rel="stylesheet" type="text/css" href="twoj_css.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="twoj_js.js"></script> 
</head>

<body onload="myLoadHeader()">
	<div id='myHeader'> </div>	
	<main> 
		<section class="sekcja1">	
			
          <center>
<div class="d-flex justify-content-center align-items-center mt-5" style="padding-top:100px">
        <div class="card">

             
          <h4>USUŃ HOSTA</h4>
                  <div class="form px-4" >

<form method="post" action="kasuj2.php">
  
    <div class="form-floating">
            <label for="floatingInpu">HOST</label><BR><br>
      
<select name="host" class="form-control" id="floatingInpu"><?php
  $dbhost="localhost"; $dbuser="kosierap_z17"; $dbpassword="Laboratorium123"; $dbname="kosierap_z17"; $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$polaczenie) {
echo "Błąd połączenia z MySQL." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
}
  if($_SESSION["user"] == "admin@google.com") $odbiorca = mysqli_query($polaczenie, "Select * from domeny") or die ("DB error: $dbname");
     else $odbiorca = mysqli_query($polaczenie, "Select * from domeny where user_id=".$_SESSION["user_id"]) or die ("DB error: $dbname");
    		
    		while ($row = mysqli_fetch_array ($odbiorca)){
    		$user_option = $row[1];
    		$user_idmt = $row[0];
   			print "<option value='$user_idmt'>$user_option</option>\n";   
			}?>
  		</select><br>
    </div>

<br>
    <button class="w-100 btn btn-lg btn-primary" type="submit" onClick="return emptyLogin()">USUŃ</button>
  <div id="alertLogin" style="color: red;"></div>
  </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                 

                  <div class="form px-4">

                   
                  </div>
                </div>
               </div>
</center>
          
          
          
		</section>
	</main>	
	<?php require_once 'footer.php'; ?>		
</body>
</html>