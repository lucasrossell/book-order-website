<?php 
require_once "config.php";

if(isset($_POST['submit'])) {
    $body = $_POST['body'];
    $subject = $_POST['subject'];
    $headers = "From: bookstore@ucf.edu";
    $subject = "Temporary Password - UCF Books";
    $body = "Your temporary password is : $tempPass. If you did not request this temporary password email, you may want to log in and change your password for security reasons.";

    $data = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($data);
    $fetch_user_id=$row['username'];
    if ($recipient == $fetch_user_id) {
        $email=$row['userEmail'];
        $to = $email;
        mail($to,$subject,$body,$headers);
        echo "Mail sent."; exit;
    }
    else {
        echo "Invalid username.";
    }
}
header("location:loginPage.php"); exit;
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
