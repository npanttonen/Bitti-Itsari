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
    <title>Document</title>
</head>
<body>
   <header>
    <a href="Login_Home.php"><img src="assets/images/2560px-Sodexo_logo.svg.png" 
        width="10%"; 
        height="auto" /></a>
        <h3><a href="Login_Home.php">Home</a> &ensp; <a href="Login_Menu.php">Menu</a> &ensp; <a href="Login_OpenTime.php">Open time</a> &ensp; <a href="Login_AboutUs.php">About us</a> &ensp; &ensp;&ensp;<a href="forum.php">Forum</a></h3>
   </header> 
   <kuva><img id="coffee1"src="assets/images/coffeeBeans4.jpg" alt="coffeeBeans"></kuva>
   <main>
<?php
if (!isset($_SESSION["credentials"])){
    header("Location:/kirjauduajax.html");
    exit;
}

print "<h2>Welcome administrator, ".$_SESSION["credentials"]."!</h2>";


?>
<a href='./tallennakahvio.php'>Edit users</a>
<br>
<br>
<br>
<br>
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
                <linkki>
                
                <a href='kirjauduulos.php'>Kirjaudu ulos</a>
                </linkki>
            </ul>
           
        </address>
    </footer>
   
</body>
</html>
