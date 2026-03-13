<?php
declare(strict_types=1);

const MOST_COOKIE_NAME = "most_visited_counts"; // JSON object: {"frontend":3,"backend":1}
const MOST_TOP_N = 5;

function get_visit_counts(): array {
  if (empty($_COOKIE[MOST_COOKIE_NAME])) return [];

  $data = json_decode($_COOKIE[MOST_COOKIE_NAME], true);
  if (!is_array($data)) return [];

  // sanitize: keep string=>int
  $clean = [];
  foreach ($data as $k => $v) {
    if (is_string($k) && $k !== "") {
      $clean[$k] = is_numeric($v) ? (int)$v : 0;
    }
  }
  return $clean;
}

function increment_product_visit(string $slug): void {
  $slug = trim($slug);
  if ($slug === "") return;

  $counts = get_visit_counts();
  $counts[$slug] = ($counts[$slug] ?? 0) + 1;

  $json = json_encode($counts);

  setcookie(MOST_COOKIE_NAME, $json, [
    "expires" => time() + 60 * 60 * 24 * 30,
    "path" => "/",
    "httponly" => true,
    "samesite" => "Lax",
    // "secure" => true, // enable if HTTPS
  ]);

  // Update current request view
  $_COOKIE[MOST_COOKIE_NAME] = $json;
}

/**
 * Returns array of [slug, count] sorted by count desc, top N.
 */
function top_most_visited(array $catalog, int $n = MOST_TOP_N): array {
  $counts = get_visit_counts();

  // Keep only items that exist in catalog
  $filtered = [];
  foreach ($counts as $slug => $count) {
    if (isset($catalog[$slug]) && $count > 0) {
      $filtered[$slug] = $count;
    }
  }

  arsort($filtered); // sort by count desc

  $out = [];
  $i = 0;
  foreach ($filtered as $slug => $count) {
    $out[] = [$slug, $count];
    $i++;
    if ($i >= $n) break;
  }
  return $out;
}