<?php
// going to have to edit and change this to fit our project
function secure_email($field) {
    // sanitize email removes illegal characters
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    // filter validate validates the email and returns true if valid
    if (field_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}

// change email to to....??????
$email_to = 'name @ company.com';
$subject = 'Book Request Update';
$message = 'Make sure to submit your book requests by 12/12/21.';
$headers = 'From noreply UCF bookstore.';
// here we check if the email address is invalid using secure check
$secure_check = secure_email($to_email);
if ($secure_email == false) {
    echo "Invalid Input";
} 
else {
    mail($to_email, $subject, $message, $headers);
    echo "This email has been sent.";
}
?>