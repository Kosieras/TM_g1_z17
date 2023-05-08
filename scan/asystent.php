<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asystent</title>
  <link rel="stylesheet" href="assistant.css">
  <style>
    #avatar{
     max-height:200px; 
      
    }
    .anim {
     max-width:50px; 
    }
    body{
     background-color: white; 
      
    }
  </style>
</head>

<body>
  <div id="content">
    <h1>ASYSTENT</h1>
    <div id="divAv">
    <img id="avatar" src="svg/student1b.svg"/>
    
    
    
    </div>
    
    <script>
     
    </script>
    <h3 id="info"> </h3><br>
    <h4 id="newInfo"> </h4>
 <script>
  
    var i = 0;
    function typeWriter() {
      
       var text = "Spróbuj mnie o coś zapytać 'hej/witam', 'Jakie usługi działają/nie działają', ...";
       var obrazek = document.getElementById("avatar");
      obrazek.src = "svg/student3.svg";
			setTimeout(function(){ obrazek.src = "svg/student1b.svg"; }, 1500);
      if (i < text.length) {
        document.getElementById("info").innerHTML += text.charAt(i);
        i++;
        setTimeout(typeWriter, 10); 
      }
    }
    typeWriter();
    </script>
  
  <input type="text" id="txt"/>
  <button type="button" id="startBtn" onclick="check();">Zapytaj</button>
  <div id="result"></div>
  <div id="result2"></div>
  <p id="processing"></p> </div>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
     
    

 

// Store voices
// UI elements
const startBtn = document.getElementById("startBtn");
const result = document.getElementById("result");
    const result2 = document.getElementById("result2");
const processing = document.getElementById("processing");
    const rawText = "hello";
  function check(){
   
  //const text = document.getElementById("txt");
     let text = document.getElementById("txt").value;
  let response = null;
  var ajax=null;
  if (text.includes("witam") || text.trim() == "hi" || text.includes("hej")) {
    document.getElementById("newInfo").innerHTML ="";
     var i = 0;
    function typeWriter2() {
      
       var text2 = "Hej, jak mogę Ci pomóc?";
       var obrazek = document.getElementById("avatar");
      obrazek.src = "svg/student3.svg";
			setTimeout(function(){ obrazek.src = "svg/student1b.svg"; }, 1500);
      if (i < text2.length) {
        document.getElementById("newInfo").innerHTML += text2.charAt(i);
        i++;
        setTimeout(typeWriter2, 10); 
      }
      

    }
    typeWriter2();
  } else if (text.includes("nie dzialaja") || text.includes("nie działają")|| text.includes("nie działaja")|| text.includes("nie dzialają")
            || text.includes("nie dziala") || text.includes("nie działa")
            ) {
     document.getElementById("newInfo").innerHTML ="";
     var i = 0;
    function typeWriter2() {
      
       var text2 = "Oto lista niedziałających w tym momencie usług:";
       var obrazek = document.getElementById("avatar");
      obrazek.src = "svg/student3.svg";
			setTimeout(function(){ obrazek.src = "svg/student1b.svg"; }, 1500);
      if (i < text2.length) {
        document.getElementById("newInfo").innerHTML += text2.charAt(i);
        i++;
        setTimeout(typeWriter2, 10);
      }
      

    }
    typeWriter2();
    
     $(document).ready(function(){
  $.ajax({
    url: "not_working.php",
    type: "GET",
    dataType: "html",
    success: function(response){
      $("#result2").html(response);
    }
  });
});
    

    
 } else if (text.includes("dzialaja") || text.includes("działają")|| text.includes("działaja")|| text.includes("dzialają") || text.includes("działa")|| text.includes("dziala"))
 {
  document.getElementById("newInfo").innerHTML ="";
     var i = 0;
    function typeWriter2() {
      
       var text2 = "Oto lista działających w tym momencie usług:";
       var obrazek = document.getElementById("avatar");
      obrazek.src = "svg/student3.svg";
			setTimeout(function(){ obrazek.src = "svg/student1b.svg"; }, 1500);
      if (i < text2.length) {
        document.getElementById("newInfo").innerHTML += text2.charAt(i);
        i++;
        setTimeout(typeWriter2, 10); // Opóźnienie 100 milisekund
      }
      

    }
    typeWriter2();
    
     $(document).ready(function(){
  $.ajax({
    url: "working.php",
    type: "GET",
    dataType: "html",
    success: function(response){
      $("#result2").html(response);
    }
  });
});


   
   
   
  } else if (text.includes("godzina") || text.includes("czas")) {
    response = new Date().toLocaleTimeString();
  } 



result.innerHTML = response;
}



  function getRandomItemFromArray(array) {
  const randomItem = array[Math.floor(Math.random() * array.length)];
  return randomItem;
};
    function readOutLoud(message) {
  const speech = new SpeechSynthesisUtterance();
  
  speech.text = message;
  speech.volume = 1;
  speech.rate = 1;
  speech.pitch = 1.8;
  speech.voice = voices[3];

  window.speechSynthesis.speak(speech);
}
  
  </script>
</body>
</html>