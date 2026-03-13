<?php
$pageTitle="Maintenance & Support • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("maintenance-support");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("maintenance-support");
?>

<div class="card">
  <h1>Maintenance & Support</h1>
  <img src="/assets/img/maintenance.svg" alt="Maintenance & Support" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    Keep your website reliable with updates, backups, monitoring, and small improvements over time.
  </p>
  <ul>
    <li>Regular updates + dependency checks</li>
    <li>Backups and restore testing</li>
    <li>Bug fixes and small feature requests</li>
    <li>Basic uptime and error monitoring</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>