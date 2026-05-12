<?php
declare(strict_types=1);

require_once __DIR__ . "/includes/auth.php";
require_user_login();

$user = get_logged_in_user();
if (!$user) {
  header("Location: /login.php");
  exit;
}

// Get user's reviews
$stmt = $pdo->prepare("
  SELECT 
    r.id,
    r.rating,
    r.comment,
    r.created_at,
    r.product_slug,
    p.name as product_name
  FROM reviews r
  LEFT JOIN products p ON r.product_slug = p.slug
  WHERE r.user_id = ?
  ORDER BY r.created_at DESC
  LIMIT 10
");
$stmt->execute([$user['id']]);
$user_reviews = $stmt->fetchAll();

$pageTitle = "Dashboard • Geeks' Consulting & IT Services";
include __DIR__ . "/includes/header.php";
?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
  <p class="text-gray-600">Manage your account and view your activity</p>
</div>

<!-- User Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Member Since</p>
        <p class="text-2xl font-bold text-gray-900 mt-2"><?= date('M Y', strtotime($user['created_at'])) ?></p>
      </div>
      <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Email</p>
        <p class="text-lg font-bold text-gray-900 mt-2 truncate"><?= htmlspecialchars($user['email']) ?></p>
      </div>
      <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Reviews Left</p>
        <p class="text-2xl font-bold text-gray-900 mt-2"><?= count($user_reviews) ?></p>
      </div>
      <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
      </div>
    </div>
  </div>
</div>

<!-- My Reviews Section -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
  <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
    <h2 class="text-lg font-bold text-gray-900">Your Reviews</h2>
  </div>

  <?php if (empty($user_reviews)): ?>
    <div class="px-6 py-12 text-center">
      <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
      </svg>
      <p class="text-gray-600 font-semibold mb-2">No reviews yet</p>
      <p class="text-gray-500 text-sm mb-4">Start leaving reviews to share your experiences with our services</p>
      <a href="/services.php" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-smooth font-semibold">
        Browse Services
      </a>
    </div>
  <?php else: ?>
    <div class="divide-y divide-gray-200">
      <?php foreach ($user_reviews as $review): ?>
        <div class="px-6 py-6 hover:bg-gray-50 transition-smooth">
          <div class="flex items-start justify-between mb-3">
            <div>
              <a href="/products/<?= htmlspecialchars($review['product_slug']) ?>.php" class="text-lg font-semibold text-blue-600 hover:text-blue-700">
                <?= htmlspecialchars($review['product_name'] ?? 'Unknown Product') ?>
              </a>
              <p class="text-sm text-yellow-500 mt-1">
                <?= str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']) ?>
              </p>
            </div>
            <span class="text-xs text-gray-500"><?= date('M d, Y', strtotime($review['created_at'])) ?></span>
          </div>
          <?php if (!empty($review['comment'])): ?>
            <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
          <?php else: ?>
            <p class="text-gray-500 text-sm italic">No comment added</p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<!-- Quick Actions -->
<div class="mt-8 grid md:grid-cols-2 gap-6">
  <a href="/services.php" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-smooth">
    <div class="flex items-center gap-4">
      <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
      </div>
      <div>
        <h3 class="font-semibold text-gray-900">Browse Services</h3>
        <p class="text-sm text-gray-600">Explore all our services and leave reviews</p>
      </div>
    </div>
  </a>

  <a href="/logout.php" class="bg-white rounded-lg shadow-sm border border-red-200 p-6 hover:shadow-md transition-smooth">
    <div class="flex items-center gap-4">
      <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
        </svg>
      </div>
      <div>
        <h3 class="font-semibold text-gray-900">Logout</h3>
        <p class="text-sm text-gray-600">Sign out from your account</p>
      </div>
    </div>
  </a>
</div>

<?php include __DIR__ . "/includes/footer.php"; ?>
