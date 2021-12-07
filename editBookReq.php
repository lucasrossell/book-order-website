<?php
require_once "config.php";

// Fetching data from database 
$order_id = $_GET['order_id'];
$qry = mysqli_query($link, "select * from books where order_id='$order_id'");
$data = mysqli_fetch_array($qry);

// Once update button is clicked, update
if(isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];
    $book_qty = $_POST['book_qty'];
    $ISBN = $_POST['ISBN'];
    $class = $_POST['class'];
    $semester = $_POST['semester'];

    $edit = mysqli_query($link, "update books set title='$title', author='$author', edition='$edition', publisher='$publisher', book_qty='$book_qty', ISBN='$ISBN', class='$class', semester='$semester' where order_id='$order_id'");

    if($edit) {
        mysqli_close($link);
        header("location: openOrder.php"); 
        exit;
    } else {
        echo mysqli_error($link);
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
            <p>Enter Title:</p>
            <input type="text" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter Title" Required>
            <p>Enter Author:</p>
            <input type="text" name="author" value="<?php echo $data['author'] ?>" placeholder="Enter Author" Required>
            <p>Enter Edition:</p>
            <input type="text" name="edition" value="<?php echo $data['edition'] ?>" placeholder="Enter Edition" Required>
            <p>Enter Publisher:</p>
            <input type="text" name="publisher" value="<?php echo $data['publisher'] ?>" placeholder="Enter Publisher" Required>
            <p>Enter Book Quantity:</p>
            <input type="text" name="book_qty" value="<?php echo $data['book_qty'] ?>" placeholder="Enter Quantity" Required>
            <p>Enter ISBN:</p>
            <input type="text" name="ISBN" value="<?php echo $data['ISBN'] ?>" placeholder="Enter ISBN" Required>
            <p>Enter Class:</p>
            <input type="text" name="class" value="<?php echo $data['class'] ?>" placeholder="Enter Class" Required>
            <p>Choose a semester</p>
                        <div>
                            <label for="semester"></label>
                            <select name="semester" id="semester">
                                <option value="">--- Choose a type ---</option>
                                <option value="fall21" selected>Fall 2021</option>
                                <option value="spring22">Spring 2022</option>
                                <option value="summer22">Summer 2022</option>
                            </select>
                        </div>
            <br><br>
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>