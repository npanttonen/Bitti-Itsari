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
    <style>
table {
  background-color: white;
}
</style>


</head>
<body>
   <header>
    <a href="Home.html"><img src="assets/images/2560px-Sodexo_logo.svg.png" 
        width="10%"; 
        height="auto" /></a>
    <h3> <a href="Home.html">Home</a> &ensp; &ensp;&ensp;<a href="Menu.html">Menu</a> &ensp; &ensp;&ensp;<a href="OpenTime.html">Open time</a> &ensp; &ensp;&ensp;<a href="AboutUs.html">About us</a></h3>
   </header> 
   <kuva><img id="coffee1"src="assets/images/coffeeBeans4.jpg" alt="coffeeBeans"></kuva>
   <main>

<?php


$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    $yhteys=mysqli_connect("db", "root", "password", "kahvio");
}
catch(Exception $e){

    exit;
}

if (!empty($username) && !empty($password)){
    $sql="insert into credentials (username, password) values(?, ?)";
    //valmistellaan sql-lause
    $stmt=mysqli_prepare($yhteys, $sql);
    //sijoitetaan muuttujat oikeisiin paikkoihin
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    //suoritetaan sql-lause
    mysqli_stmt_execute($stmt);

    $last_id = mysqli_insert_id($yhteys);
	


    header("Location:tallennakahvio.php");
    exit;
}
?>

<?php
print "<table border='1'>";

$tulos=mysqli_query($yhteys, "select * from credentials");
while ($rivi=mysqli_fetch_object($tulos)){
    if($rivi->admin!=true){
    print "<tr><td><p>$rivi->username <td>$rivi->password <td>$rivi->id".
    "<td><a href='./poistakahvio.php?poistettava=$rivi->id'>Poista</a></p>".
    "<td><a href='./muokkaakahvio.php?muokattava=$rivi->id'>Muokkaa</a></p></tr>";
}}
print "</table>";
//suljetaan tietokantayhteys
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
                <?php
                if (isset($_SESSION['kayttaja']) && $_SESSION['kayttaja'] === true) {
    // näytä kirjautumisulospainike
    echo '<form action="logout.php" method="post">';
    echo '<input type="submit" value="Kirjaudu ulos">';
    echo '</form>';
} else {
    // näytä kirjautumisnappula
    echo '<a href="login.php">Kirjaudu sisään</a>';
}
?>
            </ul>
           
        </address>
    </footer>
   
</body>
</html>
