<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная</title>
	<link rel="stylesheet" href="/css/main2.css">
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

	<header id="header">
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
			<a href="{{ url('/login') }}">Войти</a>
			@if(isset($admin))
			<a href="{{ url('/adpart') }}">Admin</a>
			@endif
		</div>
		
		<a href="#">English</a>

		<!--<select name="" id="">
			<option>RU</option>
			<option value="">ENG</option>
		</select>-->
		<!--@if(isset($admin))
		<div>"Hello: {{ $admin->name }}"</div>
		@endif-->
	</header>

	<div class="gold_line"></div>

	<div class="container">
		<div class="blue_part">
			<div class="title_big">
				<div>G</div>
				<div>R</div>
				<div>A</div>
				<div>N</div>
				<div>D</div>
			  <!--<span class="welcome_title">Добро</span>
			  <span class="welcome_title">пожаловать</span>-->
			</div>
			<!--<span class="brand_title">Мини-отель</span>-->
			<div class="welcome_letters">
			<div>Д</div>
			<div>О</div>
			<div>Б</div>
			<div>Р</div>
			<div>О</div>
			<div>-</div>
			<div>П</div>
			<div>О</div>
			<div>Ж</div>
			<div>А</div>
			<div>Л</div>
			<div>О</div>
			<div>В</div>
			<div>А</div>
			<div>Т</div>
			<div>Ь</div>
		</div>
			<div class="logo_name">
			  <!--<div>A</div>
			  <div>r</div>
			  <div>c</div>
			  <div>a</div>
			  <div>d</div>
			  <div>i</div>
			  <div>A</div>-->
			  <div>м</div>
			  <div>и</div>
			  <div>н</div>
			  <div>и</div>
			  <div>|</div>
			  <div>о</div>
			  <div>т</div>
			  <div>е</div>
			  <div>л</div>
			  <div>ь</div>
			</div>
			<a href="#mainCheck"><button class="btn_book">Забронировать</button></a>	
		</div>
		<!--<div class="gold_line"></div>-->
		<div class="white_part">
		  <div class="slide_wrapper">
			<!--<div id="img_roll" class="img_roll"></div>-->
			
				<img src="images/photo-1584091780978-1beeb2bec1b8.jpg" alt="" class="img_res" id="1">
				<!--<img src="images/photo-1584091780978-1beeb2bec1b8.jpg" alt="" class="img_res">-->
		
			<!--<button onclick="carousel()">GO</button>-->
		  </div>
		</div>
	</div>

	<hr class="line">

	<div class="mainCheck" id="mainCheck">
	  <div>
		<h2 class="check_h2">Забронировать номер</h2>	
		<h3 class="check_h3">Выберите дату</h3>
		<form action="{{ url('/check') }}" method="POST" onsubmit="return checkVal()">
			{{ csrf_field() }}
			<p><label for="dates">Доступные даты: </label></p>
			<select name="dates" id="selectDates" class="selectStyle">
				<option value=" " >Выбрать</option>
				@if(isset($dates))
				@foreach($dates as $date)
				@if($date->date>=$today)
				<option value="{{ $date->id }}">{{ $date->date }}</option>
				@endif
				@endforeach
				@endif
			</select>
			<input type="submit" value="Проверить" class="checkBtn" onclick="keepPos()" >
		</form>
	  </div>
		@if(isset($all))
		<div class="check_bar">
			<h3>Свободные номера, дата {{$selected->date}}</h3>
			<div class="check_result">
			@for($i=0;$i< count($all);$i++)
				
					<div class="check_img">
						<img src="{{$all[$i]->main_img}}">
					</div>
					<div class="check_info">
						<h4 class="check_h4">{{$all[$i]->room_name}}</h4>
						<p class="check_p">{{$all[$i]->room_bed}}</p>
						<p class="check_p">{{$all[$i]->room_bath}}</p>
						<p class="check_p">{{$all[$i]->room_media}}</p>
						@if(Auth::check())
						<form action="{{ url('/lk') }}" method="POST">
					  	{{ csrf_field() }}
					  	<input type="hidden" name="room" value="{{$all[$i]->id}}">
					  	<button type="submit" name="bookBtn" class="bookBtn">Забронировать</button>
						</form>
						<!--<button>Забронировать</button>-->
						@else
						<p class="check_p">Бронирование онлайн, доступно зарегистрированным пользователям</p>
						@endif
					</div>
					
				
			@endfor
		    </div>
		</div>
		@endif
		
		<a name="mainCheck"></a>
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

<script src="/js/main.js"> </script>
<script src="/js/app.js"></script>
</body>
</html>