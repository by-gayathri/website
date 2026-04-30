<?php
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
add_recent_product("frontend");
increment_product_visit("frontend");
$pageTitle="Frontend Development • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">Frontend Development</h1>
  <p class="text-lg text-gray-600">Modern, responsive interfaces that work seamlessly across all devices and browsers.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
      </svg>
      <h2 class="text-2xl font-bold">Beautiful User Experiences</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">What We Deliver</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Responsive Design</h4>
            <p class="text-gray-600 text-sm">Works beautifully on all devices - desktop, tablet, and mobile</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Semantic HTML & CSS</h4>
            <p class="text-gray-600 text-sm">Clean, maintainable code following web standards and best practices</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">JavaScript Interactivity</h4>
            <p class="text-gray-600 text-sm">Dynamic interactions and smooth user experience with modern JavaScript</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Accessibility & Performance</h4>
            <p class="text-gray-600 text-sm">Fast-loading, accessible interfaces that work for everyone</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Let's create together</h3>
      <p class="text-purple-100 text-sm mb-6">Discuss your frontend vision and design requirements.</p>
      <a href="/contact.php" class="block w-full bg-white text-purple-600 py-2 rounded-lg font-semibold hover:bg-purple-50 transition-smooth text-center mb-4">
        Start a Project
      </a>
      <a href="/services.php" class="block w-full bg-purple-700 text-white py-2 rounded-lg font-semibold hover:bg-purple-800 transition-smooth text-center text-sm">
        Other Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Pair With Backend</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/backend.php" class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Backend Development</h4>
      <p class="text-sm text-gray-600 mt-1">Server-side systems and APIs</p>
    </a>
    <a href="/products/test-automation.php" class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Test Automation</h4>
      <p class="text-sm text-gray-600 mt-1">Quality assurance and testing</p>
    </a>
    <a href="/products/performance-optimization.php" class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Performance Tuning</h4>
      <p class="text-sm text-gray-600 mt-1">Speed and optimization</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>