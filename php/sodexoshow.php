<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "sodexo";

// Create connection
$yhteys=mysqli_connect("db","root","password","sodexo");
// Check connection
if (!$yhteys) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, comment FROM sodexo";
$result = mysqli_query($yhteys, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["comment"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($yhteys);
?>

</body>
</html>