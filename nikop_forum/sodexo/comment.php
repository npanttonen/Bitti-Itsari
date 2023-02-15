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
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form action="senduser.php" method="post">  
  username: <input type="text" name="username" value="">
  <br><br>
  E-mail: <input type="text" name="subject" value="">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="ok" value="OK">
</form>


</body>
</html>