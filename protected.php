<?php
session_start();
include '../db.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Get admin username from session
$admin_username = $_SESSION['admin_username'] ?? 'Admin';
?>