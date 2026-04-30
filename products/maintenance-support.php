<?php
$pageTitle="Maintenance & Support • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("maintenance-support");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("maintenance-support");
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">Maintenance & Support</h1>
  <p class="text-lg text-gray-600">Keep your website reliable with regular updates, monitoring, and proactive improvements.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-teal-500 to-teal-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7 8a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <h2 class="text-2xl font-bold">Always Supported</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Support Services</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Regular Updates & Patches</h4>
            <p class="text-gray-600 text-sm">Keep dependencies and frameworks current and secure</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Backup & Restore Management</h4>
            <p class="text-gray-600 text-sm">Regular backups with periodic restore testing</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Bug Fixes & Minor Features</h4>
            <p class="text-gray-600 text-sm">Address issues and implement small improvements</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Monitoring & Alerting</h4>
            <p class="text-gray-600 text-sm">Basic uptime checks and error log monitoring</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-teal-600 to-teal-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Get Support Plan</h3>
      <p class="text-teal-100 text-sm mb-6">Keep your application running smoothly with ongoing support.</p>
      <a href="/contact.php" class="block w-full bg-white text-teal-600 py-2 rounded-lg font-semibold hover:bg-teal-50 transition-smooth text-center mb-4">
        Choose Plan
      </a>
      <a href="/services.php" class="block w-full bg-teal-700 text-white py-2 rounded-lg font-semibold hover:bg-teal-800 transition-smooth text-center text-sm">
        Other Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Complementary Services</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/infrastructure.php" class="p-4 border border-gray-200 rounded-lg hover:border-teal-300 hover:bg-teal-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Infrastructure Setup</h4>
      <p class="text-sm text-gray-600 mt-1">Foundation setup</p>
    </a>
    <a href="/products/security-hardening.php" class="p-4 border border-gray-200 rounded-lg hover:border-teal-300 hover:bg-teal-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Security Hardening</h4>
      <p class="text-sm text-gray-600 mt-1">Security checks</p>
    </a>
    <a href="/products/performance-optimization.php" class="p-4 border border-gray-200 rounded-lg hover:border-teal-300 hover:bg-teal-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Performance Optimization</h4>
      <p class="text-sm text-gray-600 mt-1">Speed monitoring</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>