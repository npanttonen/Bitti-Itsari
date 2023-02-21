<?php
session_start();

// Define MySQL server credentials
$username = "root";
$password = "password";
$dbname = "kahvio";

// Create connection
$conn = mysqli_connect("db", $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Could not connect to MySQL server: " . mysqli_connect_error());
}

// Check if user has admin privileges
$credentials = $_SESSION["credentials"];
$query = "SELECT admin FROM credentials WHERE username='$credentials'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$admin = $row["admin"];

// Redirect non-admin users to login page
if (!$admin) {
    header("Location: /kirjauduajax.html");
    exit;
}
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
    <a href="Login_Home.php"><img src="assets/images/2560px-Sodexo_logo.svg.png" 
        width="10%"; 
        height="auto" /></a>
        <h3><a href="Login_Home.php">Home</a> &ensp; <a href="Login_Menu.php">Menu</a> &ensp; <a href="Login_OpenTime.php">Open time</a> &ensp; <a href="Login_AboutUs.php">About us</a> &ensp; &ensp;&ensp;<a href="forum.php">Forum</a></h3>
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
                <a href='kirjauduulos.php'>Kirjaudu ulos</a>
            </ul>
           
        </address>
    </footer>
   
</body>
</html>
