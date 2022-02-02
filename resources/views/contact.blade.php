<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Контакты</title>
	<link rel="stylesheet" href="/css/contact.css">
	<link rel="stylesheet" href="/css/logout_bar.css">
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

	@if(count($errors) > 0)
	<div class="w-100">
	  <div class="alert alert-danger">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <p><strong>Что-то пошло не так!</strong></p>
	    <p>
	      <ul>
	        @foreach($errors->all() as $error)
	          <li>{{ $error }}</li>
	        @endforeach
	      </ul>
	    </p>
	  </div>
	</div>
	@endif

	<div class="contact_container effect3">
		<div class="cont_inform">
		  <div class="inform_blk">
			<h2>{{$info->hotel_name}}</h2>
			<h2>{{$info->post_index}}</h2>
			<h2>{{$info->street}},</h2>
			<h2>{{$info->city}},</h2>
			<h2 class="h2_a">Tелефон: <a href="">{{$info->phone}}</a></h2>
			<h2 class="h2_a">Факс: <a href="">{{$info->fax}}</a></h2>
			<h2 class="h2_a">Эл.почта: <a href="">{{$info->email}}</a></h2>
		  </div>
		  <div class="map" id="map">
		  	<div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/39/rostov-na-donu/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ростов‑на‑Дону</a><a href="https://yandex.ru/maps/39/rostov-na-donu/?ll=39.684552%2C47.225281&utm_medium=mapframe&utm_source=maps&z=19.4" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс.Карты — поиск мест и адресов, городской транспорт</a><iframe src="https://yandex.ru/map-widget/v1/-/CCQ3YZHScB" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
		  </div>
		</div>
	
		<div class="cont_form">
		 
		  <h2 class="form_title">Реклама и сотруднечиство</h2>
		  <div class="form_blck form_shadow">
		  	<div class="form_wrapper">
				<form action="{{ url('/send') }}" method="POST" onsubmit="return checkForm(event)" id="contForm">

					{{ csrf_field() }}

					<label for="name">Имя*</label>
					<input type="text" name="name"  id="name" required />
					<label for="phone">Телефон</label>
					<input type="number" name="phone" id="phone">
					<label for="email">Электронная-Почта*</label>
					<input type="text" name="email" id="email" required />
					<label for="message">Сообщение</label>
					<p><textarea name="message" id="message" cols="33" rows="10"></textarea></p>
					<div class="requaire_title">*Обязательные поля</div>
					
					<button type="submit" class="btn_contact">Отправить</button>
					
				</form>
		    </div>
		  </div>
		</div>
	</div>
	@if(session('message'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('message')}}</h3>
		</div>
	@endif

	<hr class="line">

	<footer>
	
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
	
		<div class="footer_hotel">
			<div>&copy; Grand mini-hotel &bull; 2020 &bull;</div>
		</div>
		<div class="footer_owner">
			<p>Сайт разработан и поддерживается Яковенко Иваном, все права защищены. &copy; 2020</p>
		</div>
	</footer>

	<script src="/js/contact.js"></script>
	
</body>
</html>