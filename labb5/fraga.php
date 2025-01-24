<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<style>
.reg{
font-size: 20px;
margin-left: 10%;
margin-right:10%;
border-style: solid;
border-width: 5px;
}
.fraga{
font-size: 20px;
margin-left: 10%;
margin-right:10%;
border-style: solid;
border-width: 5px;
height: auto;
padding: 20px;
}
input[type=text] {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
}
.section-divider {
    border: none;
    height: 2px;
    background: #cccccc;
    margin: 20px 0;
}
</style>
</head>
<body>

<form action="" method="post">
<div name="reg" class="reg" id="reg">
<h2> En kort kunskapstest </h2>

<p> Namn: <input type="text" name="name" value="" id="name">&nbsp;&nbsp;&nbsp;&nbsp;
Efternamn:  <input type="text" name="efternamn" value="" id="efternamn"></p>
<p>Test-kod: <input type="text" value="" name="kod" id="kod">&nbsp;&nbsp;&nbsp;&nbsp;
Datum: <input type="text" name="datum" value="" id="datum"></p>
<br />
</div>

<div name="fraga" class="fraga" id="fraga">
<h2> Här nere svarar du dessa 6 frågor </h2>
<hr class="section-divider">
<strong>1.</strong><label for="Bakgrundfärg"> Vilken bokstäver motsvras den svenska ord se?</label>
<select name="svar1" id="svar1">
    <option value=""></option>
    <option value="ለ">ለ</option>
    <option value="በ">በ</option>
    <option value="ስ">ስ</option>
    <option value="ሰ">ሰ</option>
</select>
<hr class="section-divider">
<p><strong>2.</strong> Skriv de B-family bokstäver i rätt ordning? Här får du blandat form 
   (ቡ    በ   ቤ    ቦ    ቢ   ባ   ብ)</p>
<input type="text" name="svar2" value="" id="svar2">
<hr class="section-divider">
<b>3.</b> <label for="Bakgrundfärg"> Vilken alfabet är den som har vowel sound o i tigrinska språket? </label>
<select name="svar3" id="svar3">
    <option value="ክ">ክ</option>
    <option value="በ">በ</option>
    <option value="ቦ">ቦ</option>
    <option value="ቢ">ቢ</option>
</select>
<hr class="section-divider">
<p> <b>4.</b> Skriv den alfabet som saknas inom B-family  <br /> ቦባቡበቤብ.</p>
<input type="text" name="svar4" value="" id="svar4">
<hr class="section-divider">
<p>Spela ljudet</p>
<audio controls>
  <source src="audio/be.mp3" type="audio/ogg">
  <source src="audio/bel.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<p> <b>5. </b>Skriv svaret utifrån ovanstånde bokstäver och ljud du hör</p>
<input type="text" name="svar5" value="" id="svar5">
<hr class="section-divider">

<hr class="section-divider">
<p> <b>6.</b> Skriv meningen utifrån den ljud du hör. Välj den långsamt rösten om det är svårt att hänga med.</p><br />

<p>Spela ljudet</p>
<audio controls>
  <source src="audio/beles.mp3" type="audio/ogg">
  <source src="audio/beles.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<p>Spela Långsamt</p>
<audio controls>
  <source src="audio/beless.mp3" type="audio/ogg">
  <source src="audio/beless.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<input type="text" value="" name="svar6" id="svar6"><br />
<p> <button type="submit" name="answer" id="answer">    Confirm your answer</button></P>
<p> <button type="button" name="answer1" id="answer1"> Show your result</button></P>
</div>
</form>

<div id="svar" name="svar" class="svar">
<h3 id="a1"></h3>
<h3 id="a2"></h3>
<h2 id="area1"> </h2><br />
<h2 id="area2"> </h2><br />
<h2 id="area3"> </h2><br />
<h2 id="area4"> </h2><br />
<h2 id="area5"> </h2><br />
<h2 id="area6"> </h2><br />
<h1 id="area7"></h1>
<p> <button type="button" name="byt2" id="byt2"> Försök igen</button></P>
</div>
<?php
include("tphp.php")
?>

<script>
    
    "use strict";
    //
    // Wait for DOM to load
    document.addEventListener("DOMContentLoaded", function(){ 
        var point = "<?php echo $point; ?>;"
        var f1 = "<?php echo $mylist[0]; ?>;"
        var f2 = "<?php echo $mylist[1]; ?>;"
        var f3 = "<?php echo $mylist[2]; ?>;"
        var f4 = "<?php echo $mylist[3]; ?>;"
        var f5 = "<?php echo $mylist[4]; ?>;"
        var f6 = "<?php echo $mylist[4]; ?>;"
        document.getElementById("fraga").style.display = "block"; // Hide div with name "page2"
        document.getElementById("svar").style.display = "none"; // Hide div with name "page2"
        document.getElementById("reg").style.display = "block";
        document.getElementById("answer1").addEventListener("click", function(){
            document.getElementById("fraga").style.display = "none"; // Hide div with name "page1"
            document.getElementById("svar").style.display = "block"; // Show div with name "page2"

            //document.getElementById("button1").style.display = "block"; // Show div with name "page2"
            document.getElementById("reg").style.display = "none";
            document.getElementById("svar").style.backgroundColor = "lightblue"; 
            // Move text from input field in page 1 to presenting area in page 2   
            document.getElementById("area1").innerHTML = "1. "+ document.getElementById("svar1").value+ f1; 
            document.getElementById("area2").innerHTML = "2. "+ document.getElementById("svar2").value + f2;  
            document.getElementById("area3").innerHTML =" 3. "+  document.getElementById("svar3").value + f3;  
            document.getElementById("area4").innerHTML =" 4. " + document.getElementById("svar4").value +f4;  
            document.getElementById("area5").innerHTML = "5. "+ document.getElementById("svar5").value + f5;  
            document.getElementById("area6").innerHTML = "6. "+ document.getElementById("svar6").value + f6; 
            document.getElementById("a1").innerHTML = " Student Name: " + document.getElementById("name").value + " " + document.getElementById("efternamn").value;  
            document.getElementById("a2").innerHTML = " Testkod: " + document.getElementById("kod").value + "Datum:  "+ document.getElementById("datum").value;
            document.getElementById("area7").innerHTML= point;
        });
        document.getElementById("byt2").addEventListener("click", function(){
            document.getElementById("fraga").style.display = "block"; // Hide div with name "page1"
            document.getElementById("svar").style.display = "none"; // Show div with name "page2"
            document.getElementById("reg").style.display = "block";
        });  

        document.getElementById("beles").addEventListener("click", function () {
    const audio = document.getElementById("bel");
    audio.play();
            
            //document.getElementById("button1").style.display = "none"; // Show div with name "page2"
        });  

        
    
    })
    
    </script>
</body>
</html>
