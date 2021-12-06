<!-- Broadcasting an email to request the professors to submit their book requests by a certain deadline -->
<?php
require_once "config.php";
// going to have to edit and change this to fit our project
function secure_email($field) {
    // sanitize email removes illegal characters
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    // filter validate validates the email and returns true if valid
    if (field_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// change email to to....??????
$email_to = 'Professor at UCF';
$subject = 'Book Request Update';
// might need to update url to book website
$message = 'Make sure to submit your book requests by 12/12/21. Need to login? Login here: loginPage.php!';
$headers = 'From noreply UCF bookstore.';
// here we check if the email address is invalid using secure check
$secure_check = secure_email($to_email);
if ($secure_email == false) {
    echo "Invalid Input";
} else {
    mail($to_email, $subject, $message, $headers);
    echo "This email has been sent.";
}
?>