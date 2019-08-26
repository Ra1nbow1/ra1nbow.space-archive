<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"> 
    <title>Rainbow's Server | LOGIN</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

<?php
// Соединение, выбор базы данных
$dbconn = pg_connect("host=ec2-54-75-231-3.eu-west-1.compute.amazonaws.com dbname=de8k4e56dbp56v user=soascxvridszvk password=3cf9c5007a237b1142d7b9f79e0c9a8275659d1d090c15c654e7cf744b369d5c")
    or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
$query = 'SELECT * FROM users';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

// Вывод результатов в HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconn);
?>

<div class="login-box">
  <h1>Вход</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="ID">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Ключ">
  </div>

  <button type="button" class="btn" value="Войти"><a href="/account/profile.html">Войти</a></button>
</div>
  </body>
</html>
