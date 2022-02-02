<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/menu.css">
</head>
<body>
	@section('menu')

	@if (!Auth::guest())
	<div class="logout_nav">
		Здравствуйте, {{ Auth::user()->name }}
		<div style="margin-left: 15px; margin-right: 15px;">
		<a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
    	</div>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
	</div>
	@endif

	<header id="header">
		<div class="nav_logo">ArcadiA</div>
		<nav>
			<div class="navbar">
				<a href="{{ url('/') }}">Главная</a>
				<a href="{{ url('/rooms') }}">Номера</a>
				<a href="{{ url('/contact') }}">Контакты</a>
				<a href="#">Регистрация</a>
				<a href="{{ url('/login') }}">Войти</a>
				@if(isset($admin))
				<a href="{{ url('/adpart') }}">Admin</a>
				@endif
			</div>
		</nav>
		
		<select name="" id="">
			<option>RU</option>
			<option value="">ENG</option>
		</select>
		@if(isset($admin))
		<div>"Hello: {{ $admin->name }}"</div>
		@endif
	</header>
	@show
	
</body>
</html>