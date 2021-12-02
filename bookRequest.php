<!--TODO: Add backend functionality for quantity of books to order and class that the books are being ordered for-->
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
    if(empty(trim($_POST["author"]))){
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
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Book Request Form</title>
    </head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <body id="order-body">
        <div class="order-header">
            <h1></h1>
        </div>
        <div class="order-form">
            <img src="images/avatar.png" class="avatar" alt="Avatar Image">
            <h1>Book Order Form</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
            <div class="order-info">
                    <p>Book Title</p>
                        <input id="book-title" type="text" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>" placeholder="Enter the Book Title" required>
                        <span class="invalid-feedback"><?php echo $title_err; ?></span>

                    <p>Author Name(s)</p>
                        <input id="book-auth" type="text" name="author"  class="form-control <?php echo (!empty($author_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $author; ?>" placeholder="Enter the Author Name(s)" required>
                        <span class="invalid-feedback"><?php echo $author_err; ?></span>

                    <p>Book Edition</p>
                        <input id="book-ed" type="text" name="edition" class="form-control <?php echo (!empty($edition_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $edition; ?>" placeholder="Enter the Book Edition Number" required>
                        <span class="invalid-feedback"><?php echo $edition_err; ?></span>

                    <p>Book Publisher</p>
                        <input id="book-pub" type="text" name="publisher" class="form-control <?php echo (!empty($publisher_err)) ? 'is-invalid': ''; ?>" value="<?php echo $publisher; ?>" placeholder="Enter the Book Publisher Name" required>
                        <span class="invalid-feedback"><?php echo $publisher_err; ?></span>

                    <p>ISBN</p>
                        <input id="book-isbn" type="text" name="ISBN" class="form-control <?php echo(!empty($ISBN_err)) ? 'is-invalid': ''; ?>" value="<?php echo $ISBN; ?>"  placeholder="Enter the 13 Digit ISBN" required minlength="13" maxlength="15">
                        <span class="invalid-feedback"><?php echo $ISBN_err; ?></span>

                    <p>Total Number of Books To Be Ordered</p>
                        <input id="book-qty" type="number" name="book_qty" placeholder="Enter the Amount of Books to Deliver" required min="1" >

                    <p>Class For Which Books Will Be Ordered For</p>
                        <input id="class-book" type="text" name="class" placeholder="Enter the Course Code" required>

                </div>
                <input id="order-submit" class="order-info" type="submit" name="" value="Submit"><br/>
            </form>
        </div>
    </body>
</html>