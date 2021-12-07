<!-- Broadcasting an email to request the professors to submit their book requests by a certain deadline -->
<?php
require_once "config.php";

if(isset($_POST['submit'])) {
    $sql= "SELECT username, fullName, userEmail FROM users where type = 'professor'";
    $body = $_POST['body'];
    $data = mysqli_query($link, $sql);
    while( $row = mysqli_fetch_array($data)) {
        $email=$row['userEmail'];
        $to = $email;
        $subject = "Reminder from UCF book store";
            $txt = $body;
            $headers = "From: bookstore@ucf.edu";
            mail($to,$subject,$txt,$headers);
        }
    echo "Mail sent to all professors."; exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Broadcast Email</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Broadcast Email</h1>
        <form action='' method='post'>
            <table>
                <tr><td>Enter email text:</td><td><input type='text' name='body'/></td></tr>
                <tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
            </table>
        </form>
    </body>
</html>

