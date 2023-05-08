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
  <style>
    img, object {
     max-width:50px; 
    }
    td {
     min-height:50px; 
    }
  </style>
</head>
<body>
  
<div id="wynik"></div>
  <button id="volume-button">Głośność</button>
<script>
  // Pobierz element przycisku
const volumeButton = document.getElementById("volume-button");

// Utwórz zmienną do przechowywania aktualnej głośności
let currentVolume = 1;

// Utwórz tablicę z dostępnymi poziomami głośności
const volumeLevels = [0.25, 0.5, 0.75, 1];

// Dodaj nasłuchiwacz zdarzeń na kliknięcie przycisku
volumeButton.addEventListener("click", function() {
  // Zwiększ wartość zmiennej currentVolume o 1, zachowując jej wartość w zakresie od 0 do 3
  currentVolume = (currentVolume + 1) % volumeLevels.length;

  // Pobierz element audio z dokumentu
  const audioElement = document.getElementById("my-audio");

  // Ustaw nową wartość głośności na elemencie audio
  audioElement.volume = volumeLevels[currentVolume];

  // Zaktualizuj tekst przycisku, aby pokazywał aktualny poziom głośności
  volumeButton.textContent = "Głośność: " + (currentVolume + 1) + " / " + volumeLevels.length;
});

  
  </script>
</body>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
 $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "table_data3.php",
					success: function(result) {
						$("#wynik").html(result);
					}
				});
			}, 1000); // odświeżaj co sekundę
		});
 
      
  </script>
   
  
  
</html>