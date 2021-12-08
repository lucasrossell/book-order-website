<!-- Logout page -->
<?php
// Gather session details
session_start();

// Get session ready to end
$_SESSION = array();

// End the session and redirect to loginPage
session_destroy();
header("location:loginPage.php");
exit;
?>