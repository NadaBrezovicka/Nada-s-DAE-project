<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Home</title></head>
<body>
  <h1>Afterschool Home</h1>
  <?php if (!empty($_SESSION['username'])): ?>
    <p>Welcome back, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
    <p><a href="logout.php">Logout</a></p>
  <?php else: ?>
    <p><a href="login.html">Login</a> or <a href="register.html">Register</a></p>
  <?php endif; ?>
</body>
</html>
