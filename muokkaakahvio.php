<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cafe menu page.">
    <title>Menu</title>
</head>
<body>
   <header>
   <a href="Home.html"><img src="assets/images/2560px-Sodexo_logo.svg.png" width="130" height="44" alt="SodexoLogo" /></a>
    <h3><a href="Home.html">Home</a> &ensp; <a href="Menu.html">Menu</a> &ensp; <a href="OpenTime.html">Open time</a> &ensp; <a href="AboutUs.html">About us</a></h3>
   </header> 
   <kuva><img src="assets/images/coffeeBeans4.jpg" alt="coffeeBeans"></kuva>
   <main>
<?php

$muokattava=isset($_GET["muokattava"]) ? $_GET["muokattava"] : "";

//Jos tietoa ei ole annettu, palataan listaukseen
if (empty($muokattava)){
    header("Location:./tervetuloaAdmin.php");
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "kahvio");
}
catch(Exception $e){
    exit;
}

$sql="select * from credentials where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttuja sql-lauseeseen
mysqli_stmt_bind_param($stmt, 'i', $muokattava);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Koska luetaan prepared statementilla, tulos haetaan 
//metodilla mysqli_stmt_get_result($stmt);
$tulos=mysqli_stmt_get_result($stmt);
if (!$rivi=mysqli_fetch_object($tulos)){
    exit;
}
?>

<!-- Lomake tavallisena html-koodina php tagien ulkopuolella -->
<!-- Lomake sisältää php-osuuksia, joilla tulostetaan syötekenttiin luetun tietueen tiedot -->
<!-- id-kenttä on readonly, koska sitä ei ole tarkoitus muuttaa -->

<form action='./paivitakahvio.php' method='post'>
id:<input type='text' name='id' value='<?php print $rivi->id;?>' readonly><br>
Username:<input type='text' name='username' value='<?php print $rivi->username;?>'><br>
Password:<input type='text' name='password' value='<?php print $rivi->password;?>'><br>
<input type='submit' name='ok' value='ok'><br>
</form>

<!-- loppuun uusi php-osuus -->
<?php
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
?>
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
            <li><a href="kirjauduajax.html">login</a> </li>
        </ul>
       
    </address>
</footer>
</body>
</html>
