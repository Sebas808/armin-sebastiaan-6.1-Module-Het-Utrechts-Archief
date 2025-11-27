<?php
session_start();

// Database verbinding
$servername = "localhost";
$username = "root";     // verander dit als je een ander XAMPP/WAMP account gebruikt
$password = "";         // meestal leeg bij localhost
$dbname = "login_pagina_test";  // jouw tijdelijke database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}


// Als formulier is verstuurd
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query voorbereiden
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Bestaat de gebruiker?
    if ($stmt->num_rows > 0) {

        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Wachtwoord controleren
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Wachtwoord is onjuist.";
        }

    } else {
        $error = "Gebruikersnaam bestaat niet.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Pagina</title>
</head>
<body>

<h2>Log in</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Gebruikersnaam:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Wachtwoord:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Inloggen</button>
</form>

</body>
</html>