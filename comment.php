<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
   $yhteys=mysqli_connect("db", "root", "password", "sodexo");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<form action="senduser.php" method="post">
  <p>username:</p>  
  <input type="text" name="username" value="">
  <p>subject:</p>
  <input type="text" name="subject" value="" required>
  <p>comment:</p>
  <textarea name="comment" rows="5" cols="40" required></textarea>
  <br><br>
  <input type="submit" name="ok" value="comment">
</form>


</body>
</html>