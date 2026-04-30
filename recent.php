<?php
$pageTitle="Recently Visited • Geeks' Consulting & IT Services";
include "includes/header.php";
require_once __DIR__ . "/includes/recent_products_cookie.php";

$catalog = product_catalog();
$recent = get_recent_products();
?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">Recently Visited Services</h1>
  <p class="text-gray-600">Your browsing history from your last five service visits</p>
</div>

<?php if (empty($recent)): ?>
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    <h2 class="text-xl font-bold text-gray-900 mb-2">No History Yet</h2>
    <p class="text-gray-600 mb-6">You haven't visited any services yet. Start exploring our offerings!</p>
    <a href="services.php" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-smooth font-semibold">
      Browse All Services
    </a>
  </div>
<?php else: ?>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($recent as $idx => $slug): ?>
      <?php if (isset($catalog[$slug])): ?>
        <a href="<?= htmlspecialchars($catalog[$slug]["url"]) ?>" class="group">
          <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md hover:border-blue-300 transition-smooth h-full">
            <div class="flex items-start justify-between mb-4">
              <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-smooth">
                <span class="text-lg font-bold text-blue-600"><?= $idx + 1 ?></span>
              </div>
              <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-1 rounded">Recently Viewed</span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-smooth"><?= htmlspecialchars($catalog[$slug]["name"]) ?></h3>
            <p class="text-gray-600 text-sm mt-2">Click to revisit this service</p>
            <div class="mt-4 inline-block text-blue-600 font-semibold group-hover:gap-2 transition-smooth">
              View service →
            </div>
          </div>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <div class="mt-8 text-center">
    <a href="services.php" class="inline-block px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-smooth font-semibold">
      ← Back to All Services
    </a>
  </div>
<?php endif; ?>

<?php include "includes/footer.php"; ?>