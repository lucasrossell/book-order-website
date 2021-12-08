<!-- This is where professors can create book request for what books they need -->
<?php
// Gather session details
session_start();
require_once "config.php";

// Define variables and initialize with empty values
$title = $author = $edition = $publisher = $ISBN = $book_qty = $class = $semester = "";
$title_err = $author_err = $edition_err = $publisher_err = $ISBN_err = $book_qty_err = $class_err ="";

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

    // Validate quantity of books
    if(empty(trim($_POST["book_qty"]))){
        $book_qty_err = "Must order at least one book.";
    } else {
        $book_qty = trim($_POST["book_qty"]);
    }

    // Validate quantity of books
    if(empty(trim($_POST["class"]))){
        $class_err = "Must insert class number.";
    } else {
        $class = trim($_POST["class"]);
    }

    // Validate quantity of books
    if(empty(trim($_POST["semester"]))){
        $semester_err = "Must insert semester in format `Semester Year` like `Fall 2021`.";
    } else {
        $semester = trim($_POST["semester"]);
    }
    
    // Validate ISBN
    if(empty(trim($_POST["ISBN"]))){
        $ISBN_err = "Please enter the book's ISBN.";
    } elseif(!preg_match('/^[0-9]+$/', trim($_POST["ISBN"]))){
        $ISBN_err = "ISBN can only contain numbers.";
    } else {

        $sql="INSERT INTO books(title, author, edition, publisher, book_qty, order_id, ISBN, class, semester, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_title, $param_author, $param_ed, $param_pub, $param_qty, $param_ord_id, $param_ISBN, $param_class, $param_sem, $param_user);

            // Set parameters
            $param_title = trim($_POST["title"]);
            $param_author = trim($_POST["author"]);
            $param_ed = trim($_POST["edition"]);
            $param_pub = trim($_POST["publisher"]);
            $param_qty = trim($_POST["book_qty"]);
            $param_ord_id = NULL;
            $param_ISBN = trim($_POST["ISBN"]);
            $param_class = trim($_POST["class"]);
            $param_sem = trim($_POST["semester"]);
            $param_user = $_SESSION["username"];
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* success */
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($link);

    // Redirect to dashboard once submit is clicked.
    if(isset($_POST['submit'])) {
        header("location: openOrder.php");
        exit;
    }
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
        <div id="sidebar-nav" class="sidebar-nav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="profDash.php">Home</a> <!-- Home button-->
            <a class="active-nav" href="bookRequest.php">New Book Order </a>
            <a href="openOrder.php">View/Edit Open Order</a>
            <a href="profchangePass.php">Change Password</a>
            <a href="logoutPage.php">Log-Out</a>
        </div>
        
        <div class="order-header">
            <h1></h1>
        </div>
        <div id="main" class="order-content">
            <div class="order-form">
                <img src="images/avatar.png" class="avatar" alt="Avatar Image">
                <h1><span id="menu-icon" style="color:white; font-size:20px;cursor:pointer" onclick="openNav()">&#9776;</span>Book Order Form</h1>
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
                        <input id="book-qty" type="text" name="book_qty" class="form-control <?php echo(!empty($book_qty_err)) ? 'is-invalid': '';?>" value="<?php echo $book_qty; ?>" placeholder="Enter the Amount of Books to Deliver" required min="1" >
                        <span class="invalid-feedback"><?php echo $book_qty_err; ?></span>

                        <p>Class For Which Books Will Be Ordered For</p>
                        <input id="class-book" type="text" name="class" placeholder="Enter the Course Code" required>

                        <p>Choose a semester</p>
                        <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                <option value="">--- Choose a type ---</option>
                                <option value="fall21" selected>Fall 2021</option>
                                <option value="spring22">Spring 2022</option>
                                <option value="summer22">Summer 2022</option>
                            </select>
                        </div>
                    </div>
                    <input id="order-submit" class="order-info" type="submit" name="submit" value="Submit"><br/>
                </form>
            </div>
        </div>
        <script>
            function openNav() {
                document.getElementById("sidebar-nav").style.width = "250px";
                document.getElementById("menu-icon").style.display = "none";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("sidebar-nav").style.width = "0";
                document.getElementById("menu-icon").style.display = "";
                document.getElementById("main").style.marginLeft= "0";
            }
        </script>

    </body>
</html>