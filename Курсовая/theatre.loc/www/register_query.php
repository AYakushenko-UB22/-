<?php
	session_start();
	require_once 'conn.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] !== "" && $_POST['firstname'] !== " " && $_POST['email'] !== "" && $_POST['email'] !== " " && $_POST['phone'] !== "" && $_POST['phone'] !== " " && $_POST['username'] !== "" && $_POST['username'] !== " " && $_POST['password'] !== "" && $_POST['password'] !== " "){
			try{
				$firstname = $_POST['firstname'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `users` VALUES ('', '$firstname', '$email', '$phone', '$username', '$password')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Пользователь зарегистрирован.","alert"=>"info");
			$conn = null;
			header('location:index.php');
		}else{
			echo "
				<script>alert('Пожалуйста повторите попытку регистрации')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}
?>