
<Doctype html>
<?php
	require 'conn.php';
	session_start();
	
	if(!ISSET($_SESSION['admin'])){
		header('location:admin.php');
	}
?>
    <html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/plan.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
    <body background="beige">
    <nav style="background-color: transparent; border-color: transparent" class="navbar navbar-default" >
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
$stmt = $conn->query('SELECT * FROM users ORDER BY `id` ASC');
$stmt->setFetchMode(PDO::FETCH_ASSOC); 
$uslug = $conn->query('SELECT * FROM spectacles');
$uslug->setFetchMode(PDO::FETCH_ASSOC); 
?>
        <a style="margin-left: 20px" href = "logout.php">Выйти</a>
            <h3 style="margin-left: 20px">Пользователи</h3>
<table border="1" style="margin-left: 20px">
<?php while($row = $stmt->fetch()):?>
<tr>
    <td><?php echo $row["id"]?></td>
    <td><?php echo $row["fio"]?></td>
    <td><?php echo $row["email"]?></td>
    <td><?php echo $row["tel"]?></td>
    <td><?php echo $row["login"]?></td>
    <td><a href="/edit.php?id=<?=$row['id']?>">Редактировать</a></td>
    <td><a href="/delituser.php?id=<?=$row['id']?>">Удалить</a></td>
</tr>
 <?php endwhile;?>
</table>
<a style="margin-left: 20px" href="/newuser.php">Добавить пользователя</a>
<br>
<br>

        <h3 style="margin-left: 20px">Репертуар</h3>
<table border="1" style="margin-left: 20px">
<?php while($row2 = $uslug->fetch()):?>
<tr>
    <td><?php echo $row2["id"]?></td>
    <td><?php echo $row2["title"]?></td>
    <td><?php echo $row2["date"]?></td>
    <td><?php echo $row2["cena"]?></td>
    <td><a href="/usluges.php?id=<?=$row2['id']?>">Редактировать</a></td>
    <td><a href="/delit.php?id=<?=$row2['id']?>">Удалить</a></td>
</tr>
 <?php endwhile;?>
</table>
<a style="margin-left: 20px" href="/new.php">Добавить репертуар</a>


</body>
    </html>
