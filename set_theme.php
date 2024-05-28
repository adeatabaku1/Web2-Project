<?php
if (isset($_POST['theme'])) {
    // Set the theme cookie and redirect to home page
    setcookie('theme', $_POST['theme'], time() + (86400 * 30), "/"); // Set for 30 days
    header('Location: home.php'); // Adjust the redirect as necessary
    exit;
} else {
    // If no theme was selected, redirect back to the home page or form page
    header('Location: home.php'); // You might redirect them back to the form instead
    exit;
}
?>
