<?php
	session_start();
	
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			// md5 encrypted
			// $password = md5($_POST['password']);
			$password = $_POST['password'];
			$sql = "SELECT * FROM admins WHERE login=? AND password=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['admin'] = $fetch['id'];
				header("location: админка.php");
			} else{
				echo "
				<script>alert('Неправильный логин или пароль')</script>
				<script>window.location = 'admin.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Пожалуйста, заполните обязательные поля!')</script>
				<script>window.location = 'admin.php'</script>
			";
		}
	}
?>