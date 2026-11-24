<?php
require_once __DIR__ . "/../includes/config.php";

include "includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars((string)($value ?? ""), ENT_QUOTES, "UTF-8");
    }
}

$message = "";
$success = false;
$showButton = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Button was clicked: verify now
    $token = trim($_POST['token'] ?? '');
    $result = $token === '' ? null
        : apiRequest("POST", $mainURL . "/api/users/verify", ["token" => $token]);

    if ($result === null) {
        $message = "Verification isn't working right now. Try again later.";
    } else {
        $success = !empty($result['success']);
        $message = $result['message'] ?? "Something went wrong.";
    }
} else {
    // Link was opened: just show the button (email scanners won't click it)
    $token = trim($_GET['token'] ?? '');
    if ($token === '') {
        $message = "No verification token was provided.";
    } else {
        $showButton = true;
    }
}
?>

<h2>Email Verification</h2>

<div class="w3-section">
    <?php if ($showButton): ?>
        <p>Click the button below to verify your Native Tweet account.</p>
        <form method="POST" action="verify.php">
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <input type="submit" value="Verify my email">
        </form>
    <?php elseif ($success): ?>
        <p><?php echo e($message); ?></p>
        <p><a href="login.php?page=login">Go to login</a></p>
    <?php else: ?>
        <div class="gerror"><?php echo e($message); ?></div>
        <p><a href="login.php?page=register">Back to registration</a></p>
    <?php endif; ?>
</div>

<BR><BR><BR><BR>

<?php include "includes/footer.php"; ?>