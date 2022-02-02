<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Личный кабинет</title>
	<link rel="stylesheet" href="/css/lk.css">
	<link rel="stylesheet" href="/css/logout_bar.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">--> <!--Bootstrap-->

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

	<div class="container_lk">
	  @if(isset($dates))
	  <div class="mainCheck">
		  <div class="booking_panel">
			<h2 class="bp_h2">Забронировать номер</h2>	
			<h3>Выберите дату</h3>
			<form action="{{ url('/ask') }}" method="POST" onsubmit="return checkVal()">
				{{ csrf_field() }}
				<select name="dates" id="selectDates" class="selectStyle">
					<option value=" ">Выбрать</option>
					@if(isset($dates))
					@foreach($dates as $date)
					@if($date->date>=$today)
					<option value="{{ $date->id }}">{{ $date->date }}</option>
					@endif
					@endforeach
					@endif
				</select>
				<input type="submit" value="Проверить" class="checkBtn">
			</form>
			
		  </div>
		@if(isset($all))
		<h3 class="date_h3">Выбранная дата {{$selected->date}}</h3>
		<h3 class="date_h3">Доступные номера: </h3>
		<div class="check_res">
			@for($i=0;$i< count($all);$i++)
				<div class="check_room">
					<div class="room_img">
						<img src="{{$all[$i]->main_img}}">
					</div>
					<div class="room_info">
						<h3 class="room_info_h3">{{$all[$i]->room_name}}</h3>
						<p class="room_info_p">{{$all[$i]->room_bed}}</p>
						<p class="room_info_p">{{$all[$i]->room_bath}}</p>
						<p class="room_info_p">{{$all[$i]->room_media}}</p>
						<p class="room_info_p">{{$all[$i]->room_price}} Р/Сутки</p>
						
						<form action="{{ url('/addBook') }}" method="POST">
						  {{ csrf_field() }}

						  <input type="hidden" name="room" value="{{$all[$i]->id}}">
						  <input type="hidden" name="selectDates" value="{{$datesId}}">
						  <input type="submit" name="createBook" value="Забронировать" class="bookBtn">
						</form>
					</div>
					
				</div>
			@endfor
		</div>
		@endif
		
	</div>
	@endif

	@if(isset($test))
	<div class="from_room">
		<h2>{{$test->room_name}}</h2>
		<form action="{{ url('/addBook') }}" method="POST">
			{{ csrf_field() }}
			<h3>Заказать {{$test->room_name}}</h3>
			<h4>Выберите день</h4>
			<input type="hidden" name="room" value="{{$test->id}}">

			<select name="selectDates" id="" class="selectStyle">
			@for($i=0;$i< count($date);$i++)
			@if($date[$i]->date>=$today)
			<option value="{{$date[$i]->id}}">{{$date[$i]->date}}</option>
			@endif
			@endfor
			</select>
			<input type="submit" name="createBook" value="Забронировать" class="bookBtn">
		</form>
		
	</div>
	@endif
	

	<div class="orders">
		<h2 class="orders_h2">Бронирования</h2>
		<div class="orders_res">
		@if(isset($orders))
		@foreach($orders as $order)
		
		<p>{{$order->date}} {{$order->room_name}}</p>
		
		@endforeach
		@endif
		</div>
		
	</div>

	<div class="info">
		<h2 class="info_h2">Связаться</h2>
		<div class="phone_div">
			<img src="icons/phone-alt-solid.svg" alt="телефонная трубка"> 8 800 333 22 22 
		</div>
		<div class="phone_div">
			<img src="icons/at-solid.svg" alt="телефонная трубка"> request@arcadia.ru
		</div>
	</div>

	@if(session('sorry'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('sorry')}}</h3>
		</div>
	@endif

	</div>
	<div class="messages">
	  @if(session('booked'))
	  <div class="alert alert-success" style="color: green;">
		<h3>{{session('booked')}}</h3>
	  </div>
	  @endif
	</div>



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

	

	
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

<script src="/js/lk.js"></script>
	
</body>
</html>