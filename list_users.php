<?php
$pageTitle = "Users • Geeks' Consulting & IT Services";

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

<div class="card">
  <h1>Local Users(Geeks' Consulting</h1>
  <p>Registered users from the database.</p>

  <?php if ($mainError): ?>
    <p><?php echo htmlspecialchars($mainError); ?></p>
  <?php elseif (!empty($users)): ?>
    <table style="width:100%; border-collapse:collapse; margin-top:16px;">
      <thead>
        <tr>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">ID</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Name</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['id'] ?? ''); ?></td>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['name'] ?? ''); ?></td>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['email'] ?? ''); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>
</div>

<div class="card" style="margin-top:20px;">
  <h1>Users from company A(Megha's)</h1>

  <?php if ($companyAError): ?>
    <p><?php echo htmlspecialchars($companyAError); ?></p>
  <?php elseif (!empty($companyAUsers)): ?>
    <table style="width:100%; border-collapse:collapse; margin-top:16px;">
      <thead>
        <tr>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">ID</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Name</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($companyAUsers as $user): ?>
          <tr>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['id'] ?? ''); ?></td>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['name'] ?? ''); ?></td>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['email'] ?? ''); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No users found for company A.</p>
  <?php endif; ?>
</div>

<div class="card" style="margin-top:20px;">
  <h1>Users from companyB(Mansi's)</h1>

  <?php if ($companyBError): ?>
    <p><?php echo htmlspecialchars($companyBError); ?></p>
  <?php elseif (!empty($companyBUsers)): ?>
    <table style="width:100%; border-collapse:collapse; margin-top:16px;">
      <thead>
        <tr>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">ID</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Name</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($companyBUsers as $user): ?>
          <tr>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['id'] ?? ''); ?></td>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['name'] ?? ''); ?></td>
            <td style="padding:10px; border-bottom:1px solid #eee;"><?php echo htmlspecialchars($user['email'] ?? ''); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No users found for company B.</p>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>