<?php
$pageTitle="Contacts • Geeks' Consulting & IT Services";
include "includes/header.php";

$contactsFile = __DIR__ . "/data/contacts.txt";
$contacts = [];

if (file_exists($contactsFile)) {
  $lines = file($contactsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    // Format: Label|Value
    $parts = explode("|", $line, 2);
    if (count($parts) === 2) {
      $label = trim($parts[0]);
      $value = trim($parts[1]);
      $contacts[] = ["label" => $label, "value" => $value];
    }
  }
}
?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">Contact Us</h1>
  <p class="text-gray-600">Get in touch with our team for consulting, project quotes, or collaboration opportunities.</p>
</div>

<div class="grid md:grid-cols-2 gap-8">
  <!-- Contact Information -->
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>
    
    <?php if (empty($contacts)): ?>
      <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
        <p class="text-yellow-800 text-sm font-semibold">Contacts file not found or empty. Please check data/contacts.txt.</p>
      </div>
    <?php else: ?>
      <div class="space-y-6">
        <?php foreach ($contacts as $idx => $row): ?>
          <div class="flex gap-4">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-blue-100">
                <?php if (strtolower($row["label"]) === "email"): ?>
                  <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                  </svg>
                <?php elseif (strtolower($row["label"]) === "phone"): ?>
                  <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.048 1.029a2 2 0 002.063-.769l2.68-4.047A2 2 0 0120 6v10a2 2 0 01-2 2h-1.359a2 2 0 00-1.894 1.316l-.342 1.026A2 2 0 0112.929 22h-1.426a2 2 0 01-1.847-1.034l-1.235-2.3-.842-4.05A2 2 0 006.736 12H3a2 2 0 01-2-2V5z"></path>
                  </svg>
                <?php elseif (strtolower($row["label"]) === "address"): ?>
                  <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                <?php else: ?>
                  <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                <?php endif; ?>
              </div>
            </div>
            <div>
              <h3 class="font-semibold text-gray-900"><?= htmlspecialchars($row["label"]) ?></h3>
              <p class="text-gray-600 text-sm"><?= htmlspecialchars($row["value"]) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Quick Links -->
  <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg shadow-sm p-8 text-white">
    <h2 class="text-2xl font-bold mb-6">Quick Links</h2>
    <div class="space-y-4">
      <a href="index.php" class="flex items-center gap-3 p-4 bg-white/10 rounded-lg hover:bg-white/20 transition-smooth">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4"></path>
        </svg>
        <span class="font-semibold">Home</span>
      </a>
      <a href="services.php" class="flex items-center gap-3 p-4 bg-white/10 rounded-lg hover:bg-white/20 transition-smooth">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
        </svg>
        <span class="font-semibold">Our Services</span>
      </a>
      <a href="users.php" class="flex items-center gap-3 p-4 bg-white/10 rounded-lg hover:bg-white/20 transition-smooth">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"></path>
        </svg>
        <span class="font-semibold">Manage Users</span>
      </a>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>