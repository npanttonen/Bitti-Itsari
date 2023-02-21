<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sodexo, Menu">

    <title>Coffee shop Menu</title>
</head>
<script>
    
    function comment(){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
                document.getElementById("commmet").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "./comment.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();	
    }
</script>
<body>
   <header>
   <a href="index.html"><img src="assets/images/2560px-Sodexo_logo.svg.png" width="130" height="44" alt="SodexoLogo" /></a>
    <h3><a href="index.html">Home</a> &ensp; <a href="Menu.html">Menu</a> &ensp; <a href="OpenTime.html">Open time</a> &ensp; <a href="AboutUs.html">About us</a></h3>
   </header> 
   <kuva><img src="assets/images/coffeeBeans4.jpg" alt="coffeeBeans"></kuva>
   <main>
    
    <form>
        <button onclick="comment()">comment</button>
    </form>
    <div id='comment'>
        <p></p>
    </div>
    <post>
   </main>
   <footer>
    <address>
        <ul class="list">
            <li><b>Sodexo Oy</b></li>
            <li>Vankanlähde 9</li>
            <li>13100 Hämeenlinna</li>
            <li>p. 010 540 7000</li>
            <li>neuvo.fms.fi@sodexo.com</li>
            <li>etunimi.sukunimi@sodexo.com</li>
            <li><a href="kirjauduajax.html">login</a> </li>
        </ul>
       
    </address>
</footer>
</body>
</html>
