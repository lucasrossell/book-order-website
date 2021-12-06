<?php
require_once "config.php";
unset($_SESSION["username"]);
unset($_SESSION["fullName"]);
header("Location:loginPage.php");
?>