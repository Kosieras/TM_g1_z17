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
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
	<meta name="description" content="Twój Opis">
	<meta name="author" content="Twoje dane">
	<meta name="keywords" content="Twoje słowa kluczowe">
	<title>Twoje nazwisko</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<link rel="stylesheet" type="text/css" href="twoj_css.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="twoj_js.js"></script> 
  <style>
    img, .anim {
     max-width:50px; 
      max-height:50px; 
    }
    td {
     min-height:50px; 
    }
    .vol{
    position: absolute;
    bottom: 0;
      margin-bottom:100px;
      margin-left:30px;
    }
    #vimg {
      transform: scale(2, 2);
-ms-transform: scale(2, 2);
-webkit-transform: scale(2, 2);
    
    }
  </style>
</head>

<body onload="myLoadHeader()">'
  

	<div id='myHeader'> </div>	
	<main> 
      <audio id="my-audio">
  <source src="alert.mp3" type="audio/mpeg">
  
</audio>
		<section class="sekcja1">	
         <div id="result"></div>
			<div class="container-fluid">
              <div id="wynik"></div>
            
              
			</div>	<div class="vol">
          <label id="aF" class="af" for="volume-button">
   		<img id="vimg" src="svg/v0.svg"/>
             <button id="volume-button" style="visibility:hidden">Głośność</button>
     
	</label>	
          </div>
          
          
<script>
  var tt = 0;
  // Pobierz element przycisku
const volumeButton = document.getElementById("volume-button");

// Utwórz zmienną do przechowywania aktualnej głośności
let currentVolume = 1;

// Utwórz tablicę z dostępnymi poziomami głośności
const volumeLevels = [0,0.2,0.6,1];

// Dodaj nasłuchiwacz zdarzeń na kliknięcie przycisku
volumeButton.addEventListener("click", function() {
  // Zwiększ wartość zmiennej currentVolume o 1, zachowując jej wartość w zakresie od 0 do 3
  currentVolume = (currentVolume + 1) % volumeLevels.length;
volumeButton.classList.remove("volume-level-" + (currentVolume % volumeLevels.length + 1));
if(currentVolume == 0) document.getElementById("vimg").src = "svg/v0.svg";
  if(currentVolume == 1) document.getElementById("vimg").src = "svg/v1.svg";
   if(currentVolume == 2) document.getElementById("vimg").src = "svg/v2.svg";
   if(currentVolume == 3) document.getElementById("vimg").src = "svg/v3.svg";
  // Dodaj klasę CSS dla nowego poziomu głośności do przycisku
  volumeButton.classList.add("volume-level-" + (currentVolume + 1));
  // Pobierz element audio z dokumentu
  const audioElement = document.getElementById("my-audio");

  // Ustaw nową wartość głośności na elemencie audio
  audioElement.volume = volumeLevels[currentVolume];
   $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "scan/alert.php",
					success: function(result) {
						 if(result ==1)audioElement.play();
                      
					}
				});
			}, 2000); // odświeżaj co sekundę
		});
 

  // Zaktualizuj tekst przycisku, aby pokazywał aktualny poziom głośności
  volumeButton.textContent = "Głośność: " + (currentVolume + 1) + " / " + volumeLevels.length;
});
 

   
  </script>
		</section>
	</main>	
   <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
 $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "scan/table_data3.php",
					success: function(result) {
						$("#wynik").html(result);
					}
				});
			}, 1000); // odświeżaj co sekundę
		});
 
      document.getElementById("volume-button").click();
  </script>
  
	<?php require_once 'footer.php'; ?>	
</body>
</html>