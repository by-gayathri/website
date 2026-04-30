<?php
// includes/header.php
$pageTitle = $pageTitle ?? "Geeks' Consulting & IT Services";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    [x-cloak] { display: none !important; }
    .sidebar-link.active { @apply bg-blue-50 text-blue-700 border-l-4 border-blue-700; }
    .transition-smooth { @apply transition-all duration-200 ease-in-out; }
  </style>
</head>
<body class="bg-gray-50">
  <!-- Top Navigation Bar -->
  <header class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <!-- Logo & Brand -->
        <div class="flex items-center gap-3">
          <div class="flex items-center">
            <a href="index.php" class="flex items-center gap-2 no-underline">
              <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-sm">GC</span>
              </div>
              <div class="hidden sm:block">
                <h1 class="text-lg font-bold text-gray-900 m-0">Geeks' Consulting</h1>
                <p class="text-xs text-gray-600 m-0">Build • Automate • Deploy</p>
              </div>
            </a>
          </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-1">
          <a href="index.php" class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-smooth hover:bg-gray-100">Home</a>
          <a href="about.php" class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-smooth hover:bg-gray-100">About</a>
          <a href="services.php" class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-smooth hover:bg-gray-100">Services</a>
          <a href="news.php" class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-smooth hover:bg-gray-100">News</a>
          <a href="contact.php" class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-smooth hover:bg-gray-100">Contacts</a>
        </nav>

        <!-- Admin Links & Mobile Menu Button -->
        <div class="flex items-center gap-3">
          <div class="hidden sm:flex items-center gap-2">
            <a href="login.php" class="px-3 py-2 text-sm text-gray-700 rounded-md transition-smooth hover:bg-gray-100">Login</a>
            <a href="users.php" class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md transition-smooth hover:bg-blue-700">Users</a>
          </div>
          <!-- Mobile menu button -->
          <button class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100" onclick="toggleMobileMenu()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation (Hidden by default) -->
      <div id="mobileMenu" class="hidden md:hidden pb-4">
        <a href="index.php" class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">Home</a>
        <a href="about.php" class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">About</a>
        <a href="services.php" class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">Services</a>
        <a href="news.php" class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">News</a>
        <a href="contact.php" class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">Contacts</a>
        <a href="login.php" class="block px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">Login</a>
        <a href="users.php" class="block px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Users</a>
      </div>
    </div>
  </header>

  <script>
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    }
  </script>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">