<?php
$pageTitle="API Integration • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("api-integration");
add_recent_product("api-integration");
?>

<div class="card">
  <h1>API Integration</h1>
  <img src="/assets/img/api-integration.svg" alt="API Integration" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    Connect your website to third-party services like payments, email, maps, or analytics.
  </p>
  <ul>
    <li>REST API connections and error handling</li>
    <li>Authentication with API keys / tokens</li>
    <li>Webhooks for real-time updates</li>
    <li>Logging + retries for reliability</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>