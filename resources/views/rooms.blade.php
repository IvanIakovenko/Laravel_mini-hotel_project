<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Номера</title>
	<link rel="stylesheet" href="/css/rooms.css">
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
		<button class="dropbtn">Меню</button>
		<div class="dropdown-content">
		<a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <a href="{{ url('/lk') }}">Личный кабинет</a>
    	</div>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    	</div>
	</div>
	@endif

	<header id="r_header">
	  
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

	<main id="main">
		@foreach($rooms as $room)
		@if($room->id%2!==0)
		<div class="room_block1">
			<div class="room_img">
			  <div class="img_wrap">
				<img src="{{ $room->main_img}}" alt=""  id="{{$room->id}}">
			  </div>
			</div>
			<div class="room_description">
				<div class="frame_style">
					<h2 class="rooms_title">{{$room->room_name}}</h2>
					<p class="rooms_desc">{{$room->room_bed}}</p>
					<p class="rooms_desc">12m<sup>3</sup></p>
					<p class="rooms_desc">{{$room->room_bath}}</p>
					<p class="rooms_desc">{{$room->room_media}}</p>
					@if(Auth::check())
					<p class="rooms_desc">{{$room->room_price}} Р/Сутки</p>

					<!--форма для кнопки забронировать-->
					<form action="{{ url('/lk') }}" method="POST">
					  {{ csrf_field() }}
					  <input type="hidden" name="room" value="{{$room->id}}">
					  <button type="submit" name="bookBtn" class="btn_book">Забронировать</button>
					</form>
					@else
					<p class="rooms_desc">Стоимость и возможность забронировать номер онлайн, <br />доступна зарегистрированным пользователям.</p>
					@endif

					<div class="rooms_images">
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img1 }}" alt="" onclick="showImg(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img2 }}" alt="" onclick="showImg(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img3 }}" alt="" onclick="showImg(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img4 }}" alt="" onclick="showImg(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img5 }}" alt="" onclick="showImg(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img6 }}" alt="" onclick="showImg(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img7 }}" alt="" onclick="showImg(event)">
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		@if($room->id%2==0)
			<div class="room_block1">
			<div class="room_description">
				<div class="frame_style">
					<h2 class="rooms_title">{{$room->room_name}}</h2>
					<p class="rooms_desc">{{$room->room_bed}}</p>
					<p class="rooms_desc">12m<sup>3</sup></p>
					<p class="rooms_desc">{{$room->room_bath}}</p>
					<p class="rooms_desc">{{$room->room_media}}</p>
					@if(Auth::check())
					<p class="rooms_desc">{{$room->room_price}} Р/Сутки</p>
					<form action="{{ url('/lk') }}" method="POST">
					  {{ csrf_field() }}
					  <input type="hidden" name="room" value="{{$room->id}}">
					  <button type="submit" name="bookBtn" class="btn_book">Забронировать</button>
					</form>
					@else
					<p class="rooms_desc">Стоимость и возможность забронировать номер онлайн, <br />доступна зарегистрированным пользователям.</p>
					@endif
					<div class="rooms_images">
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img1 }}" alt="" onclick="showImgEven(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img2 }}" alt="" onclick="showImgEven(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img3 }}" alt="" onclick="showImgEven(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img4 }}" alt="" onclick="showImgEven(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img5 }}" alt="" onclick="showImgEven(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img6 }}" alt="" onclick="showImgEven(event)">
						</div>
						<div class="sml_img_shad">
							<img src="{{ $room->sml_img7 }}" alt="" onclick="showImgEven(event)">
						</div>
					</div>
				</div>
			</div>
			<div class="room_img">
			  <div class="img_wrap2">
				<img src="images/hotel-room.jpg" alt="" id="{{$room->id}}">
			  </div>
			</div>
		</div>
		@endif
		@endforeach


		<!--
		<div class="room_block1">
			<div class="room_img">
			  <div class="img_wrap">
				<img src="images/photo-1568495248636-6432b97bd949.jpg" alt="" style="width: 100%;">
			  </div>
			</div>
			<div class="room_description">
				<div class="frame_style">
					<h2 class="rooms_title">Двухместный номер</h2>
					<p class="rooms_desc">Две одноместные кровати 180сm</p>
					<p class="rooms_desc">12m<sup>3</sup></p>
					<p class="rooms_desc">Душ, туалет в номере</p>
					<p class="rooms_desc">Телевизор, Wi-Fi</p>
					<div class="rooms_images">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
			</div>
		</div>
		<div class="room_block1">
			<div class="room_description">
				<div class="frame_style">
					<h2 class="rooms_title">Двухместный номер</h2>
					<p class="rooms_desc">Две одноместные кровати 180сm</p>
					<p class="rooms_desc">12m<sup>3</sup></p>
					<p class="rooms_desc">Душ, туалет в номере</p>
					<p class="rooms_desc">Телевизор, Wi-Fi</p>
					<div class="rooms_images" onclick="showImg(event)">
						<div class="sml_img_shad" id="sml_img1">
							<img src="images/chastity-cortijo-6TY_WrJTwSI-unsplash.jpg" alt="">
						</div>
						<div class="sml_img_shad">
							<img src="images/egor-myznik-utPa17sA0l8-unsplash.jpg" alt="">
						</div>
						<div class="sml_img_shad">
							<img src="images/febrian-zakaria-sjvU0THccQA-unsplash.jpg" alt="">
						</div>
						<div class="sml_img_shad">
							<img src="images/gabriel-alenius-lTrbjFd8Iwo-unsplash.jpg" alt="">
						</div>
						<div class="sml_img_shad">
							<img src="images/house-method-CqVHT8g45R8-unsplash.jpg" alt="">
						</div class="sml_img_shad">
						<div class="sml_img_shad">
							<img src="images/joseph-greve-Xdk7tFHP6kU-unsplash.jpg" alt="">
						</div>
						<div class="sml_img_shad">
							<img src="images/justin-docanto-1NEVlrYE-uU-unsplash.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="room_img">
				<img src="images/hotel-room.jpg" alt="" id="big_img1">
			</div>
		</div>
	-->
	
		<button class="upBtn" id="upBtn" onclick="upTop()"><img src="icons/angle-up-solid.svg" alt="arrow-up"></button>
	</main>

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
	<script src="/js/rooms.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>