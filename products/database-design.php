<?php
$pageTitle="Database Design • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("database-design");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("database-design");
?>

<div class="card">
  <h1>Database Design</h1>
  <img src="/assets/img/database-design.svg" alt="Database Design" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    A good schema makes your app faster and easier to maintain. We design clean, normalized tables.
  </p>
  <ul>
    <li>Schema planning (tables, relationships)</li>
    <li>Indexes for performance</li>
    <li>Constraints for data integrity</li>
    <li>Migration plan for updates</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>