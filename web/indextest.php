<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

require_once dirname(__DIR__,1) . "/includes/config.php";
require_once dirname(__DIR__,1) . "/includes/WFDatabase.php";
require_once "init.php";

$page = new Layout("Native Tweet", $url, $linkName);
$page->renderHeader();


$page->renderFooter();
?>