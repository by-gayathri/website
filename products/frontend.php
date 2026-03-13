<?php
$pageTitle="Frontend Development • Geeks' Consulting & IT Services";
include __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/recent_products_cookie.php";
add_recent_product("frontend");
require_once __DIR__ . "/../includes/most_visited_cookie.php";
increment_product_visit("frontend");

?>

<div class="card">
  <h1>Frontend Development</h1>
  <img src="/assets/img/frontend.svg" alt="Frontend Development" style="max-width:520px;width:100%;height:auto;border:1px solid #e6e6e6;border-radius:14px;">

  <p style="margin-top:12px;">
    We build responsive, clean UI with component-based structure and strong usability.
  </p>
  <ul>
    <li>Responsive layouts (mobile-first)</li>
    <li>Reusable components and consistent UI</li>
    <li>Accessibility basics (labels, keyboard, contrast)</li>
    <li>Performance tuning (reduce load + render time)</li>
  </ul>

  <p><a href="/services.php">Back to Products/Services</a> · <a href="/recent.php">Recently visited</a></p>
</div>

<?php include __DIR__ . "/../includes/footer.php"; ?> 