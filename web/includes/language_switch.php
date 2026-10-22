<?php
session_start(); //

// Define allowed languages to secure app from malicious file inclusion
$allowed_langs = ['en', 'ru', 'uk', 'es'];
$default_lang  = 'en';

// Check if a language change request was made via the URL (?lang=xx)
if (isset($_GET['lang']) && in_array($_GET['lang'], $allowed_langs)) {
    $_SESSION['lang'] = $_GET['lang'];
    
    // Redirect to clean up the URL parameters and refresh the page
    $clean_url = strtok($_SERVER['REQUEST_URI'], '?');
    header("Location: " . $clean_url);
    exit();
}

// Fallback to the session language or the default language
$current_lang = $_SESSION['lang'] ?? $default_lang;

// Load the appropriate language file safely
$lang = include "languages/{$current_lang}.php";
?>
