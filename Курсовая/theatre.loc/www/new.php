<?php	session_start(); ?>
<!DOCTYPE html>
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

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

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
		<h3 class="text-primary">Добавление услуги</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action="new_query.php" method="POST">	
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Название</label>
					<input type="text" class="form-control" name="title" require>
				</div>
				<div class="form-group">
					<label>Дата</label>
					<input type="date" class="form-control" name="date" require>
				</div>
				<div class="form-group">
					<label>Цена</label>
					<input type="text" class="form-control" name="cena"  require>
				</div>
				<div class="form-group">
					<button class="btn btn-primary form-control" name="sub">Добавить</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
