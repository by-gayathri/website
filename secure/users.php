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
  <title>Admin Dashboard • Geeks' Consulting & IT Services</title>
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
            <p class="text-xs text-gray-600 m-0">Admin Dashboard</p>
          </div>
        </a>
        <div class="flex items-center gap-4">
          <div class="text-right hidden sm:block">
            <p class="text-sm font-semibold text-gray-900">Admin</p>
            <p class="text-xs text-gray-600"><?= htmlspecialchars($_SESSION["admin_userid"] ?? "admin") ?></p>
          </div>
          <a href="/logout.php" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-smooth text-sm font-semibold">
            Logout
          </a>
        </div>
      </div>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-900">Secure Admin Section</h1>
      <p class="text-gray-600 mt-2">Manage and view current system users</p>
    </div>

    <!-- Stats Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm font-medium">Total Users</p>
            <p class="text-3xl font-bold text-gray-900 mt-2"><?= count($users) ?></p>
          </div>
          <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm font-medium">Logged In As</p>
            <p class="text-xl font-bold text-gray-900 mt-2"><?= htmlspecialchars($_SESSION["admin_userid"] ?? "admin") ?></p>
          </div>
          <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-gray-600 text-sm font-medium">Status</p>
            <p class="text-xl font-bold text-green-600 mt-2">Active</p>
          </div>
          <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Users List Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <h2 class="text-lg font-bold text-gray-900">Current Users</h2>
      </div>

      <?php if (empty($users)): ?>
        <div class="px-6 py-12 text-center">
          <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <p class="text-gray-600 font-semibold">No users registered</p>
          <p class="text-gray-500 text-sm mt-1">Users will appear here once registered in the system</p>
          <p class="text-gray-500 text-xs mt-3">Check <code class="bg-gray-100 px-2 py-1 rounded">data/users.txt</code> for raw data</p>
        </div>
      <?php else: ?>
        <div class="overflow-x-auto">
          <ul class="divide-y divide-gray-200">
            <?php foreach ($users as $idx => $u): ?>
              <li class="px-6 py-4 hover:bg-blue-50 transition-smooth">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-bold text-sm"><?= strtoupper(substr($u, 0, 1)) ?></span>
                  </div>
                  <div class="flex-1">
                    <p class="text-gray-900 font-semibold"><?= htmlspecialchars($u) ?></p>
                    <p class="text-gray-600 text-sm">User #<?= $idx + 1 ?></p>
                  </div>
                  <div class="text-right">
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Active</span>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 grid md:grid-cols-2 gap-6">
      <a href="/index.php" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-smooth">
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4"></path>
            </svg>
          </div>
          <div>
            <h3 class="font-semibold text-gray-900">Back to Home</h3>
            <p class="text-sm text-gray-600">Return to the main website</p>
          </div>
        </div>
      </a>

      <a href="/users.php" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-smooth">
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"></path>
            </svg>
          </div>
          <div>
            <h3 class="font-semibold text-gray-900">Manage All Users</h3>
            <p class="text-sm text-gray-600">Full database user management</p>
          </div>
        </div>
      </a>
    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t border-gray-200 bg-white mt-16 py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <p class="text-center text-sm text-gray-600">
        &copy; 2024 Geeks' Consulting &amp; IT Services. Admin Dashboard.
      </p>
    </div>
  </footer>
</body>
</html>