<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ресепшн</title>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="/css/reception.css">
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
       
    	</div>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
	</div>
	@endif

	<h2>Добавить бронь</h2>
	@if(isset($dates))
	  <div class="mainCheck">
		  <div>
			<h3>Забронировать номер</h3>	
			<h3>Выберите дату</h3>
			<form action="{{ url('/reception') }}" method="POST">
				{{ csrf_field() }}
				<select name="dates" id="" class="selectStyle">
					<option value="Choose" selected>Выбрать</option>
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
		<h3>Выбранная дата {{$selDate->date}}</h3>
		<div style="width: 50%;">
			@for($i=0;$i< count($all);$i++)
				<div class="room_block">
					<div style="width:30%;">
						<img src="{{$all[$i]->main_img}}" style="width:100%;">
					</div>
					<div class="check_info">
						<h3 class="check_h4">{{$all[$i]->room_name}}</h3>
						<p class="check_p">{{$all[$i]->room_bed}}</p>
						<p class="check_p">{{$all[$i]->room_bath}}</p>
						<p class="check_p">{{$all[$i]->room_media}}</p>
						<p class="check_p">{{$all[$i]->room_price}}</p>
						
						<form action="{{ url('/booked') }}" method="POST">
						{{ csrf_field() }}
						
						<input type="hidden" name="room" value="{{$all[$i]->id}}">
						<input type="hidden" name="room_name" value="{{$all[$i]->room_name}}">
						<input type="hidden" name="selectDates" value="{{$bookDate}}">
						
						<input type="submit" name="createBook" value="Забронировать" class="bookBtn">
						</form>
					</div>
					
				</div>
			@endfor
		</div>
		@endif
		
	</div>
	@endif

	@if(session('booked'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('booked')}}</h3>
		</div>
	@endif

	<h2>Бронирования</h2>
	<div class="unpaid">
		<h2>Неоплаченые</h2>
		@if(isset($booking))
		@foreach($booking as $book)
		@if($book->status==false)
		{{$book->id}}
		@endif
		@endforeach
		@endif
	</div>
	<div class="paid">
		<h2>Оплаченые</h2>
		@if(isset($booking))
		@foreach($booking as $book)
		@if($book->status==true)
		{{$book->id}}
		@endif
		@endforeach
		@endif
	</div>

	<div>
		<h2>Найти бронирование</h2>
		<form action="{{ url('/search') }}" method="POST">
			{{ csrf_field() }}
			<input type="text" name="searchInp">
			<input type="submit" value="Поиск">
		</form>
		@if(isset($foundId))
		{{$foundId->id}}
		{{$roomId->room_name}}
		{{$dateId->date}}
		<form action="{{url('/updBooking/'.$foundId->id)}}" method="POST">
			{{ csrf_field() }}
			<input type="submit" name="updateB" value="Обновить">
		</form>
		<form action="{{url('/cancelBooking/'.$foundId->id)}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="submit" name="cancelB" value="Отменить бронь">
		</form>
		@endif
		@if(session('updated'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('updated')}}</h3>
		</div>
		@endif
		@if(session('canceled'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('canceled')}}</h3>
		</div>
		@endif
	</div>
		
	


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>	
<script src="/js/app.js"></script>

</body>
</html>