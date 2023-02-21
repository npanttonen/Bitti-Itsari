<?php
session_start();

?>
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
                document.getElementById("comment").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("POST", "./comment.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();	
    }
</script>
<body>
   <header>
        <?php
        if (!isset($_SESSION["credentials"])){
            echo  "<a href='index.html'><img src='assets/images/2560px-Sodexo_logo.svg.png' width='130' height='44' alt='SodexoLogo' /></a>
            <h3> <a href='index.html'>Home</a> &ensp; &ensp;&ensp;<a href='Menu.html'>Menu</a> &ensp; &ensp;&ensp;<a href='OpenTime.html'>Open time</a> &ensp; &ensp;&ensp;<a href='AboutUs.html'>About us</a>&ensp; &ensp;&ensp;<a href='forum.php'>Forum</a></h3>
               ";
        }else {
            echo "<a href='Login_Home.php'><img src='assets/images/2560px-Sodexo_logo.svg.png' width='130' height='44' alt='SodexoLogo' /></a>
   <h3><a href='Login_Home.php'>Home</a> &ensp; <a href='Login_Menu.php'>Menu</a> &ensp; <a href='Login_OpenTime.php'>Open time</a> &ensp; <a href='Login_AboutUs.php'>About us</a> &ensp;<a href='forum.php'>Forum</a></h3>
   ";
        }
        ?>
   
   </header> 
   <kuva><img src="assets/images/coffeeBeans4.jpg" alt="coffeeBeans"></kuva>
   <main>
    <div id='comment'> 
        <?php
        if (!isset($_SESSION["credentials"])){
            echo "<a href='kirjauduajax.html'>Kirjaudu sisään</a>";
        }else {
            echo "<button onclick='comment()'>comment</button>";
        }
        ?>
        
    </div>
    <?php 
    include('readcomment.php')
    ?>
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
            <li>   
                 <?php
        if (!isset($_SESSION["credentials"])){
            echo "<a href='kirjauduajax.html'>Login</a>";
        }else {
             echo "<a href='kirjauduulos.php'>Logout</a>";
        }
        ?>
        
                
            

        </ul>
       
    </address>
</footer>
</body>
</html>
