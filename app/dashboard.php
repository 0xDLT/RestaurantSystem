<?php
session_start();

// Assuming you have stored the user's role in the session after login
// For example: $_SESSION['role'] = 'admin';

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    echo "Hello, World!";
} else {
    // Optionally handle cases for non-admin users
    echo "Access Denied. You do not have permission to view this page.";
}
?>
