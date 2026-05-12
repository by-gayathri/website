<?php
declare(strict_types=1);
session_start();

// Clear all session data
$_SESSION = [];
session_destroy();

// Redirect to home
header("Location: /index.php?logout=success");
exit;
?>