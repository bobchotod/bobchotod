<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<html>
<head><title>Админ панел</title></head>
<body>

<h2>Добре дошъл, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h2>
<p>Тази страница е защитена. Само влезли потребители имат достъп до нея.</p>

<a href="logout.php">Изход</a>

</body>
</html>
