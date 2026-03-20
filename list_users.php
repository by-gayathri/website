<?php
$pageTitle = "Users • Geeks' Consulting & IT Services";

$url = "http://www.geekyhub.me/api/users.php";

if (!function_exists('curl_init')) {
    die("cURL is not enabled in PHP.");
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    die("cURL Error: " . curl_error($ch));
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    die("API returned HTTP status: " . $httpCode);
}

$users = json_decode($response, true);

if (!is_array($users)) {
    die("Invalid JSON returned from API.");
}

include "includes/header.php";
?>

<div class="card">
  <h1>Users</h1>
  <p>Registered users from the database.</p>

  <?php if (!empty($users)): ?>
    <table style="width:100%; border-collapse:collapse; margin-top:16px;">
      <thead>
        <tr>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">ID</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Name</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Email</th>
          <th style="text-align:left; padding:10px; border-bottom:1px solid #ccc;">Created</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td style="padding:10px; border-bottom:1px solid #eee;">
              <?php echo htmlspecialchars($user['id']); ?>
            </td>
            <td style="padding:10px; border-bottom:1px solid #eee;">
              <?php echo htmlspecialchars($user['name']); ?>
            </td>
            <td style="padding:10px; border-bottom:1px solid #eee;">
              <?php echo htmlspecialchars($user['email']); ?>
            </td>
            <td style="padding:10px; border-bottom:1px solid #eee;">
              <?php echo htmlspecialchars($user['created_at']); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>