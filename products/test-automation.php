<?php
$pageTitle="Test Automation • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("test-automation");
?>

<div class="card">
  <h1>Test Automation</h1>
  <img src="/assets/img/test-automation.svg" alt="Test Automation" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    Automated tests reduce bugs and make releases safer. We help add the right test coverage.
  </p>
  <ul>
    <li>Unit tests for core logic</li>
    <li>Integration tests for APIs + databases</li>
    <li>Regression checks for critical workflows</li>
    <li>Test reports and CI-friendly execution</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>