<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
   $yhteys=mysqli_connect("db", "root", "password", "sodexo");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}

echo "<h2>Previus comments:</h2>";
$sqli = "SELECT  * FROM comment";
$result = mysqli_query($yhteys, $sqli);

if (mysqli_num_rows($result) > 0) {
    
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div style='background-color: #f2f2f2; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;'>Username: ". $row["username"]. "<br>"."Subject: " . $row["subject"]. "<br>". "Comment: " . $row["comment"]. "<br></div>"; 
    }
   
} else {
    echo "0 results";
}
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
</html>