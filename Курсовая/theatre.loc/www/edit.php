<Doctype html>
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
<?php
$userid = $_GET["id"];
$error = array();
$edit_user = array();
$errorbul = false;
if(isset($_POST["sub"])){
$edit_user = array(
"id" => $_POST["id"],
"fio" => $_POST["fio"],
"email" => $_POST["email"],
"tel" => $_POST["tel"],
"login" => $_POST["login"],
"pass" => $_POST["pass"]
);
if($edit_user["fio"] == "" || $edit_user["fio"] == " "){
    $error["fio"] = "Поле не заполнено";
    $errorbul = true;
}
if($edit_user["email"] == "" || $edit_user["email"] == " "){
    $error["email"] = "Поле не заполнено";
    $errorbul = true;
}
if($edit_user["tel"] == "" || $edit_user["tel"] == " "){
    $error["tel"] = "Поле не заполнено";
    $errorbul = true;
}
if($edit_user["login"] == "" || $edit_user["login"] == " "){
    $error["login"] = "Поле не заполнено";
    $errorbul = true;
}
if($edit_user["pass"] == "" || $edit_user["pass"] == " "){
    $error["pass"] = "Поле не заполнено";
    $errorbul = true;
}
if($errorbul){
    ?>
    <div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Редактирование пользователя</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
    <form action="/edit.php?id=<?=$userid?>" method="POST">
<input type="hidden" class="form-control" name="id" value="<?=$userid?>">
<div class="form-group">
    <input type="text" class="form-control" id="fio" name="fio" value="<?=$edit_user['fio']?>">
    <?php if(isset($error["fio"]) && $error["fio"] != "") {echo $error["fio"];}  ?>
</div>
<div class="form-group">
    <input type="email" class="form-control" id="email" name="email" value="<?=$edit_user["email"]?>">
    <?php if(isset($error["email"]) && $error["email"] != "") {echo $error["email"];}  ?>
</div>
<div class="form-group">
    <input type="tel" class="form-control" id="tel" name="tel" value="<?=$edit_user["tel"]?>">
    <?php if(isset($error["tel"]) && $error["tel"] != "") {echo $error["tel"];}  ?>
</div>
<div class="form-group">
    <input type="text" class="form-control" id="login" name="login" value="<?=$edit_user["login"]?>">
    <?php if(isset($error["login"]) && $error["login"] != "") {echo $error["login"];}  ?>
</div>
<div class="form-group">
    <input type="password" class="form-control" id="pass" name="pass" value="">
    <?php if(isset($error["pass"]) && $error["pass"] != "") {echo $error["pass"];}  ?>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary form-control"  id="sub" name="sub" value="Сохранить">
</div>
</form>
</div>
	</div>
<?php
} else {
    $pdo =new PDO('mysql:host=localhost;port=3306;dbname=formcheck', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->query("UPDATE users 
SET fio='".$edit_user["fio"]."',
 email='".$edit_user["email"]."',
  tel='".$edit_user["tel"]."',
  login='".$edit_user["login"]."',
  pass='".$edit_user["pass"]."'
   WHERE id =".$userid);
   echo"<script>alert('Изменение сохранено')</script>
   <script>window.location = 'админка.php'</script>";
}

} else {
$pdo =new PDO('mysql:host=localhost;port=3306;dbname=formcheck', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->query("SELECT * FROM users WHERE id =".$userid);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if($user = $stmt->Fetch()){
?>
<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Редактирование пользователя</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
<form action="/edit.php?id=<?=$userid?>" method="POST">
<input type="hidden" name="id" value="<?=$userid?>">
<div class="form-group">
    <input type="text" class="form-control" id="fio" name="fio" value="<?=$user['fio']?>">
</div>
<div class="form-group">
    <input type="email" class="form-control"id="email" name="email" value="<?=$user["email"]?>">
</div>
<div class="form-group">
    <input type="tel" class="form-control"id="tel" name="tel" value="<?=$user["tel"]?>">
</div>
<div class="form-group">
    <input type="text" class="form-control" id="login" name="login" value="<?=$user["login"]?>">
</div>
<div class="form-group">
    <input type="password" class="form-control" id="pass" name="pass" value="">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary form-control" id="sub" name="sub" value="Сохранить">
</div>
</form>
</div>
	</div>
<?php
} else{
    echo "Запись не найдена";
}
?>

<?php } ?>