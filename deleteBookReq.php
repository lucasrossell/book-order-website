<!-- Deleting book requests -->
<?php
require_once "config.php";
$order_id = $_GET['order_id'];
// Deleting from books table
$del = "DELETE from books where order_id='$order_id'";
if(mysqli_query($link, $del)){
    header("location: openOrder.php"); exit;
} else {
    echo "Oops! Something went wrong. Please try again later.";
}
mysqli_close($link);
?>