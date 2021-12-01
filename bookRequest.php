<?php
 //This section is currently broken
// Working on making this correctly interact with the mysql server.

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$title = $author = $edition = $publisher = $ISBN = "";
$title_err = $author_err = $edition_err = $publisher_err = $ISBN_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    if(empty(trim($_POST["title"]))){
        $title_err = "Please confirm the book title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate author
    if(empty(trim($_POST["title"]))){
        $author_err = "Please confirm the book's author.";
    } else {
        $author = trim($_POST["author"]);
    }

    // Validate edition
    if(empty(trim($_POST["edition"]))){
        $edition_err = "Please confirm the book's edition.";
    } else {
        $edition = trim($_POST["edition"]);
    }

    // Validate publisher
    if(empty(trim($_POST["publisher"]))){
        $publisher_err = "Please confirm the book's publisher.";
    } else {
        $publisher = trim($_POST["publisher"]);
    }

    // Validate ISBN
    if(empty(trim($_POST["ISBN"]))){
        $ISBN_err = "Please enter the book's ISBN.";
    } elseif(!preg_match('/^[0-9]+$/', trim($_POST["ISBN"]))){
        $ISBN_err = "ISBN can only contain numbers.";
    } else {
        // Prepare a select statement
        $sql = "SELECT ISBN FROM books WHERE ISBN = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ISBN);

            // Set parameters
            $param_ISBN = trim($_POST["ISBN"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $ISBN_err = "This ISBN is already in your book request.";
                } else {
                    $ISBN = trim($_POST["ISBN"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="bookReq" content="width=device-width,initial-scale=1">
    <head>
        <title>
            Book Request Form
        </title>
    </head>
<link rel="stylesheet" type="text/css" href="style.css">

