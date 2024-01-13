<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}
?>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/plan.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
	<body background="i.jpg">
    <nav class="navbar navbar-default">
		<div class="container-fluid">
		<i><a href="главная.php"><img class="logo" src="лого.gif" width="130px" alt="Лого" align="top"></a></i>
		 <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Меню</button>
  <div id="myDropdown" class="dropdown-content">
  <a class="link" href="репертуар.php">Репертуар</a>
    <a class="link" href="home.php">Профиль</a>
    <a class="link" href="админка.php">Страница администатора</a>
  </div>
</div>
</div>
<script>
	/* Когда пользователь нажимает на кнопку,
переключение между скрытием и отображением раскрывающегося содержимого */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Закройте выпадающее меню, если пользователь щелкает за его пределами
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Профиль</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3>Добро пожаловать!</h3>
			<br />
			<?php
				$id = $_SESSION['user'];
				$sql = $conn->prepare("SELECT * FROM `users` WHERE `id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
			?>
			<a href = "logout.php">Выйти</a>
			<form action="" method="POST">
			<hr style="border-top:1px groovy #000;">
<div class="form-group">
    <input type="text" class="form-control" id="fio" name="fio" value="<?=$fetch['fio']?>" require>
</div>
<div class="form-group">
    <input type="email" class="form-control" id="email" name="email" value="<?=$fetch['email']?>" require>
</div>
<div class="form-group">
    <input type="tel" class="form-control" id="tel" name="tel" value="<?=$fetch['tel']?>" require>
</div>
<div class="form-group">
    <input type="text" class="form-control" id="login" name="login" value="<?=$fetch['login']?>" require>
</div>
<div class="form-group">
    <input type="password" class="form-control" id="pass" name="pass" value="" require>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary form-control" id="sub" name="sub" value="Сохранить">
</div>
</form>
<?php
if(isset($_POST["sub"])){
$edit_user = array(
"fio" => $_POST["fio"],
"email" => $_POST["email"],
"tel" => $_POST["tel"],
"login" => $_POST["login"],
"pass" => $_POST["pass"]
);
$stmt = $conn->query("UPDATE users 
SET fio='".$edit_user["fio"]."',
 email='".$edit_user["email"]."',
  tel='".$edit_user["tel"]."',
  login='".$edit_user["login"]."',
  pass='".$edit_user["pass"]."'
   WHERE id =".$fetch['id']);

   echo "
				<script>alert('Данные успешно сохранены!')</script>";
}
?>
			

		</div>
	</div>
</body>
</html>