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
    header("location: adminDash.php"); exit;
} else {
    $message = "Password is not correct";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Change Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div><?php if(isset($message)) { echo $message; } ?></div>
        <form method="POST">
            <p>New Password:</p>
            <input type="text" name="newPassword"><span id="newPassword" class="required"></span>
            <p>Confirm Password:</p>
            <input type="text" name="confirmPassword"><span id="confirmPassword" class="required"></span>
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>