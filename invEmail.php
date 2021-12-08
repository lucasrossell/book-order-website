<!-- Sending an email to invite a professor to request book information -->
<?php
require_once "config.php";

if(isset($_POST['submit'])) {
    $recipient = $_POST['username'];
    // Selecting information of the user that the email is going to 
    $sql= "SELECT username, fullName, userEmail FROM users where username = '$recipient'";
    $body = $_POST['body'];
    $subject = $_POST['subject'];
    $headers = "From: bookstore@ucf.edu";
    
    if ($subject == "") {
        $subject = "Reminder from UCF book store";
    }
    if ($body == "") {
        $body = "The deadline for book orders for the upcoming semester is approaching soon!";
    }

    $data = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($data);
    $fetch_user_id=$row['username'];
    if ($recipient == $fetch_user_id) {
        $email=$row['userEmail'];
        $to = $email;
        // Sending the email.
        mail($to,$subject,$body,$headers);
        echo "Mail sent."; exit;
    }
    else {
        echo "Invalid username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Broadcast Email</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="inviteBody">
        <h1>Broadcast Email</h1>
        <form action='' method='post'>
            <table>
                <tr><td>Enter username of recipient:</td><td><input type='text' name='username'/></td></tr>
                <tr><td>Enter email subject:</td><td><input type='text' name='subject'/></td></tr>
                <tr><td>Enter email body text:</td><td><input type='text' name='body'/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
            </table>
        </form>
    </body>
</html>

