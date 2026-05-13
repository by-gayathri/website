<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . "/includes/auth.php";

// Determine login type
$login_type = $_GET["type"] ?? "user"; // "user" or "admin"

// If already logged in, redirect
if (is_user_logged_in() && $login_type === "user") {
  header("Location: /dashboard.php");
  exit;
}
if (is_admin_logged_in() && $login_type === "admin") {
  header("Location: /secure/users.php");
  exit;
}

$error = "";
$userid = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($login_type === "admin") {
    // Admin Login
    $userid = trim($_POST["userid"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($userid === ADMIN_ID && password_verify($password, ADMIN_PASSWORD_HASH)) {
      session_regenerate_id(true);
      $_SESSION["is_admin"] = true;
      $_SESSION["admin_userid"] = $userid;

      header("Location: /secure/users.php");
      exit;
    } else {
      $error = "Invalid userid or password.";
    }
  } else {
    // User Login
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {
      $error = "Email and password are required";
    } else {
      $result = login_user($email, $password);
      
      if ($result["success"]) {
        $redirect = $_SESSION["redirect_after_login"] ?? "/dashboard.php";
        unset($_SESSION["redirect_after_login"]);
        header("Location: " . $redirect);
        exit;
      } else {
        $error = $result["error"];
      }
    }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $login_type === 'admin' ? 'Admin Login' : 'User Login' ?> • Geeks' Consulting & IT Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Header -->
  <header class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <a href="/index.php" class="flex items-center gap-2 no-underline">
          <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
            <span class="text-white font-bold text-sm">GC</span>
          </div>
          <div class="hidden sm:block">
            <h1 class="text-lg font-bold text-gray-900 m-0">Geeks' Consulting</h1>
            <p class="text-xs text-gray-600 m-0">Build • Automate • Deploy</p>
          </div>
        </a>
        <a href="/index.php" class="text-gray-600 hover:text-gray-900 transition-smooth">← Back to Home</a>
      </div>
    </div>
  </header>

  <main class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
      <!-- Login Card -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
        <!-- Tab Navigation -->
        <div class="flex gap-2 mb-8 border-b border-gray-200">
          <a href="/login.php?type=user" class="px-4 py-3 font-semibold text-sm <?= $login_type === 'user' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-900' ?>">
            User Login
          </a>
          <a href="/login.php?type=admin" class="px-4 py-3 font-semibold text-sm <?= $login_type === 'admin' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-900' ?>">
            Admin Login
          </a>
        </div>

        <div class="mb-8">
          <h1 class="text-2xl font-bold text-gray-900"><?= $login_type === 'admin' ? 'Admin Login' : 'User Login' ?></h1>
          <p class="text-gray-600 text-sm mt-1">
            <?= $login_type === 'admin' ? 'Secure administrator access required' : 'Sign in to your account' ?>
          </p>
        </div>

        <?php if ($error): ?>
          <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
            <p class="text-red-800 text-sm font-semibold"><?= htmlspecialchars($error) ?></p>
          </div>
        <?php endif; ?>

        <form method="post" action="/login.php?type=<?= $login_type ?>" class="space-y-4">
          <?php if ($login_type === 'admin'): ?>
            <!-- Admin User ID Field -->
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
          <?php else: ?>
            <!-- User Email Field -->
            <div>
              <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email Address</label>
              <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($email) ?>"
                placeholder="your@email.com"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-smooth"
              />
            </div>
          <?php endif; ?>

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

          <!-- Submit Button and SSO -->
          <div class="flex gap-3 mt-6">
            <button
              type="submit"
              class="flex-1 bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-smooth"
            >
              Sign In
            </button>
            <a
              href="https://mansiguptacs.com/ourmarketplace/"
              target="_blank"
              rel="noopener noreferrer"
              class="flex-1 bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-smooth text-center flex items-center justify-center no-underline"
            >
              SSO
            </a>
          </div>
        </form>

        <!-- Footer -->
        <div class="mt-6 pt-6 border-t border-gray-200">
          <?php if ($login_type === 'user'): ?>
            <p class="text-center text-sm text-gray-600">
              Don't have an account? <a href="/register.php" class="text-blue-600 font-semibold hover:text-blue-700">Create one</a>
            </p>
          <?php else: ?>
            <p class="text-center text-sm text-gray-600">
              Need help? <a href="/contact.php" class="text-blue-600 font-semibold hover:text-blue-700">Contact us</a>
            </p>
          <?php endif; ?>
        </div>

        <!-- Footer -->
        <div class="mt-6 pt-6 border-t border-gray-200">
          <p class="text-center text-sm text-gray-600">
            Need help? <a href="/contact.php" class="text-blue-600 font-semibold hover:text-blue-700">Contact us</a>
          </p>
        </div>
      </div>

      <!-- Alternative Links -->
      <div class="mt-6 text-center">
        <p class="text-gray-600 text-sm">
          <a href="/index.php" class="text-blue-600 font-semibold hover:text-blue-700">← Back to Home</a>
        </p>
      </div>
    </div>
  </main>
</body>
</html>