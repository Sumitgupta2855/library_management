<?php
// Start the session and destroy it
session_start();
session_destroy();

// Redirect to the homepage
header('Location: ../index.html');
exit;
?>
