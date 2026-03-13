<?php
declare(strict_types=1);

const RECENT_COOKIE_NAME = "recent_products";
const RECENT_COOKIE_MAX = 5;

function get_recent_products(): array {
  if (empty($_COOKIE[RECENT_COOKIE_NAME])) return [];
  $arr = json_decode($_COOKIE[RECENT_COOKIE_NAME], true);
  if (!is_array($arr)) return [];
  $clean = [];
  foreach ($arr as $x) {
    if (is_string($x) && $x !== "") $clean[] = $x;
  }
  return $clean;
}

function add_recent_product(string $slug): void {
  $slug = trim($slug);
  if ($slug === "") return;

  $recent = get_recent_products();
  $recent = array_values(array_filter($recent, fn($s) => $s !== $slug));
  array_unshift($recent, $slug);
  $recent = array_slice($recent, 0, RECENT_COOKIE_MAX);

  $json = json_encode($recent);
  setcookie(RECENT_COOKIE_NAME, $json, [
    "expires" => time() + 60 * 60 * 24 * 30,
    "path" => "/",
    "httponly" => true,
    "samesite" => "Lax",
  ]);

  $_COOKIE[RECENT_COOKIE_NAME] = $json;
}

function product_catalog(): array {
  return [
    "frontend" => ["name" => "Frontend Development", "url" => "/products/frontend.php"],
    "backend" => ["name" => "Backend Development", "url" => "/products/backend.php"],
    "test-automation" => ["name" => "Test Automation", "url" => "/products/test-automation.php"],
    "infrastructure" => ["name" => "Infrastructure Setup", "url" => "/products/infrastructure.php"],
    "cms" => ["name" => "CMS Setup", "url" => "/products/cms.php"],
    "api-integration" => ["name" => "API Integration", "url" => "/products/api-integration.php"],
    "database-design" => ["name" => "Database Design", "url" => "/products/database-design.php"],
    "performance-optimization" => ["name" => "Performance Optimization", "url" => "/products/performance-optimization.php"],
    "security-hardening" => ["name" => "Security Hardening", "url" => "/products/security-hardening.php"],
    "maintenance-support" => ["name" => "Maintenance & Support", "url" => "/products/maintenance-support.php"],
  ];
}