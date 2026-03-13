<?php
$pageTitle="Most Visited • Geeks' Consulting & IT Services";
include "includes/header.php";
require_once __DIR__ . "/includes/recent_products_cookie.php"; // for catalog
require_once __DIR__ . "/includes/most_visited_cookie.php";

$catalog = product_catalog();
$top = top_most_visited($catalog, 5);
?>

<div class="card">
  <h1>Top 5 Most Visited Products/Services</h1>

  <?php if (empty($top)): ?>
    <p>No visit data yet. Visit some service pages first.</p>
    <p><a href="services.php">Back to Services</a></p>
  <?php else: ?>
    <ol>
      <?php foreach ($top as [$slug, $count]): ?>
        <li>
          <a href="<?= htmlspecialchars($catalog[$slug]["url"]) ?>">
            <?= htmlspecialchars($catalog[$slug]["name"]) ?>
          </a>
          — <?= (int)$count ?> visits
        </li>
      <?php endforeach; ?>
    </ol>
    <p><a href="services.php">Back to Services</a></p>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>