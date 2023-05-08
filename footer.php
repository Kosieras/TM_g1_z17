<?php declare(strict_types=1);  /* Ta linia musi być pierwsza */ ?>
	<footer>   
		<div class="container-fluid">
			<script>
(function() {
  

    // Tworzenie przycisku
    var previewButton = document.createElement("button");

    previewButton.style.position = "fixed";
    previewButton.style.left = "0";
       previewButton.style.bottom = "0";
    previewButton.style.backgroundImage = "url('https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/chatgpt-icon.png')";
    previewButton.style.border = 'none';
    previewButton.style.color = 'white';
    previewButton.style.backgroundRepeat = "no-repeat";
previewButton.style.backgroundSize = "contain";
    previewButton.style.padding = '40px';
    previewButton.style.textAlign = 'center';
    previewButton.style.textDecoration = 'none';
    previewButton.style.fontSize = '16px';
    previewButton.style.cursor = 'pointer';
    previewButton.style.borderRadius = '50%';
    document.body.appendChild(previewButton);
var previewFrame = document.createElement("iframe");
   previewFrame.src = "https://kosiera.pl/z17new/scan/asystent.php";
        previewFrame.style.position = "fixed";
        previewFrame.style.bottom = "10px";
        previewFrame.style.right = "10px";
        previewFrame.style.width = "1280px";
        previewFrame.style.height = "720px";
        previewFrame.style.border = "1px solid black";
    // Obsługa kliknięcia przycisku
    previewButton.addEventListener("click", function() {

        if (previewFrame.style.display === 'none') {
            previewFrame.style.display = 'block';
        // Tworzenie ramki podglądu

        document.body.appendChild(previewFrame);

        }
        else {
          previewFrame.style.display = 'none';
            previewFrame.innerHTML = '';


        }

    });
})();
          </script>
		</div>
	</footer>	