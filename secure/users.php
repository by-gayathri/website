<?php
declare(strict_types=1);

require_once __DIR__ . "/../includes/auth.php";
require_admin_login();

// Read users from text file
$usersFile = __DIR__ . "/../data/users.txt";
$users = [];

if (file_exists($usersFile)) {
  $lines = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    $name = trim($line);
    if ($name !== "") $users[] = $name;
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Secure – Current Users</title>
  <link rel="stylesheet" href="/assets/style.css" />
</head>
<body>
  <main class="container">
    <div class="card">
      <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
        <h1 style="margin:0;">Secure Section: Current Users</h1>
        <a href="/logout.php">Logout</a>
      </div>

      <p>Logged in as: <strong><?= htmlspecialchars($_SESSION["admin_userid"] ?? "admin") ?></strong></p>

      <?php if (empty($users)): ?>
        <p><strong>No users found.</strong> Please check <code>data/users.txt</code>.</p>
      <?php else: ?>
        <ul>
          <?php foreach ($users as $u): ?>
            <li><?= htmlspecialchars($u) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <p style="margin-top:12px;">
        <a href="/index.php">Back to Home</a>
      </p>
    </div>
  </main>
</body>
</html>