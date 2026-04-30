<?php
// users.php

// =========================
// DB CONFIG
// =========================
$host = "localhost";
$dbname = "userslist";
$username = "appuser";
$password = "password123";

// =========================
// CONNECT TO DATABASE
// =========================
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$message = "";
$error = "";

// =========================
// HANDLE CREATE USER
// =========================
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["create_user"])) {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $first_name = trim($_POST["first_name"] ?? "");
    $last_name = trim($_POST["last_name"] ?? "");
    $home_address = trim($_POST["home_address"] ?? "");
    $home_phone = trim($_POST["home_phone"] ?? "");
    $cell_phone = trim($_POST["cell_phone"] ?? "");

    if (
        $name === "" || $email === "" || $first_name === "" || $last_name === "" ||
        $home_address === "" || $home_phone === "" || $cell_phone === ""
    ) {
        $error = "All fields are required.";
    } else {
        $stmt = $conn->prepare("
            INSERT INTO users (name, email, first_name, last_name, home_address, home_phone, cell_phone)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        if ($stmt) {
            $stmt->bind_param(
                "sssssss",
                $name,
                $email,
                $first_name,
                $last_name,
                $home_address,
                $home_phone,
                $cell_phone
            );

            if ($stmt->execute()) {
                $message = "User created successfully.";
            } else {
                $error = "Failed to create user: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $error = "Prepare failed: " . $conn->error;
        }
    }
}

// =========================
// HANDLE SEARCH
// =========================
$search = trim($_GET["search"] ?? "");

if ($search !== "") {
    $sql = "
        SELECT name, email, first_name, last_name, home_address, home_phone, cell_phone
        FROM users
        WHERE name LIKE ?
           OR first_name LIKE ?
           OR last_name LIKE ?
           OR email LIKE ?
           OR home_phone LIKE ?
           OR cell_phone LIKE ?
        ORDER BY first_name ASC, last_name ASC
    ";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $searchTerm = "%" . $search . "%";
        $stmt->bind_param(
            "ssssss",
            $searchTerm,
            $searchTerm,
            $searchTerm,
            $searchTerm,
            $searchTerm,
            $searchTerm
        );
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        die("Search query failed: " . $conn->error);
    }
} else {
    $sql = "
        SELECT name, email, first_name, last_name, home_address, home_phone, cell_phone
        FROM users
        ORDER BY first_name ASC, last_name ASC
    ";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }
}
?>

<?php $pageTitle="My Users • Geeks' Consulting & IT Services"; include "includes/header.php"; ?>

<div class="mb-8">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">User Management Dashboard</h1>
  <p class="text-gray-600">Manage and view all users in the system</p>
</div>

<!-- Status Messages -->
<?php if ($message !== ""): ?>
  <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
    <p class="text-green-800 text-sm font-semibold"><?= htmlspecialchars($message) ?></p>
  </div>
<?php endif; ?>

<?php if ($error !== ""): ?>
  <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
    <p class="text-red-800 text-sm font-semibold"><?= htmlspecialchars($error) ?></p>
  </div>
<?php endif; ?>

<div class="grid grid-cols-1 gap-6 mb-8">
  <!-- Search Card -->
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-4">Search Users</h2>
    <form method="GET" action="" class="flex flex-col sm:flex-row gap-4">
      <input
        type="text"
        name="search"
        placeholder="Search by name, email, phone..."
        value="<?= htmlspecialchars($search) ?>"
        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-smooth whitespace-nowrap">
        Search
      </button>
      <a href="users.php" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-smooth whitespace-nowrap text-center">
        Clear
      </a>
    </form>
  </div>

  <!-- Create User Card -->
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-lg font-bold text-gray-900">Create New User</h2>
      <button onclick="toggleForm()" id="toggleBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-smooth text-sm">
        + Add User
      </button>
    </div>

    <div id="userFormContainer" style="display:none;">
      <form method="POST" action="">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
          <div>
            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Full Name *</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="e.g., John Doe"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div>
            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email *</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="e.g., john@example.com"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div>
            <label for="first_name" class="block text-sm font-semibold text-gray-900 mb-2">First Name *</label>
            <input
              type="text"
              id="first_name"
              name="first_name"
              placeholder="First name"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div>
            <label for="last_name" class="block text-sm font-semibold text-gray-900 mb-2">Last Name *</label>
            <input
              type="text"
              id="last_name"
              name="last_name"
              placeholder="Last name"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div>
            <label for="home_phone" class="block text-sm font-semibold text-gray-900 mb-2">Home Phone *</label>
            <input
              type="text"
              id="home_phone"
              name="home_phone"
              placeholder="e.g., (555) 123-4567"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div>
            <label for="cell_phone" class="block text-sm font-semibold text-gray-900 mb-2">Cell Phone *</label>
            <input
              type="text"
              id="cell_phone"
              name="cell_phone"
              placeholder="e.g., (555) 987-6543"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <div class="md:col-span-2">
            <label for="home_address" class="block text-sm font-semibold text-gray-900 mb-2">Home Address *</label>
            <textarea
              id="home_address"
              name="home_address"
              placeholder="Street address, city, state, zip"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 h-24"
            ></textarea>
          </div>
        </div>

        <div class="flex gap-4">
          <button
            type="submit"
            name="create_user"
            class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-smooth font-semibold"
          >
            Save User
          </button>
          <button
            type="button"
            onclick="toggleForm()"
            class="flex-1 bg-gray-200 text-gray-800 py-2 rounded-lg hover:bg-gray-300 transition-smooth font-semibold"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Users Table -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
  <div class="px-6 py-4 border-b border-gray-200">
    <h2 class="text-lg font-bold text-gray-900">Users List</h2>
  </div>
  
  <div class="overflow-x-auto">
    <table class="w-full">
      <thead class="bg-gray-50 sticky top-0 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Name</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Email</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">First Name</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Last Name</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Home Phone</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Cell Phone</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">Address</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php if ($result && $result->num_rows > 0): ?>
          <?php $count = 0; while ($row = $result->fetch_assoc()): $count++; ?>
            <tr class="<?= ($count % 2 === 0) ? 'bg-white' : 'bg-gray-50' ?> hover:bg-blue-50 transition-smooth">
              <td class="px-6 py-4 text-sm text-gray-900 font-medium"><?= htmlspecialchars($row["name"]) ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row["email"]) ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row["first_name"]) ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row["last_name"]) ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row["home_phone"]) ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row["cell_phone"]) ?></td>
              <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row["home_address"]) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
              <p class="text-sm">No users found. <?php if ($search): ?>Try a different search term.<?php endif; ?></p>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function toggleForm() {
    const form = document.getElementById("userFormContainer");
    const btn = document.getElementById("toggleBtn");

    if (form.style.display === "none") {
      form.style.display = "block";
      btn.innerText = "✕ Close Form";
    } else {
      form.style.display = "none";
      btn.innerText = "+ Add User";
    }
  }
</script>

<?php
if (isset($stmt) && $stmt instanceof mysqli_stmt) {
    $stmt->close();
}
$conn->close();
?>

<?php include "includes/footer.php"; ?>
