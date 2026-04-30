<?php
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
add_recent_product("security-hardening");
increment_product_visit("security-hardening");
$pageTitle="Security Hardening • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">Security Hardening</h1>
  <p class="text-lg text-gray-600">Practical security improvements to reduce vulnerabilities and protect your application.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
      </svg>
      <h2 class="text-2xl font-bold">Defense & Protection</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Security Solutions</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Input Validation & Output Escaping</h4>
            <p class="text-gray-600 text-sm">Prevent injection attacks and data corruption</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Session & Cookie Security</h4>
            <p class="text-gray-600 text-sm">Secure authentication and session handling</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Access Control</h4>
            <p class="text-gray-600 text-sm">Role-based permissions and authorization</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Server Hardening</h4>
            <p class="text-gray-600 text-sm">Configuration best practices and checklist</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Secure Your App</h3>
      <p class="text-yellow-100 text-sm mb-6">Let's harden your application against common threats.</p>
      <a href="/contact.php" class="block w-full bg-white text-yellow-600 py-2 rounded-lg font-semibold hover:bg-yellow-50 transition-smooth text-center mb-4">
        Request Audit
      </a>
      <a href="/services.php" class="block w-full bg-yellow-700 text-white py-2 rounded-lg font-semibold hover:bg-yellow-800 transition-smooth text-center text-sm">
        More Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Complementary Services</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/backend.php" class="p-4 border border-gray-200 rounded-lg hover:border-yellow-300 hover:bg-yellow-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Backend Development</h4>
      <p class="text-sm text-gray-600 mt-1">Secure APIs</p>
    </a>
    <a href="/products/test-automation.php" class="p-4 border border-gray-200 rounded-lg hover:border-yellow-300 hover:bg-yellow-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Test Automation</h4>
      <p class="text-sm text-gray-600 mt-1">Security testing</p>
    </a>
    <a href="/products/infrastructure.php" class="p-4 border border-gray-200 rounded-lg hover:border-yellow-300 hover:bg-yellow-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Infrastructure Setup</h4>
      <p class="text-sm text-gray-600 mt-1">Server security</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>