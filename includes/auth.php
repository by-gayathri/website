<?php
// includes/auth.php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Hard-coded admin user id per assignment requirement
const ADMIN_ID = "admin";

// Store a hashed password (recommended) instead of plain text.
const ADMIN_PASSWORD_HASH = '$2y$12$f2j4GqGw/WapS7nSjPUho.vly4We9JzJkDWZgwy40xpMQrr1EFqeC';

function require_admin_login(): void {
  if (empty($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: /login.php");
    exit;
  }
}