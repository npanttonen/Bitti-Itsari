<?php
//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
//jos syötteet ovat olemassa
$id=isset($_POST["id"]) ? $_POST["id"] : "";
$username=isset($_POST["username"]) ? $_POST["username"] : "";
$password=isset($_POST["password"]) ? $_POST["password"] : "";
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);


//Jos ei jompaa kumpaa tai kumpaakaan tietoa ole annettu
//ohjataan pyyntö takaisin lomakkeelle
if (empty($username) || empty($password) || empty($id)){
    header("Location:tallennakahvio.php");
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    $yhteys=mysqli_connect("db", "root", "password", "kahvio");
}
catch(Exception $e){

    exit;
}

//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
//joihin laitetaan muuttujien arvoja
$sql="update credentials set username=?, password=? where id=?";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'ssi', $username, $password, $id);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location:tallennakahvio.php");
?>