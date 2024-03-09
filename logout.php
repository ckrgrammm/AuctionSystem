<?php
session_start(); // Start the session.

// Destroy the session.
session_destroy();

// Prepare a JavaScript to show a logout message.
echo "<script>
        alert('Logged out successfully.');
        window.location.href='index.php';
      </script>";
exit();
