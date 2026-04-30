<?php
// includes/header.php
$pageTitle = $pageTitle ?? "Geeks' Consulting & IT Services";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
  <header class="site-header">
    <div class="container header-row">
      <div class="brand">
        <a href="index.php">Geeks&#039; Consulting &amp; IT Services</a>
        <div class="tagline">Build • Automate • Deploy • Maintain</div>
      </div>
      <nav class="nav">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="news.php">News</a>
        <a href="contact.php">Contacts</a>
        <a href="login.php">Secured Users</a>
        <a href="list_users.php">Combined(DB) Users</a>
        <a href="users.php">My Users</a>
      </nav>
    </div>
  </header>
  <main class="container">