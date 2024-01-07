<?php
if (!isset($_SESSION)) {
    session_start();
}

// Access session variables
if (isset($_SESSION['privilege'])) {
    $user_name = $_SESSION['username'];
    $user_employee_name = $_SESSION['employee_no'];
    $user_privilege = $_SESSION['privilege'];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login_page.php");
    exit;
}
