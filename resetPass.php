<?php 
require_once "config.php";

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $sql= "SELECT username, userEmail FROM users where username = '$username'";
    $headers = "From: bookstore@ucf.edu";
    $subject = "Temporary Password - UCF Books";
    $tempPass = substr(md5(uniqid(rand(),1)),3,10);
    $edit = mysqli_query($link, "update users set password = '$tempPass' where username='$username'");
    $body = "Your temporary password is : $tempPass. If you did not request this temporary password email, you may want to log in and change your password for security reasons.";
    $data = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($data);
    $fetch_user_id = $row['username'];
    if ($username == $fetch_user_id) {
        $email=$row['userEmail'];
        $to = $email;
        mail($to,$subject,$body,$headers);
        mysqli_close($link);
        header("location:loginPage.php"); exit;
    } else {
        echo "Invalid username.";
    }
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
        </form>
    </body>
</html>
