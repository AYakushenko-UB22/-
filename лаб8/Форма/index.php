<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewort" content="width=device-width, initial-scale=1.0">
    <title>форма</title> 
</head>
<body>
    <form action="check.php" method="post">
<label for="name">ФИО:</label><br>
<input type="text" id="name" name="name" placeholder="ФИО"><br><br>
<label for="date">Дата рождения:</label><br>
<input type="date" name="date" id="date" placeholder="Дата рождения"><br><br>
<label for="form_name">Логин:</label><br>
<input type="text" name="log" id="log" placeholder="Логин"><br><br>
<label for="form_name">Пароль:</label><br>
<input type="password" name="pass" id="pass" placeholder="Пароль"><br><br>
<input type="submit" name="sub" id="sub" value="Войти">
</form>
</body>
</html>