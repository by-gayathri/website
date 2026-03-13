<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . "/includes/auth.php";

$error = "";
$userid = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $userid = trim($_POST["userid"] ?? "");
  $password = $_POST["password"] ?? "";

  if ($userid === ADMIN_ID && password_verify($password, ADMIN_PASSWORD_HASH)) {
    // Login success
    session_regenerate_id(true);
    $_SESSION["is_admin"] = true;
    $_SESSION["admin_userid"] = $userid;

    header("Location: /secure/users.php");
    exit;
  } else {
    $error = "Invalid userid or password.";
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
  <main class="container">
    <div class="card">
      <h1>Secure Section Login</h1>
      <p>Administrator access required.</p>

      <?php if ($error): ?>
        <p style="color:#b00020;"><strong><?= htmlspecialchars($error) ?></strong></p>
      <?php endif; ?>

      <form method="post" action="login.php">
        <label>
          <strong>User ID</strong><br />
          <input name="userid" value="<?= htmlspecialchars($userid) ?>" required />
        </label>
        <br /><br />
        <label>
          <strong>Password</strong><br />
          <input type="password" name="password" required />
        </label>
        <br /><br />
        <button type="submit">Login</button>
      </form>

      <p style="margin-top:12px;">
        <a href="index.php">Back to Home</a>
      </p>
    </div>
  </main>
</body>
</html>