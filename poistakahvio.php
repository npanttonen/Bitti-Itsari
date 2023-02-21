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


$poistettava = isset($_GET["poistettava"]) ? $_GET["poistettava"] : "";

if (empty($poistettava)){
    header("Location:tallennakahvio.php");
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    $yhteys=mysqli_connect("db", "root", "password", "kahvio");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}
$sql="delete from credentials where id=?";
//valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'i', $poistettava);
//suoritetaan sql-lause
mysqli_stmt_execute($stmt);
mysqli_close($yhteys);
header("Location:tallennakahvio.php");
exit;
?>