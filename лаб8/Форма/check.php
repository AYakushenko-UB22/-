<?php
if (isset($_POST["sub"]) && $_POST["name"] !== "" && $_POST["date"] !== "" && $_POST["log"] !== "" && $_POST["pass"] !== "") {
$name = $_POST["name"];
$date = $_POST["date"];
$log = $_POST["log"];
$pass = $_POST["pass"];

	echo "ФИО: ".$name."<br/>";
	echo "Дата рождения: ".$date."<br/>";
    echo "Логин: ".$log."<br/>";
    echo "Пароль: ".$pass."<br/>";
	
}

else {
	echo "<a href='index.php'>Пожалуйста, заполните все поля формы.</a>";
}
?>