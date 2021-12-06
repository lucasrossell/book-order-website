<!-- Deleting any book request record from database books-->
<?php
require_once "config.php";

$order_id = $_GET['order_id'];
$del = mysqli_query($db, "delete from books where order_id='$order_id");

if($del) {
    mysqli_close($db);
    header("location:openOrder.php");
    exit;
} else {
    echo "Error deleting record";
}
?>