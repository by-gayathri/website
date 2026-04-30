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
  <title>Admin Login • Geeks' Consulting & IT Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Header -->
  <header class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <a href="index.php" class="flex items-center gap-2 no-underline">
          <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
            <span class="text-white font-bold text-sm">GC</span>
          </div>
          <div class="hidden sm:block">
            <h1 class="text-lg font-bold text-gray-900 m-0">Geeks' Consulting</h1>
            <p class="text-xs text-gray-600 m-0">Build • Automate • Deploy</p>
          </div>
        </a>
        <a href="index.php" class="text-gray-600 hover:text-gray-900 transition-smooth">← Back to Home</a>
      </div>
    </div>
  </header>

  <main class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
      <!-- Login Card -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
        <div class="mb-8">
          <h1 class="text-2xl font-bold text-gray-900">Admin Login</h1>
          <p class="text-gray-600 text-sm mt-1">Secure administrator access required</p>
        </div>

        <?php if ($error): ?>
          <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
            <p class="text-red-800 text-sm font-semibold"><?= htmlspecialchars($error) ?></p>
          </div>
        <?php endif; ?>

        <form method="post" action="login.php" class="space-y-4">
          <!-- User ID Field -->
          <div>
            <label for="userid" class="block text-sm font-semibold text-gray-900 mb-2">User ID</label>
            <input
              type="text"
              id="userid"
              name="userid"
              value="<?= htmlspecialchars($userid) ?>"
              placeholder="Enter your user ID"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-smooth"
            />
          </div>

          <!-- Password Field -->
          <div>
            <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-smooth"
            />
          </div>

          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-smooth mt-6"
          >
            Sign In
          </button>
        </form>

        <!-- Footer -->
        <div class="mt-6 pt-6 border-t border-gray-200">
          <p class="text-center text-sm text-gray-600">
            Need help? <a href="contact.php" class="text-blue-600 font-semibold hover:text-blue-700">Contact us</a>
          </p>
        </div>
      </div>

      <!-- Alternative Links -->
      <div class="mt-6 text-center">
        <p class="text-gray-600 text-sm">
          <a href="index.php" class="text-blue-600 font-semibold hover:text-blue-700">← Back to Home</a>
        </p>
      </div>
    </div>
  </main>
</body>
</html>