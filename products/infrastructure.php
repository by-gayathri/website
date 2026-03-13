<?php
$pageTitle="Infrastructure Setup • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("infrastructure");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("infrastructure");

?>

<div class="card">
  <h1>Infrastructure Setup</h1>
  <img src="/assets/img/infrastructure.svg" alt="Infrastructure Setup" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    We set up hosting and deployment basics so your app runs consistently across environments.
  </p>
  <ul>
    <li>Server setup (LAMP stack, configs)</li>
    <li>Environment variables and secrets handling</li>
    <li>Backups + basic monitoring</li>
    <li>Deployment workflow and documentation</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>