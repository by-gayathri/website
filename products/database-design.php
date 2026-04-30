<?php
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
add_recent_product("database-design");
increment_product_visit("database-design");
$pageTitle="Database Design • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
?>

<div class="mb-8">
  <div class="flex items-center gap-3 mb-4">
    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-semibold">← Back to Services</a>
  </div>
  <h1 class="text-4xl font-bold text-gray-900 mb-2">Database Design</h1>
  <p class="text-lg text-gray-600">Scalable, normalized database schemas that make your application faster and easier to maintain.</p>
</div>

<div class="grid lg:grid-cols-3 gap-8 mb-12">
  <div class="lg:col-span-2">
    <!-- Hero Image -->
    <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-lg p-16 text-white text-center mb-8">
      <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7m0 0c0 2.21-3.582 4-8 4s-8-1.79-8-4m16 0c0-2.21-3.582-4-8-4S4 4.79 4 7m12-4v10c0 2.21-3.582 4-8 4s-8-1.79-8-4V7"></path>
      </svg>
      <h2 class="text-2xl font-bold">Data Architecture Excellence</h2>
    </div>

    <!-- Features -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-6">Database Services</h2>
      <ul class="space-y-4">
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Schema Planning & Normalization</h4>
            <p class="text-gray-600 text-sm">Tables, relationships, and normalized design</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Performance Indexing</h4>
            <p class="text-gray-600 text-sm">Strategic indexes for query optimization</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Data Integrity Constraints</h4>
            <p class="text-gray-600 text-sm">Foreign keys and validation rules</p>
          </div>
        </li>
        <li class="flex items-start gap-3">
          <svg class="w-6 h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <div>
            <h4 class="font-semibold text-gray-900">Migration & Upgrade Planning</h4>
            <p class="text-gray-600 text-sm">Safe schema updates with version control</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!-- Sidebar CTA -->
  <div class="lg:col-span-1">
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-lg p-8 text-white sticky top-24">
      <h3 class="text-xl font-bold mb-4">Design Your Database</h3>
      <p class="text-indigo-100 text-sm mb-6">Let's build a robust data foundation for your application.</p>
      <a href="/contact.php" class="block w-full bg-white text-indigo-600 py-2 rounded-lg font-semibold hover:bg-indigo-50 transition-smooth text-center mb-4">
        Consult Now
      </a>
      <a href="/services.php" class="block w-full bg-indigo-700 text-white py-2 rounded-lg font-semibold hover:bg-indigo-800 transition-smooth text-center text-sm">
        Other Services
      </a>
    </div>
  </div>
</div>

<!-- Related Services -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
  <h3 class="text-lg font-bold text-gray-900 mb-6">Complementary Services</h3>
  <div class="grid md:grid-cols-3 gap-4">
    <a href="/products/backend.php" class="p-4 border border-gray-200 rounded-lg hover:border-indigo-300 hover:bg-indigo-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Backend Development</h4>
      <p class="text-sm text-gray-600 mt-1">API and query implementation</p>
    </a>
    <a href="/products/api-integration.php" class="p-4 border border-gray-200 rounded-lg hover:border-indigo-300 hover:bg-indigo-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">API Integration</h4>
      <p class="text-sm text-gray-600 mt-1">Data exchange and services</p>
    </a>
    <a href="/products/performance-optimization.php" class="p-4 border border-gray-200 rounded-lg hover:border-indigo-300 hover:bg-indigo-50 transition-smooth">
      <h4 class="font-semibold text-gray-900">Performance Optimization</h4>
      <p class="text-sm text-gray-600 mt-1">Query tuning and caching</p>
    </a>
  </div>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>