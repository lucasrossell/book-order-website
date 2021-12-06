<?php 
require_once "config.php";

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $result = mysqli_query($conn, "SELECT * FROM users where user_id='" . $POST['username'] . "'");
    $row = mysqli_fetch_assoc($result);
        $fetch_user_id=$row['username'];
        $email=$row['userEmail'];
        $password=$row['password'];
        if($username==$fetch_user_id) {
            $to = $email;
            $subject = "Password";
            $txt = "Your password is : $password.";
            $headers = "From: bookstore@UCFstore.com";
            mail($to,$subject,$txt,$headers);
        } else {
            echo "Invalid username";
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
        <form action='' method='post'>
            <table>
                <tr><td>username:</td><td><input type='text' name='username'/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
            </table>
        </form>
    </body>
</html>

