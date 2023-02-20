<?php
session_start();
unset($_SESSION["kayttaja"]);
session_destroy();
header("Location:kirjauduajax.html");

?>
