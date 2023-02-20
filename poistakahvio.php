<?php

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