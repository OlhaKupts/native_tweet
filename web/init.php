<?php
// 1. Session and global setup
include "includes/functions.php"; // Ensure this is included for the url() function

if (!isset($url)) {
    $url = url();
}
session_start();

if(!isset($_SESSION["LoginStatus"]) || $_SESSION["LoginStatus"]!="YES"){
    $linkName = "Login";
}else{
    $linkName = "Profile";
}

// 2. Load your OOP layout class
require_once 'classes/Layout.php';