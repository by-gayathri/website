<?php
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("api-integration");
add_recent_product("api-integration");
$pageTitle="API Integration • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">API Integration</h1>
  <p class="text-lg text-gray-600">Connect your website to third-party services like payments, email, maps, or analytics.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
      </svg>
      <h2 class="text-2xl font-bold">Seamless Connections</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Integration Services</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Payment Gateway Integration</h4>
            <p class="text-gray-600 text-sm">Connect Stripe, PayPal, or other payment processors</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Email & Notification APIs</h4>
            <p class="text-gray-600 text-sm">SendGrid, Mailgun, or transactional email services</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Webhook & Real-time Updates</h4>
            <p class="text-gray-600 text-sm">Real-time notifications and event handling</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Error Handling & Retries</h4>
            <p class="text-gray-600 text-sm">Robust failure recovery and logging</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-green-600 to-green-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Connect Services</h3>
      <p class="text-green-100 text-sm mb-6">Let's integrate the tools your business needs.</p>
      <a href="/contact.php" class="block w-full bg-white text-green-600 py-2 rounded-lg font-semibold hover:bg-green-50 transition-smooth text-center mb-4">
        Request Integration
      </a>
      <a href="/services.php" class="block w-full bg-green-700 text-white py-2 rounded-lg font-semibold hover:bg-green-800 transition-smooth text-center text-sm">
        More Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Related Solutions</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/backend.php" class="p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Backend Development</h4>
      <p class="text-sm text-gray-600 mt-1">APIs and server infrastructure</p>
    </a>
    <a href="/products/database-design.php" class="p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Database Design</h4>
      <p class="text-sm text-gray-600 mt-1">Data architecture</p>
    </a>
    <a href="/products/security-hardening.php" class="p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Security Hardening</h4>
      <p class="text-sm text-gray-600 mt-1">Secure integrations</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>