<?php
// users.php

// =========================
// DB CONFIG
// =========================
$host = "localhost";
$dbname = "userslist";
$username = "appuser";
$password = "x";

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
                echo "<script>
                window.onload = function() {
                    document.getElementById('userFormContainer').style.display = 'none';
                };
                </script>";
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

<?php $pageTitle="My Users"; include "includes/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <script>
    function toggleForm() {
        const form = document.getElementById("userFormContainer");
        const btn = document.getElementById("toggleBtn");

        if (form.style.display === "none") {
            form.style.display = "block";
            btn.innerText = "Close Form";
        } else {
            form.style.display = "none";
            btn.innerText = "+ Create User";
        }
    }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 20px;
            color: #222;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h1, h2 {
            margin-top: 0;
        }

        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            background: #e7f7e7;
            color: #1f6b1f;
        }

        .error {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            background: #fdeaea;
            color: #a12626;
        }

        form {
            display: grid;
            gap: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 12px;
        }

        input, textarea, button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        button {
            background: #1d72f3;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #1559c1;
        }

        .search-bar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-bar input {
            flex: 1;
            min-width: 250px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
        }

        th, td {
            padding: 12px 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f0f4f8;
        }

        .small-link {
            display: inline-block;
            margin-top: 10px;
            color: #1d72f3;
            text-decoration: none;
        }

        .small-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Users Management</h1>

        <?php if ($message !== ""): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <?php if ($error !== ""): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="GET" action="">
            <div class="search-bar">
                <input
                    type="text"
                    name="search"
                    placeholder="Search by name, email, home phone, or cell phone"
                    value="<?php echo htmlspecialchars($search); ?>"
                >
                <button type="submit">Search</button>
            </div>
        </form>

        <a class="small-link" href="users.php">Clear Search</a>
    </div>

    <div class="card">
        <h2>User Actions</h2>

        <button onclick="toggleForm()" id="toggleBtn">+ Create User</button>

        <div id="userFormContainer" style="display:none; margin-top:15px;">
            <h3>Create User</h3>

            <form method="POST" action="">
                <div class="form-grid">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" required>
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div>
                        <label>First Name</label>
                        <input type="text" name="first_name" required>
                    </div>

                    <div>
                        <label>Last Name</label>
                        <input type="text" name="last_name" required>
                    </div>

                    <div>
                        <label>Home Phone</label>
                        <input type="text" name="home_phone" required>
                    </div>

                    <div>
                        <label>Cell Phone</label>
                        <input type="text" name="cell_phone" required>
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label>Home Address</label>
                        <textarea name="home_address" required></textarea>
                    </div>
                </div>

                <br>
                <button type="submit" name="create_user">Save User</button>
                <button type="button" onclick="toggleForm()" style="background:#aaa;">Cancel</button>
            </form>
        </div>
    </div>

    <div class="card">
        <h2>User List</h2>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Home Address</th>
                    <th>Home Phone</th>
                    <th>Cell Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td><?php echo htmlspecialchars($row["first_name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["last_name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["home_address"]); ?></td>
                            <td><?php echo htmlspecialchars($row["home_phone"]); ?></td>
                            <td><?php echo htmlspecialchars($row["cell_phone"]); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

<?php
if (isset($stmt) && $stmt instanceof mysqli_stmt) {
    $stmt->close();
}
$conn->close();
?>
<?php include "includes/footer.php"; ?>