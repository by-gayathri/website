<?php
$pageTitle = "All Users • Geeks' Consulting & IT Services";

if (!function_exists('curl_init')) {
    die("cURL is not enabled in PHP.");
}

function fetchUsersFromApi($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        return ["error" => "cURL Error: " . $error];
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        return ["error" => "API returned HTTP status: " . $httpCode];
    }

    $data = json_decode($response, true);

    if (!is_array($data)) {
        return ["error" => "Invalid JSON returned from API."];
    }

    return ["data" => $data];
}

$mainApiUrl = "http://www.geekyhub.me/api/users.php";
$companyAApiUrl = "https://mgcodes.com/get_users.php";
$companyBApiUrl = "https://90628a3ad15045a9903f937b84bf44ff.api.mockbin.io";

$mainResult = fetchUsersFromApi($mainApiUrl);
$companyAResult = fetchUsersFromApi($companyAApiUrl);
$companyBResult = fetchUsersFromApi($companyBApiUrl);

$users = $mainResult["data"] ?? [];
$companyAUsers = $companyAResult["data"] ?? [];
$companyBUsers = $companyBResult["data"] ?? [];

$mainError = $mainResult["error"] ?? null;
$companyAError = $companyAResult["error"] ?? null;
$companyBError = $companyBResult["error"] ?? null;

include "includes/header.php";
?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">All Users Directory</h1>
  <p class="text-gray-600">View users from our local database and partner companies</p>
</div>

<!-- Local Users Section -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
  <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-700">
    <h2 class="text-lg font-bold text-white">Local Users (Geeks' Consulting)</h2>
  </div>

  <?php if ($mainError): ?>
    <div class="px-6 py-8">
      <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
        <p class="text-red-800 text-sm font-semibold"><?= htmlspecialchars($mainError) ?></p>
      </div>
    </div>
  <?php elseif (!empty($users)): ?>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Email</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php $count = 0; foreach ($users as $user): $count++; ?>
            <tr class="<?= ($count % 2 === 0) ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition-smooth">
              <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= htmlspecialchars($user['id'] ?? '') ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($user['name'] ?? '') ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($user['email'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="px-6 py-8 text-center text-gray-500">
      <p class="text-sm">No users found.</p>
    </div>
  <?php endif; ?>
</div>

<!-- Company A Users Section -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
  <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-green-600 to-green-700">
    <h2 class="text-lg font-bold text-white">Company A Users (Megha's)</h2>
  </div>

  <?php if ($companyAError): ?>
    <div class="px-6 py-8">
      <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
        <p class="text-red-800 text-sm font-semibold"><?= htmlspecialchars($companyAError) ?></p>
      </div>
    </div>
  <?php elseif (!empty($companyAUsers)): ?>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Email</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php $count = 0; foreach ($companyAUsers as $user): $count++; ?>
            <tr class="<?= ($count % 2 === 0) ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition-smooth">
              <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= htmlspecialchars($user['id'] ?? '') ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($user['name'] ?? '') ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($user['email'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="px-6 py-8 text-center text-gray-500">
      <p class="text-sm">No users found for Company A.</p>
    </div>
  <?php endif; ?>
</div>

<!-- Company B Users Section -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
  <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-600 to-purple-700">
    <h2 class="text-lg font-bold text-white">Company B Users (Mansi's)</h2>
  </div>

  <?php if ($companyBError): ?>
    <div class="px-6 py-8">
      <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
        <p class="text-red-800 text-sm font-semibold"><?= htmlspecialchars($companyBError) ?></p>
      </div>
    </div>
  <?php elseif (!empty($companyBUsers)): ?>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Email</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php $count = 0; foreach ($companyBUsers as $user): $count++; ?>
            <tr class="<?= ($count % 2 === 0) ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition-smooth">
              <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= htmlspecialchars($user['id'] ?? '') ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($user['name'] ?? '') ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($user['email'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="px-6 py-8 text-center text-gray-500">
      <p class="text-sm">No users found for Company B.</p>
    </div>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>