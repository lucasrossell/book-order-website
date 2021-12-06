<!-- Deleting any user record from database users-->
<?php
require_once "config.php";

$username = $_GET['username'];
$del = mysqli_query($db, "delete from books where username='$username");

if($del) {
    mysqli_close($db);
    header("location:usersList.php");
    exit;
} else {
    echo "Error deleting record";
}
?>