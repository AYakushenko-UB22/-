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
$uslugid = $_GET["id"];
$error = array();
$edit_uslug = array();
$errorbul = false;
if(isset($_POST["sub"])){
$edit_uslug = array(
"id" => $_POST["id"],
"title" => $_POST["title"],
"date" => $_POST["date"],
"cena" => $_POST["cena"],
);
if($edit_uslug["title"] == "" || $edit_uslug["title"] == " "){
    $error["title"] = "Поле не заполнено";
    $errorbul = true;
}
if($edit_uslug["date"] == "" || $edit_uslug["date"] == " "){
    $error["date"] = "Поле не заполнено";
    $errorbul = true;
}
if($edit_uslug["cena"] == "" || $edit_uslug["cena"] == " "){
    $error["cena"] = "Поле не заполнено";
    $errorbul = true;
}
if($errorbul){
    ?>
    <div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Редактирование услуги</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
    <form action="/usluges.php?id=<?=$uslugid?>" method="POST">
<input type="hidden" name="id" value="<?=$uslugid?>">
<div class="form-group">
    <input type="text" class="form-control" id="title" name="title" value="<?=$edit_uslug['title']?>">
    <?php if(isset($error["title"]) && $error["title"] != "") {echo $error["title"];}  ?>
</div>
<div class="form-group">
    <input type="date" class="form-control" id="date" name="date" value="<?=$edit_uslug["date"]?>">
    <?php if(isset($error["date"]) && $error["date"] != "") {echo $error["date"];}  ?>
</div>
<div class="form-group">
    <input type="text" class="form-control"id="cena" name="cena" value="<?=$edit_uslug["cena"]?>">
    <?php if(isset($error["cena"]) && $error["cena"] != "") {echo $error["cena"];}  ?>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary form-control" id="sub" name="sub" value="Сохранить">
</div>
</form>
</div>
</div>
<?php
} else {
    $pdo =new PDO('mysql:host=localhost;port=3306;dbname=formcheck', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$uslug = $pdo->query("UPDATE spectacles 
SET title='".$edit_uslug["title"]."',
 date='".$edit_uslug["date"]."',
  cena='".$edit_uslug["cena"]."'
   WHERE id =".$uslugid);
 echo"<script>alert('Изменение сохранено')</script>
 <script>window.location = 'админка.php'</script>";
}

} else {
$pdo =new PDO('mysql:host=localhost;port=3306;dbname=formcheck', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$uslug = $pdo->query("SELECT * FROM spectacles WHERE id =".$uslugid);
$uslug->setFetchMode(PDO::FETCH_ASSOC);
if($us = $uslug->Fetch()){
?>
<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Редактирование услуги</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
<form action="/usluges.php?id=<?=$uslugid?>" method="POST">
<input type="hidden" name="id" value="<?=$uslugid?>">
<div class="form-group">
    <input type="text" class="form-control" id="title" name="title" value="<?=$us['title']?>">
</div>
<div class="form-group">
    <input type="date" class="form-control" id="date" name="date" value="<?=$us["date"]?>">
</div>
<div class="form-group">
    <input type="text" class="form-control" id="cena" name="cena" value="<?=$us["cena"]?>">
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