<?php
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
add_recent_product("test-automation");
increment_product_visit("test-automation");
$pageTitle="Test Automation • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">Test Automation</h1>
  <p class="text-lg text-gray-600">Automated tests reduce bugs and make releases safer with comprehensive coverage.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <h2 class="text-2xl font-bold">Quality Assurance</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Testing Services</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Unit Tests</h4>
            <p class="text-gray-600 text-sm">Core logic validation with comprehensive test coverage</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Integration Tests</h4>
            <p class="text-gray-600 text-sm">API and database functionality validation</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Regression Testing</h4>
            <p class="text-gray-600 text-sm">Checks for critical workflow breaks</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">CI/CD Integration</h4>
            <p class="text-gray-600 text-sm">Automated test reports and pipeline execution</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Add Test Coverage</h3>
      <p class="text-red-100 text-sm mb-6">Let's ensure your application quality with automated tests.</p>
      <a href="/contact.php" class="block w-full bg-white text-red-600 py-2 rounded-lg font-semibold hover:bg-red-50 transition-smooth text-center mb-4">
        Start Testing
      </a>
      <a href="/services.php" class="block w-full bg-red-700 text-white py-2 rounded-lg font-semibold hover:bg-red-800 transition-smooth text-center text-sm">
        More Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Complementary Services</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/backend.php" class="p-4 border border-gray-200 rounded-lg hover:border-red-300 hover:bg-red-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Backend Development</h4>
      <p class="text-sm text-gray-600 mt-1">Code foundations</p>
    </a>
    <a href="/products/frontend.php" class="p-4 border border-gray-200 rounded-lg hover:border-red-300 hover:bg-red-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Frontend Development</h4>
      <p class="text-sm text-gray-600 mt-1">UI testing</p>
    </a>
    <a href="/products/performance-optimization.php" class="p-4 border border-gray-200 rounded-lg hover:border-red-300 hover:bg-red-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Performance Optimization</h4>
      <p class="text-sm text-gray-600 mt-1">Speed testing</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>