<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "808580";
$database = "login";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if (isset($_POST['register'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Проверка дали потребителското име вече съществува
    $stmt = $connection->prepare("SELECT * FROM people WHERE username = ?");
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "<b style='color:red;'>Това потребителско име вече съществува!</b><br><br>";
    } else {
        // Хеширане на паролата
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Записване в базата
        $stmt = $connection->prepare("INSERT INTO people (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);

        echo "<b style='color:green;'>Успешна регистрация! Можете да влезете.</b><br><br>";
    }
}
?>

<html>
<head><title>Регистрация</title></head>
<body>

<h2>Регистрация</h2>
<form method="post">
    <label>Потребителско име:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Парола:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="register" value="Регистрация">
</form>

<br><a href="login.php">Вече имате акаунт? Вход</a>

</body>
</html>
