<?php
require_once "config.php";
// Getting the password of the user from database and changing it.
$username = $_GET['username'];
if(isset($_POST['update'])) {
    $result = mysqli_query($link, "select * from users where username='$username'");
    $row = mysqli_fetch_array($result);
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    $sql = "update users set password = '$newPassword' where username='$username'";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        if(mysqli_stmt_execute($stmt)){
            // Redirect to userslist page
            header("location: profDash.php"); exit;
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
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
            <input type="text" name="newPassword" value="<?php echo $data['newPassword'] ?>" id="newPassword" class="required">
            <p>Confirm Password:</p>
            <input type="text" name="confirmPassword" value="<?php echo $data['confirmPassword'] ?>" id="confirmPassword" class="required">
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>