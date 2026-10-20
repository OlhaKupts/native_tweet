<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

require_once dirname(__DIR__,1) . "/includes/config.php";
require_once dirname(__DIR__,1) . "/includes/WFDatabase.php";

include "includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";
include "includes/language_switch.php"; // Include the language switcher logic
?>

<html lang="<?php echo $current_lang; ?>">
<head>
    <title>PHP Language Switcher</title>
    <style>
        .lang-switcher a { margin-right: 10px; font-weight: bold; text-decoration: none; }
        .lang-switcher .active { color: green; text-decoration: underline; }
    </style>
</head>
<body>

    <!-- Language Selector Dropdown/Links -->
    <div class="lang-switcher">
        <a href="?lang=en" class="<?php echo $current_lang === 'en' ? 'active' : ''; ?>">English</a>
        <a href="?lang=ru" class="<?php echo $current_lang === 'ru' ? 'active' : ''; ?>">Русский</a>
        <a href="?lang=uk" class="<?php echo $current_lang === 'uk' ? 'active' : ''; ?>">Українська</a>
        <a href="?lang=es" class="<?php echo $current_lang === 'es' ? 'active' : ''; ?>">Español</a>
    </div>

    <!-- Translated Content Display -->
    <h1><?php echo $lang['welcome_message']; ?></h1>
    <p><?php echo $lang['description']; ?></p>

</body>
</html>

<?PHP
include "includes/footer.php";
?>