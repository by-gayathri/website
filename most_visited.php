<?php
$pageTitle="Most Visited • Geeks' Consulting & IT Services";
include "includes/header.php";
require_once __DIR__ . "/includes/recent_products_cookie.php"; // for catalog
require_once __DIR__ . "/includes/most_visited_cookie.php";

$catalog = product_catalog();
$top = top_most_visited($catalog, 5);
?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">Most Popular Services</h1>
  <p class="text-gray-600">Our top five most visited and requested services from our community</p>
</div>

<?php if (empty($top)): ?>
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
    </svg>
    <h2 class="text-xl font-bold text-gray-900 mb-2">No Data Yet</h2>
    <p class="text-gray-600 mb-6">Visit tracking will start as users explore our services</p>
    <a href="services.php" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-smooth font-semibold">
      Explore Services
    </a>
  </div>
<?php else: ?>
  <div class="space-y-4">
    <?php foreach ($top as $idx => [$slug, $count]): ?>
      <a href="<?= htmlspecialchars($catalog[$slug]["url"]) ?>" class="group">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md hover:border-blue-300 transition-smooth">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-4 flex-1">
              <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-white font-bold text-sm">#<?= $idx + 1 ?></span>
              </div>
              <div>
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-smooth"><?= htmlspecialchars($catalog[$slug]["name"]) ?></h3>
                <p class="text-sm text-gray-600 mt-1"><?= (int)$count ?> <?= $count == 1 ? 'visit' : 'visits' ?></p>
              </div>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-smooth" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="mt-8 text-center">
    <a href="services.php" class="inline-block px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-smooth font-semibold">
      ← Back to All Services
    </a>
  </div>
<?php endif; ?>

<?php include "includes/footer.php"; ?>