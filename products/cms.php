<?php
$pageTitle="CMS Setup • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("cms");
?>

<div class="card">
  <h1>CMS Setup</h1>
  <img src="/assets/img/cms.svg" alt="CMS Setup" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    We configure CMS platforms so you can publish content easily with minimal technical effort.
  </p>
  <ul>
    <li>WordPress installation + configuration</li>
    <li>Theme setup and basic customization</li>
    <li>Plugins for SEO, caching, and security basics</li>
    <li>Content structure (pages, categories, menus)</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?>