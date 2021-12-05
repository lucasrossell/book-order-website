<?php
// EDITTING THIS RN
require_once "config.php";

$id = $_GET['id'];
$qry = mysqli_query($db, "select * from tblemp where id='$id'");
$data = mysqli_fetch_array($qry);

if(isset($_POST['update'])) {
    $bookname = $_POST['bookname'];

    $edit = mysqli_query($db, "update tblemp set fullname='$fullname")
}
?>