<!DOCTYPE html>
<html lang="bg">
<head>
<meta charset="UTF-8">
<title>Форма</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .form-container {
    border: 1px solid #007bff;
    border-radius: 6px;
    padding: 20px;
    width: 350px;
  }
  h2 {
    margin-bottom: 15px;
  }
  .form-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
  }
  .form-row label {
    flex: 1;
  }
  .form-row input[type="checkbox"] {
    margin-left: 10px;
  }
  .submit-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
  }
  .submit-btn:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<h2>Изберете кои полета да попълните</h2>
<div class="form-container">
  <form method="get" action="">
    <div class="form-row">
      <label for="name">Име</label>
      <input type="checkbox" name="fields[]" value="name" id="name">
    </div>
    <div class="form-row">
      <label for="email">Имейл</label>
      <input type="checkbox" name="fields[]" value="email" id="email">
    </div>
    <div class="form-row">
      <label for="age">Възраст</label>
      <input type="checkbox" name="fields[]" value="age" id="age">
    </div>
    <div class="form-row">
      <label for="comment">Коментар</label>
      <input type="checkbox" name="fields[]" value="comment" id="comment">
    </div>
    <button type="submit" class="submit-btn">Създай форма</button>
  </form>
</div>

<?php
if (isset($_GET['fields'])) {
    $fields = $_GET['fields'];
    echo '<h3>Попълнете избраните полета:</h3>';
    echo '<form method="post" action="save.php" style="margin-top:20px;">';
    foreach ($fields as $f) {
        switch ($f) {
            case 'name':
                echo '<div><label>Име:</label><br><input type="text" name="name"></div>';
                break;
            case 'email':
                echo '<div><label>Имейл:</label><br><input type="email" name="email"></div>';
                break;
            case 'age':
                echo '<div><label>Възраст:</label><br><input type="number" name="age"></div>';
                break;
            case 'comment':
                echo '<div><label>Коментар:</label><br><textarea name="comment"></textarea></div>';
                break;
        }
    }
    echo '<button type="submit" class="submit-btn">Запиши</button>';
    echo '</form>';
}
?>
</body>
</html>
