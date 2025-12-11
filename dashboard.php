<?php
session_start();
if (!isset($_SESSION['user'])) {
header("Location: login.php");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<h1>Dashboard</h1>
<p>Welkom op het dashboard, <?php echo $_SESSION['user']; ?>!</p>


<ul>
<li><a href="home.php">Home</a></li>
<li><a href="logout.php">Uitloggen</a></li>
</ul>
</body>
</html>