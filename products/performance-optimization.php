<?php
$pageTitle="Performance Optimization • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("performance-optimization");
?>

<div class="card">
  <h1>Performance Optimization</h1>
  <img src="/assets/img/performance.svg" alt="Performance Optimization" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    Improve speed and responsiveness for better user experience and SEO.
  </p>
  <ul>
    <li>Reduce page load time (assets + caching)</li>
    <li>Optimize database queries</li>
    <li>Minimize heavy operations on requests</li>
    <li>Measure improvements with basic metrics</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>