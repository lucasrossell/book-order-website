<?php 
require_once "config.php";

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $sql = "select username, userEmail from users where username = '$username'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $fetch_user_id=$row['username'];
        $email=$row['userEmail'];
        $tempPass = substr(md5(uniqid(rand(),1)),3,10);
        if($username==$fetch_user_id) {
            $to = $email;
            $subject = "Temporary Password - UCF Books";
            $txt = "Your temporary password is : $tempPass. \n";
            $txt .= "If you did not request this temporary password email, no action is needed. ";
            $txt .= "However, you may want to log in and change your password for security reasons. ";
            $txt .= "You can login here: loginPage.php";
            $headers = "From: tempPass@ucf.com";
            mail($to,$subject,$txt,$headers);
            $sql = "update users set password = '$tempPass' where username = '$username'";
            mysqli_query($link, $sql);
        } else {
            echo "Invalid username";
        }
    }
    header("location:loginPage.php"); exit;
}
if(isset($_POST['cancel'])) {
    header("location: profDash.php"); exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Reset Password</h1>
        <form action = '' method="POST">
            <p>Username:</p>
            <input type="text" name="username">
            <br><br>
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>
