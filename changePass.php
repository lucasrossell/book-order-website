<!-- Changing user's password-->
<?php
require_once "config.php";
// Getting the password of the user from database and changing it.
$username = $_GET['username'];
$result = mysqli_query($db, "select * from users where username='$username'");
$row = mysqli_fetch_array($result);
if($_POST["newPassword"] == $row["confirmPassword"]) {
    mysqli_query($db, "update users set password ='" . $_POST["newPassword"] . "' where username='$username'");
    $message = "Password Changed Successfully";
} else {
    $message = "Password is not correct";
}
?>