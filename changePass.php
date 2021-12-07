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

if(isset($_POST['cancel'])) {
    header("location: adminDash.php"); exit;
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    if (($username == $currentuser) or $admin) {
        $sql = "select * from users where username = '$username'";
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];
        if ($newPassword != $confirmPassword) {
            echo "Passwords not the same";
        }
        else {
            $edit = mysqli_query($link, "update users set password = '$newPassword' where username='$username'");
            if($edit) {
                mysqli_close($link);
            } else {
                echo mysqli_error($link); exit;
            }
            echo "Password changed successfully.";
        }
    }
    else {
        echo "You do not have access to this user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="changePass">
        <h1>Change Password</h1>
        <form action = '' method="POST">
            <p>Username:</p>
            <input type="text" name="username">
            <p>New Password:</p>
            <input type="text" name="newPassword">
            <p>Confirm Password:</p>
            <input type="text" name="confirmPassword">
            <br><br>
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>