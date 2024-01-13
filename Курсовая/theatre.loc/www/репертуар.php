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
$pdo =new PDO('mysql:host=localhost;port=3306;dbname=formcheck', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$uslug = $pdo->query('SELECT * FROM spectacles');
$uslug->setFetchMode(PDO::FETCH_ASSOC); 
?>
	<div class="col-md-3"></div>
	<div class="col-md-12 well">
		<h3 class="text-primary">Наш репертуар</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-0"></div>
		<div class="col-md-12">
<table border="1">
<?php while($row2 = $uslug->fetch()):?>
                    <h4><?php echo $row2['title'].":"."&emsp;"?>
                    <?php echo $row2["date"]."&emsp;"?>
                    <?php echo $row2["cena"]."&emsp;"?>
                    <button class="dropbtn">Купить билет</button></h4><hr>
 <?php endwhile;?>
</table>
</body>
    </html>
