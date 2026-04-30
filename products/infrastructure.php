<?php
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
add_recent_product("infrastructure");
increment_product_visit("infrastructure");
$pageTitle="Infrastructure Setup • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">Infrastructure Setup</h1>
  <p class="text-lg text-gray-600">Reliable hosting and deployment configuration for consistent application performance.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-slate-500 to-slate-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
      </svg>
      <h2 class="text-2xl font-bold">Deployment Excellence</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Infrastructure Services</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-slate-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Server Setup & Configuration</h4>
            <p class="text-gray-600 text-sm">LAMP stack installation and environment configuration</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-slate-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Environment Variables & Secrets</h4>
            <p class="text-gray-600 text-sm">Secure handling of configuration and sensitive data</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-slate-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Backups & Disaster Recovery</h4>
            <p class="text-gray-600 text-sm">Regular backups with restore testing</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-slate-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Deployment & Monitoring</h4>
            <p class="text-gray-600 text-sm">Workflow documentation and basic uptime monitoring</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-slate-600 to-slate-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Setup Infrastructure</h3>
      <p class="text-slate-100 text-sm mb-6">Let's build a solid foundation for your application.</p>
      <a href="/contact.php" class="block w-full bg-white text-slate-600 py-2 rounded-lg font-semibold hover:bg-slate-50 transition-smooth text-center mb-4">
        Get Started
      </a>
      <a href="/services.php" class="block w-full bg-slate-700 text-white py-2 rounded-lg font-semibold hover:bg-slate-800 transition-smooth text-center text-sm">
        Other Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Complementary Services</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/backend.php" class="p-4 border border-gray-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Backend Development</h4>
      <p class="text-sm text-gray-600 mt-1">Application code</p>
    </a>
    <a href="/products/security-hardening.php" class="p-4 border border-gray-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Security Hardening</h4>
      <p class="text-sm text-gray-600 mt-1">Server security</p>
    </a>
    <a href="/products/maintenance-support.php" class="p-4 border border-gray-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Maintenance & Support</h4>
      <p class="text-sm text-gray-600 mt-1">Ongoing management</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>