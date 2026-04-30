<?php
$pageTitle="CMS Setup • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("cms");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("cms");
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">CMS Setup</h1>
  <p class="text-lg text-gray-600">Configure powerful content management systems so you can publish with ease.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
      </svg>
      <h2 class="text-2xl font-bold">Content Management Made Easy</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">CMS Solutions</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-orange-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">WordPress Setup & Configuration</h4>
            <p class="text-gray-600 text-sm">Installation, themes, plugins, and initial configuration</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-orange-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Theme Customization</h4>
            <p class="text-gray-600 text-sm">Professional themes tailored to your brand</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-orange-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">SEO & Performance Plugins</h4>
            <p class="text-gray-600 text-sm">Search engine optimization and caching plugins</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-orange-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Content Structure & Training</h4>
            <p class="text-gray-600 text-sm">Setup pages, categories, menus, and user training</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-orange-600 to-orange-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Setup Your CMS</h3>
      <p class="text-orange-100 text-sm mb-6">Let's get your content management system running.</p>
      <a href="/contact.php" class="block w-full bg-white text-orange-600 py-2 rounded-lg font-semibold hover:bg-orange-50 transition-smooth text-center mb-4">
        Get Started
      </a>
      <a href="/services.php" class="block w-full bg-orange-700 text-white py-2 rounded-lg font-semibold hover:bg-orange-800 transition-smooth text-center text-sm">
        Other Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Complementary Services</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/frontend.php" class="p-4 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Frontend Development</h4>
      <p class="text-sm text-gray-600 mt-1">Custom design and UX</p>
    </a>
    <a href="/products/security-hardening.php" class="p-4 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Security Hardening</h4>
      <p class="text-sm text-gray-600 mt-1">Secure CMS configuration</p>
    </a>
    <a href="/products/performance-optimization.php" class="p-4 border border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Performance Optimization</h4>
      <p class="text-sm text-gray-600 mt-1">Speed and caching</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>