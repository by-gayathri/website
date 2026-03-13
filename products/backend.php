<?php
$pageTitle="Backend Development • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("backend");
?>

<div class="card">
  <h1>Backend Development</h1>
  <img src="/assets/img/backend.svg" alt="Backend Development" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    We build reliable server-side systems for APIs, authentication, data processing, and integrations.
  </p>
  <ul>
    <li>REST APIs and server-side architecture</li>
    <li>Authentication and session handling</li>
    <li>Database integration and data validation</li>
    <li>Error handling + logs for maintainability</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>