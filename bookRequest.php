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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <head>
        <title>Book Request Form</title>
    </head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        <div class="bookReqForm">
            <!--<img src="images/avatar.png" class ="avatar" alt="Avatar"> -->
            <h1>Book Request Form</h1>
            <h2>Enter the book's information that you would like to request.</h2><br/>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <p>Title</p>
                    <label>
                        <input type="text" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>" placeholder="Enter the Book's Title">
                        <span class="invalid-feedback"><?php echo $title_err; ?></span>
                    </label>

                <p>Author</p>
                    <label>
                        <input type="text" name="author" class="form-control <?php echo (!empty($author_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $author; ?>" placeholder="Enter Author's Name">
                        <span class="invalid-feedback"><?php echo $author_err; ?></span>
                    </label>

                <p>Edition</p>
                    <label>
                        <input type="text" name="edition" class="form-control <?php echo (!empty($edition_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $edition; ?>" placeholder="Enter tbe Book's Edition">
                        <span class="invalid-feedback"><?php echo $edition_err; ?></span>
                    </label>

                <p>Publisher </p>
                    <label>
                        <input type="text" name="publisher" class="form-control <?php echo (!empty($publisher_err)) ? 'is-invalid': ''; ?>" value="<?php echo $publisher; ?>" placeholder="Enter the Publisher">
                        <span class="invalid-feedback"><?php echo $publisher_err; ?></span>
                    </label>

                <p>ISBN</p>
                    <label>
                        <input type="text" name="ISBN" class="form-control <?php echo(!empty($ISBN_err)) ? 'is-invalid': ''; ?>" value="<?php echo $ISBN; ?>" placeholder="Enter the ISBN">
                        <span class="invalid-feedback"><?php echo $ISBN_err; ?></span>
                    </label>

                <input type="submit" name="" value="Submit"><br/>
            </form>
        </div>
    </body>
</html>

