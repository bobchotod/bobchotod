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

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Търсим потребителя само по username
    $stmt = $connection->prepare("SELECT * FROM people WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];

        header("Location: admin.php");
        exit;
    } else {
        echo "<b style='color:red;'>Невалидни потребителски данни</b><br><br>";
    }
}
?>

<html>
<head><title>Вход</title></head>
<body>

<h2>Вход</h2>
<form method="post">
    <label>Потребителско име:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Парола:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="submit" value="Вход">
</form>

<br><a href="register.php">Нямате акаунт? Регистрирайте се</a>

</body>
</html>
