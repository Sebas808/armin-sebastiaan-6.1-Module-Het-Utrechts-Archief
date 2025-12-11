<?php
$host = "localhost";
$user = "root"; // standaard voor XAMPP
$pass = ""; // standaard leeg
$dbname = "login_db"; // naam van je database


try {
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Database verbinding mislukt: " . $e->getMessage());
}
?>
<?php
session_start();

$correct_username = "admin";
$correct_password = "1234";
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'];
$password = $_POST['password'];
if ($username === $correct_username && $password === $correct_password) {
$_SESSION['user'] = $username;
header("Location: dashboard.php");
exit;
} else {
$message = "Onjuiste gebruikersnaam of wachtwoord.";
}
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<p><?php echo $message; ?></p>
<form method="post">
Gebruikersnaam: <input type="text" name="username" required><br><br>
Wachtwoord: <input type="password" name="password" required><br><br>
<button type="submit">Inloggen</button>
</form>
</body>
</html>