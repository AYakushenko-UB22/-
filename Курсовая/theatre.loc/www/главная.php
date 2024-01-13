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
        <h1>Великолепные спектакли ожидаются в театре!</h1>
        <div class="slideshow-container">
      <div class="mySlides">
        <div class="numbertext">1 / 3</div>
        <img src="з.jpeg" style="width:100%">
        <div class="text">"Золушка"<br> возвращается на сцену с новым очарованием! Грандиозная постановка этой классической сказки обещает превзойти все ожидания зрителей. Шикарные костюмы, захватывающие танцевальные номера и потрясающая актерская игра подарят незабываемые эмоции всем, кто полюбил эту историю в детстве. Приготовьтесь погрузиться в мир волшебства и верить в сказку!</div>
      </div>
      <div class="mySlides">
        <div class="numbertext">2 / 3</div>
        <img src="щ.jpeg" style="width:100%">
        <div class="text">"Щелкунчик"<br> Этот известный балет, который стал настоящей рождественской традицией, вновь оживет на нашей сцене. Уникальные хореографические решения, прекрасная музыка и неподражаемая атмосфера праздника помогут каждому зрителю окунуться в мир фантазий и мечтаний. Приходите и откройте для себя новую главу в истории "Щелкунчика"!</div>
      </div>
      <div class="mySlides">
        <div class="numbertext">3 / 3</div>
        <img src="рид.jpg" style="width:100%">
        <div class="text">"Ромео и Джульетта" <br>Вечная история о любви, страсти и судьбе. Этот знаменитый спектакль, поставленный по произведению Шекспира, не перестает восхищать зрителей своей глубиной и эмоциональностью. Великолепные декорации, живые музыкальные композиции и выдающаяся актерская игра создадут неповторимую атмосферу на сцене. Приходите и погрузитесь в мир страстей и романтики, который ожидает вас в "Ромео и Джульетте"!
</div>
      </div>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    <script>
      var slideIndex = 1;
      showSlides(slideIndex);
      
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
    </script>
           <h4 style="color: beige; margin-left:20px"> Не упустите возможность насладиться этими прекрасными спектаклями! Билеты уже в продаже, так что бронируйте свои места заранее, чтобы быть уверенными в своем месте в зале. Приходите и погрузитесь в мир искусства вместе с нами!</h4>
            
    </body>
</html>