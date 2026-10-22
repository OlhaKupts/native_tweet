<?PHP
 ini_set('display_errors', 0);
 error_reporting(E_ALL & ~E_NOTICE);
 session_start();
 session_destroy();
 header("location:../login.php?page=login");
 exit;
?>