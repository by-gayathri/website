<?php
// includes/auth.php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/../db.php";

// Hard-coded admin user id per assignment requirement
const ADMIN_ID = "admin";
const ADMIN_PASSWORD_HASH = '$2y$12$f2j4GqGw/WapS7nSjPUho.vly4We9JzJkDWZgwy40xpMQrr1EFqeC';

// =====================
// ADMIN FUNCTIONS
// =====================
function require_admin_login(): void {
  if (empty($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: /login.php");
    exit;
  }
}

function is_admin_logged_in(): bool {
  return !empty($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true;
}

// =====================
// USER FUNCTIONS
// =====================
function is_user_logged_in(): bool {
  return !empty($_SESSION["user_id"]) && !empty($_SESSION["user_email"]);
}

function require_user_login(): void {
  if (!is_user_logged_in()) {
    $_SESSION["redirect_after_login"] = $_SERVER["REQUEST_URI"];
    header("Location: /login.php?type=user");
    exit;
  }
}

function get_logged_in_user(): ?array {
  if (!is_user_logged_in()) {
    return null;
  }
  
  global $pdo;
  try {
    $stmt = $pdo->prepare("SELECT id, name, email, created_at FROM users WHERE id = ? AND email = ?");
    $stmt->execute([$_SESSION["user_id"], $_SESSION["user_email"]]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
  } catch (Exception $e) {
    return null;
  }
}

function register_user(string $name, string $email, string $password): array {
  global $pdo;
  
  // Validate inputs
  if (strlen($name) < 2 || strlen($name) > 100) {
    return ["success" => false, "error" => "Name must be between 2 and 100 characters"];
  }
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return ["success" => false, "error" => "Invalid email address"];
  }
  
  if (strlen($password) < 6) {
    return ["success" => false, "error" => "Password must be at least 6 characters"];
  }
  
  // Check if email already exists
  try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
      return ["success" => false, "error" => "Email already registered"];
    }
  } catch (Exception $e) {
    return ["success" => false, "error" => "Database error: " . $e->getMessage()];
  }
  
  // Hash password and insert user
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
  
  try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $password_hash]);
    
    return [
      "success" => true,
      "user_id" => $pdo->lastInsertId(),
      "message" => "Registration successful! You can now login."
    ];
  } catch (Exception $e) {
    return ["success" => false, "error" => "Registration failed: " . $e->getMessage()];
  }
}

function login_user(string $email, string $password): array {
  global $pdo;
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return ["success" => false, "error" => "Invalid email address"];
  }
  
  try {
    $stmt = $pdo->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
      return ["success" => false, "error" => "Email not found"];
    }
    
    if (!password_verify($password, $user["password"])) {
      return ["success" => false, "error" => "Invalid password"];
    }
    
    // Set session
    session_regenerate_id(true);
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user_email"] = $user["email"];
    $_SESSION["user_name"] = $user["name"];
    
    return [
      "success" => true,
      "user_id" => $user["id"],
      "message" => "Login successful"
    ];
  } catch (Exception $e) {
    return ["success" => false, "error" => "Login error: " . $e->getMessage()];
  }
}

function logout_user(): void {
  $_SESSION = [];
  session_destroy();
  header("Location: /index.php");
  exit;
}
?>