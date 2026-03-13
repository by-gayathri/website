<?php
$pageTitle="Services • Geeks' Consulting & IT Services";
include "includes/header.php";
require_once __DIR__ . "/includes/recent_products_cookie.php";

$catalog = product_catalog();
$recent = get_recent_products();
?>

<div class="card">
  <h1>Products & Services</h1>
  <p>Flexible engagement — hourly consulting or fixed-scope delivery.</p>

  <p style="margin-top:12px;">
    <a href="recent.php"><strong>Show last five previously visited services →</strong></a>
  </p>
  <p>
    <a href="most_visited.php"><strong>Show five most visited services →</strong></a>
  </p>

  <div class="grid" style="margin-top:12px;">
    <?php foreach ($catalog as $slug => $meta): ?>
      <div class="card">
        <h2><?= htmlspecialchars($meta["name"]) ?></h2>
        <p><a href="<?= htmlspecialchars($meta["url"]) ?>">View details</a></p>
      </div>
    <?php endforeach; ?>
  </div>

  <?php if (!empty($recent)): ?>
    <div class="card" style="margin-top:12px;">
      <h2>Recently visited</h2>
      <ol>
        <?php foreach ($recent as $slug): ?>
          <?php if (isset($catalog[$slug])): ?>
            <li><a href="<?= htmlspecialchars($catalog[$slug]["url"]) ?>"><?= htmlspecialchars($catalog[$slug]["name"]) ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ol>
    </div>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>