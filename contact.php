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

<div class="card">
  <h1>Contacts</h1>
  <p>Reach out for consulting, project quotes, or collaboration.</p>

  <?php if (empty($contacts)): ?>
    <p><strong>Error:</strong> Contacts file not found or empty. Please check <code>data/contacts.txt</code>.</p>
  <?php else: ?>
    <table class="table">
      <?php foreach ($contacts as $row): ?>
        <tr>
          <td style="width:220px;"><strong><?= htmlspecialchars($row["label"]) ?></strong></td>
          <td><?= htmlspecialchars($row["value"]) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>
</div>

<?php include "includes/footer.php"; ?>