<?php
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
$comment=isset($_POST["comment"]) ? $_POST["comment"] : []; //, koska lomakkeela Tuloksena taulukkola name='mielijuoma[]'

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
   $yhteys=mysqli_connect("db", "root", "password", "sodexo");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}

if (!empty($username) && !empty($subject) && !empty($comment)) {
    //Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
    //joihin laitetaan muuttujien arvoja
    $sql = "insert into comment (username, subject, comment) values(?, ?, ?)";

    //Valmistellaan sql-lause
    $stmt = mysqli_prepare($yhteys, $sql);
    //Sijoitetaan muuttujat oikeisiin paikkoihin
    mysqli_stmt_bind_param($stmt, 'sss', $username, $subject, $comment);
    //Suoritetaan sql-lause
    mysqli_stmt_execute($stmt);
    $last_id = mysqli_insert_id($yhteys);
    
    header("location:forum.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisää henkilö</title>
</head>
<body>
</body>
</html>