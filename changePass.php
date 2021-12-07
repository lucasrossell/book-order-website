<?php
require_once "config.php";
// Getting the password of the user from database and changing it.
$username = $_GET['username'];
$qry = mysqli_query($link, "select * from users where username='$username'");
$data = mysqli_fetch_array($qry);
if(isset($_POST['update'])) {
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    $edit = mysqli_query($link, "update users set password = '$newPassword' where username='$username'");

    if($edit) {
        mysqli_close($link);
        echo "Password changed successfully.";
        header("location: adminDash.php"); 
        exit;
    } else {
        echo mysqli_error($link);
    }
}
if(isset($_POST['cancel'])) {
    header("location: adminDash.php"); exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>Change Password</head>
    <body>
        <form method="POST">
            <p>New Password:</p>
            <input type="text" name="newPassword" value="<?php echo $data['newPassword'] ?>" placeholder="Enter New Password" Required>
            <p>Confirm Password:</p>
            <input type="text" name="confirmPassword" value="<?php echo $data['confirmPassword'] ?>" placeholder="Confirm Password" Required>
            <br><br>
            <input type="submit" name="update" value="Update">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>