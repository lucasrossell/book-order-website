<?php
require_once "config.php";

// Fetching data from database 
$order_id = $_GET['order_id'];
$qry = mysqli_query($db, "select * from books where order_id='$order_id'");
$data = mysqli_fetch_array($qry);

// Once update button is clicked, update
if(isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];
    $book_qty = $_POST['book_qty'];
    $ISBN = $_POST['ISBN'];

    $edit = mysqli_query($db, "update tblemp set title='$title', author='$author', edition='$edition', publisher='$publisher', book_qty='$book_qty', ISBN='$ISBN' where order_id='$order_id'");

    if($edit) {
        mysqli_close($db);
//        header("location: ___.php"); 
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
            <input type="text" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter Title" Required>
            <input type="text" name="author" value="<?php echo $data['author'] ?>" placeholder="Enter Author" Required>
            <input type="text" name="edition" value="<?php echo $data['edition'] ?>" placeholder="Enter Edition" Required>
            <input type="text" name="publisher" value="<?php echo $data['publisher'] ?>" placeholder="Enter Publisher" Required>
            <input type="text" name="book_qty" value="<?php echo $data['book_qty'] ?>" placeholder="Enter Quantity" Required>
            <input type="text" name="ISBN" value="<?php echo $data['ISBN'] ?>" placeholder="Enter ISBN" Required>
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>