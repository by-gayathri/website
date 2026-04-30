<?php
$pageTitle="Services & Products • Geeks' Consulting & IT Services";
include "includes/header.php";
require_once __DIR__ . "/includes/recent_products_cookie.php";

$catalog = product_catalog();
$recent = get_recent_products();
?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">Services & Products</h1>
  <p class="text-gray-600">Flexible engagement — hourly consulting or fixed-scope delivery</p>
</div>

<!-- Quick Navigation -->
<div class="grid md:grid-cols-2 gap-4 mb-8">
  <a href="recent.php" class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-6 text-white hover:shadow-lg transition-smooth">
    <div class="flex items-center gap-4">
      <svg class="w-8 h-8 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <div>
        <h3 class="font-bold text-lg">Recently Visited</h3>
        <p class="text-sm text-blue-100">View services you've checked recently</p>
      </div>
    </div>
  </a>

  <a href="most_visited.php" class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white hover:shadow-lg transition-smooth">
    <div class="flex items-center gap-4">
      <svg class="w-8 h-8 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
      </svg>
      <div>
        <h3 class="font-bold text-lg">Most Popular</h3>
        <p class="text-sm text-green-100">Our most visited and requested services</p>
      </div>
    </div>
  </a>
</div>

<!-- Services Grid -->
<div class="mb-12">
  <h2 class="text-2xl font-bold text-gray-900 mb-6">All Services</h2>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($catalog as $slug => $meta): ?>
      <a href="<?= htmlspecialchars($meta["url"]) ?>" class="group">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md hover:border-blue-300 transition-smooth h-full">
          <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-smooth">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
          </div>
          <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-smooth"><?= htmlspecialchars($meta["name"]) ?></h3>
          <p class="text-gray-600 text-sm mt-2">Explore this service and learn more about what we offer</p>
          <div class="mt-4 inline-block text-blue-600 font-semibold group-hover:gap-2 transition-smooth">
            View details →
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<!-- Recently Visited Sidebar -->
<?php if (!empty($recent)): ?>
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-4">Your Browsing History</h2>
    <div class="space-y-2">
      <?php foreach ($recent as $slug): ?>
        <?php if (isset($catalog[$slug])): ?>
          <a href="<?= htmlspecialchars($catalog[$slug]["url"]) ?>" class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition-smooth group">
            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-700 group-hover:text-blue-600 text-sm"><?= htmlspecialchars($catalog[$slug]["name"]) ?></span>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<?php include "includes/footer.php"; ?>