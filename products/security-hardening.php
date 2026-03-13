<?php
$pageTitle="Security Hardening • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("security-hardening");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("security-hardening");
?>

<div class="card">
  <h1>Security Hardening</h1>
  <img src="/assets/img/security.svg" alt="Security Hardening" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    Practical security improvements to reduce common risks in web applications.
  </p>
  <ul>
    <li>Input validation + output escaping</li>
    <li>Secure session settings and cookies</li>
    <li>Basic access control patterns</li>
    <li>Server configuration hardening checklist</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>