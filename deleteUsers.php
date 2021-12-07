<?php
session_start();
$currentuser = $_SESSION['username'];
require_once "config.php";

$admincheck = "SELECT * from users where username='$currentuser'";
if(mysqli_query($link, $admincheck)){
    $admin = True;
} else {
    $admin = False;
}
if ($admin) {
    $username = $_GET['username'];
    $del = "DELETE from users where username='$username'";
    if(mysqli_query($link, $del)){
        header("location: usersList.php"); exit;
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
mysqli_close($link);
?>