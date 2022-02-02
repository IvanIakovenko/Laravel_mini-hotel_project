<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Гранд мини-отель</title>
	<link rel="stylesheet" href="/css/about.css">
	<link rel="stylesheet" href="/css/logout_bar.css">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
	@if (!Auth::guest())
	<div class="logout_nav">
		Здравствуйте, {{ Auth::user()->name }}
		<div class="dropdown">
		  <div class="dropbtn">Меню</div>
		  <div class="dropdown-content">
		   <a href="{{ url('/logout') }}"
             onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            Выйти
           </a>
           <a href="{{ url('/lk') }}">Личный кабинет</a>
    	  </div>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    	</div>
	</div>
	@endif

	<header>
	  
		<div class="nav_logo">Grand</div>
		<nav>
			<div class="navbar">
				<a href="{{ url('/main') }}">Главная</a>
				<a href="{{ url('/rooms') }}">Номера</a>
				<a href="{{ url('/contact') }}">Контакты</a>
				<a href="{{ url('/about') }}">Grand</a>
				
			</div>
		</nav>

		<div class="navbar">
			<a href="{{ url('/register') }}">Регистрация</a>
			<a href="{{ url('/login') }}">Вход</a>
		</div>
		
		<a href="#">English</a>
	 
	</header>

	<div class="gold_line"></div>

	<div class="header_image">
	  <div class="image_container">
		<img src="{{$all->main_img}}" alt="">
	  </div>
	</div>

	<div class="container">
		<div class="text_big">
		  
		  <h1 class="text_big_h1">{{$all->big_name}}</h1>
		
		  <div>
			<h2>{{$all->type_name}}</h2>
		  </div>
		  <div class="text_short">
		  	"{{$all->short_text}}."
		  </div>
		</div>
		<div class="block">
			<div class="text_img"><img src="{{$all->sml_img1}}" alt=""></div>
			<div class="block_text">{{$all->description_one}}.</div>
		</div>
		<div class="block">
			<div class="block_text">{{$all->description_two}}.</div>
			<div class="text_img2"><img src="{{$all->sml_img2}}" alt=""></div>
		</div>
		<div class="block">
			<div class="text_img3"><img src="{{$all->sml_img3}}" alt=""></div>
			<div class="block_text">{{$all->description_three}}.</div>
		</div>

		
	</div>

	<hr class="line">

	<footer class="footer">
		<div>
			<div class="footer_inf">
			<h2 class="footer_h2">Grand мини-отель</h2>
			<h3>Контактная информация</h3>
		  	<address>
		  		<p class="addr_txt_style"><a href="">Карта</a></p>
		  		<p class="addr_txt_style">Ростов-на-Дону,</p>
		  		<p class="addr_txt_style">улица Филимоновская 33,</p>
		  		<p class="addr_txt_style">телефон: <a href="">8(8632) 22-22-22</a>,</p>
		  		<p class="addr_txt_style">e-mail: <a href="">request@grand.ru</a></p>



		  	</address>
		  </div>
		</div>
		<div class="footer_hotel">
			<div>&copy; Grand mini-hotel &bull; 2020 &bull;</div>
		</div>
		<div class="footer_owner">
			<p>Сайт разработан и поддерживается Яковенко Иваном, все права защищены. &copy; 2020</p>
		</div>
	</footer>


	<script src="/js/app.js"></script>
</body>
</html>