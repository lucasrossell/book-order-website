<?php
require_once "config.php";

// Fetching data from database
$username = $_GET['username'];
$qry = mysqli_query($db, "select * from users where username='$username'");
$data = mysqli_fetch_array($qry);

// Once update button is clicked, update
if(isset($_POST['update'])) {
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $userEmail = $_POST['userEmail'];


    $edit = mysqli_query($db, "update tblemp set password='$password', fullName='$fullName', userEmail='$userEmail' where username='$username'");

    if($edit) {
        mysqli_close($db);
        header("location:usersList.php");
        exit;
    } else {
        echo mysqli_error();
    }
}
?>

<!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <head>Edit Book Request</head>
    <body>
        <form method="POST">
            <input type="text" name="password" value="<?php echo $data['password'] ?>" placeholder="Enter New Password" Required>
            <input type="text" name="fullName" value="<?php echo $data['fullName'] ?>" placeholder="Enter your full name" Required>
            <input type="text" name="userEmail" value="<?php echo $data['userEmail'] ?>" placeholder="Enter your email" Required>
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>