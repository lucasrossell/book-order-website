<?php
require_once "config.php";
$username = $_GET['username'];
$del = "DELETE from users where username='$username'";
if(mysqli_query($link, $del)){
    header("location: usersList.php"); exit;
} else {
    echo "Oops! Something went wrong. Please try again later.";
}
mysqli_close($link);
?>