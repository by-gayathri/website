<?php
$pageTitle="Recently Visited • Geeks' Consulting & IT Services";
include "includes/header.php";
require_once __DIR__ . "/includes/recent_products_cookie.php";

$catalog = product_catalog();
$recent = get_recent_products();
?>

<div class="card">
  <h1>Last Five Previously Visited Products/Services</h1>

  <?php if (empty($recent)): ?>
    <p>No recently visited products yet. Visit a product page first.</p>
    <p><a href="services.php">Back to Products/Services</a></p>
  <?php else: ?>
    <ol>
      <?php foreach ($recent as $slug): ?>
        <?php if (isset($catalog[$slug])): ?>
          <li><a href="<?= htmlspecialchars($catalog[$slug]["url"]) ?>"><?= htmlspecialchars($catalog[$slug]["name"]) ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ol>
    <p><a href="services.php">Back to Products/Services</a></p>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>