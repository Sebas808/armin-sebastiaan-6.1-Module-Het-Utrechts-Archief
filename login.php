<?php
$host = "localhost";
$user = "root"; 
$pass = "";
$dbname = "login_db";


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
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
body {
margin: 0;
height: 100vh;
display: flex;
justify-content: center;
align-items: center;
background: url('img/stad.png') no-repeat center center/cover;
backdrop-filter: blur(6px);
}
.overlay {
position: absolute;
width: 100%;
height: 100%;
background: rgba(0,0,0,0.45);
backdrop-filter: blur(4px);
}
.login-box {
position: relative;
z-index: 10;
background: rgba(255,255,255,0.15);
padding: 30px 40px;
border-radius: 12px;
backdrop-filter: blur(10px);
color: white;
box-shadow: 0 0 20px rgba(0,0,0,0.4);
text-align: center;
width: 320px;
}
input {
width: 100%;
padding: 10px;
margin: 10px 0;
border: none;
border-radius: 6px;
}
button {
width: 100%;
padding: 10px;
border: none;
background: #2196F3;
color: white;
font-size: 16px;
border-radius: 6px;
cursor: pointer;
}
button:hover {
background: #0b7dda;
}
h2 { margin-bottom: 10px; }
</style>
</head>
<body>
<div class="overlay"></div>
<div class="login-box">
<h2>Login</h2>
<p><?php echo $message; ?></p>
<form method="post">
<input type="text" name="username" placeholder="Gebruikersnaam" required>
<input type="password" name="password" placeholder="Wachtwoord" required>
<button type="submit">Inloggen</button>
</form>
</div>
</body>
</html>