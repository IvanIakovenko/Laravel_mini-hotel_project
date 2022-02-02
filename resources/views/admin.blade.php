<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hello, dear friend</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div>
		<form action="{{ url('/main') }}" method="GET">
			{{ csrf_field() }}
			<button type="submit" name="goToMain" class="btn btn-outline-primary">На главную</button>
		</form>
	</div>

	<h1>Добавить комнату</h1>
	<form action="{{ url('/addRoom') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="main_img">Большая картинка</label>
			<input type="file" name="main_img" id="main_img" class="form-control w-25" accept="image/jpeg,image/png,image/jpg">
			
		</div>
		<div class="form-group">
			<label for="room_name">Заголовок комнаты</label>
			<input type="text" name="room_name" id="room_name" class="form-control w-25">
			
		</div>
		<div class="form-group">
			<label for="room_bed">Кровати</label>
			<input type="text" name="room_bed" id="room_bed" class="form-control w-25">
		</div>
		<div class="form-group">
			<label for="room_bath">Ванная туалет</label>
			<input type="text" name="room_bath" id="room_bath" class="form-control w-25">
		</div>
		<div class="form-group">
			<label for="room_media">Медиа</label>
			<input type="text" name="room_media" id="room_media" class="form-control w-25">
		</div>
		<div class="form-group">
			<label for="room_price">Цена</label>
			<input type="number" name="room_price" id="room_price" class="form-control w-25">
		</div class="form-group">
		
		<div class="form-group">
			<label for="sml_img1">1</label>
			<input type="file" name="sml_img1" id="sml_img1"  class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img2">2</label>
			<input type="file" name="sml_img2" id="sml_img2" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img3">3</label>
			<input type="file" name="sml_img3" id="sml_img3" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img4">4</label>
			<input type="file" name="sml_img4" id="sml_img4" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img5">5</label>
			<input type="file" name="sml_img5" id="sml_img5" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img6">6</label>
			<input type="file" name="sml_img6" id="sml_img6" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img7">7</label>
			<input type="file" name="sml_img7" id="sml_img7" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<input type="submit" name="addRoom" value="Добавить" class="btn btn-primary">
		
	</form>

	@if(session('message'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('message')}}</h3>
		</div>
	@endif

	<h1>Обновить комнату</h1>
	<h2>Выбрать комнату</h2>
	@if(isset($ids))
	<form action="{{ url('/ask/room') }}" method="POST">
		{{ csrf_field() }}
		<select name="selectedRoom">
			<option value="">Выбрать</option>
			@foreach($ids as $id)
			<option value="{{ $id }}"
			@if(isset($option)) 
			@if($id == $option)
			selected="selected"
			@endif
			@endif>Комната {{ $id }}</option>
			@endforeach
		</select>
		<input type="submit" name="askRoom" value="Выбрать">
    </form>
	@endif

	@if(isset($roomForUpd))
	<form action="{{ url('/update/room/'.$roomForUpd->id) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="main_img">Большая картинка</label>
			<input type="file" name="main_img" id="main_img" class="form-control w-25" accept="image/jpeg,image/png,image/jpg" >
			
		</div>
		<div class="form-group">
			<label for="room_name">Заголовок комнаты</label>
			<input type="text" name="room_name" id="room_name" class="form-control w-25" value="{{$roomForUpd->room_name}}">
			
		</div>
		<div class="form-group">
			<label for="room_bed">Кровати</label>
			<input type="text" name="room_bed" id="room_bed" class="form-control w-25" value="{{$roomForUpd->room_bed}}">
		</div>
		<div class="form-group">
			<label for="room_bath">Ванная туалет</label>
			<input type="text" name="room_bath" id="room_bath" class="form-control w-25" value="{{$roomForUpd->room_bath}}">
		</div>
		<div class="form-group">
			<label for="room_media">Медиа</label>
			<input type="text" name="room_media" id="room_media" class="form-control w-25" value="{{$roomForUpd->room_media}}">
		</div>
		<div class="form-group">
			<label for="room_price">Цена</label>
			<input type="number" name="room_price" id="room_price" class="form-control w-25" value="{{$roomForUpd->room_price}}">
		</div>
		
		<div class="form-group">
			<label for="sml_img1">1</label>
			<input type="file" name="sml_img1" id="sml_img1" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img2">2</label>
			<input type="file" name="sml_img2" id="sml_img2" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img3">3</label>
			<input type="file" name="sml_img3" id="sml_img3" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img4">4</label>
			<input type="file" name="sml_img4" id="sml_img4" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img5">5</label>
			<input type="file" name="sml_img5" id="sml_img5" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img6">6</label>
			<input type="file" name="sml_img6" id="sml_img6" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img7">7</label>
			<input type="file" name="sml_img7" id="sml_img7" accept="image/jpeg,image/png,image/jpg">
		</div>
		<input type="submit" name="updRoom" value="Обновить" class="btn btn-primary">
		
	</form>
	
	<h3>Фотографии комнаты</h3>
	
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img1}}" alt="" style="width: 100%;height: 100%;">
	</div>
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img2}}" alt="" style="width: 100%;height: 100%;">
	</div>
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img3}}" alt="" style="width: 100%;height: 100%;">
	</div>
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img4}}" alt="" style="width: 100%;height: 100%;">
	</div>
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img5}}" alt="" style="width: 100%;height: 100%;">
	</div>
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img6}}" alt="" style="width: 100%;height: 100%;">
	</div>
	<div style="width: 200px;height: 200px; display: inline-block;">
	  <img src="{{$roomForUpd->sml_img7}}" alt="" style="width: 100%;height: 100%;">
	</div>
	@endif
	@if(session('updatedRoom'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('updatedRoom')}}</h3>
		</div>
	@endif

	<h2>Форма страницы Контакты</h2>
	<div>
		<form action="{{ url('/addContact')}}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">			
			  <label for="hotel_name">Название отеля</label>
			  <input type="text" name="hotel_name" class="form-control w-25">
		    </div>
		    <div class="form-group">
			  <label for="street">Улица</label>
			  <input type="text" name="street" class="form-control w-25">
			</div>
			<div class="form-group">
			  <label for="city">Город</label>
			  <input type="text" name="city" class="form-control w-25">
			</div>
			<div class="form-group">
			  <label for="post_index">Почтовый индекс</label>
			  <input type="text" name="post_index" class="form-control w-25">
			</div>
			<div class="form-group">
			  <label for="phone">Телефон</label>
			  <input type="text" name="phone" class="form-control w-25">
			</div>
			<div class="form-group">
			  <label for="fax">Факс</label>
			  <input type="text" name="fax" class="form-control w-25">
			</div>
			<div class="form-group">
			  <label for="email">Имейл</label>
			  <input type="text" name="email" class="form-control w-25">
			</div>
			<div class="form-group">
			  <label for="map">Карта</label>
			  <input type="text" name="map" class="form-control w-25">
			</div>

			<input type="submit" name="addContact" value="Добавить" class="btn btn-primary">
		</form>
		@if(session('message2'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('message2')}}</h3>
		</div>
		@endif
	</div>

	<h2>Обновить контактную информацию</h2>
	<div>
	@if(isset($contact))
		<form action="{{ url('/updContact/'.$contact->id)}}" method="POST">
			{{ csrf_field() }}
			<label for="hotel_name">Название отеля</label>
			<input type="text" name="hotel_name" value="{{$contact->hotel_name}}">
			<label for="street">Улица</label>
			<input type="text" name="street" value="{{$contact->street}}">
			<label for="city">Город</label>
			<input type="text" name="city" value="{{$contact->city}}">
			<label for="post_index">Почтовый индекс</label>
			<input type="text" name="post_index" value="{{$contact->post_index}}">
			<label for="phone">Телефон</label>
			<input type="text" name="phone" value="{{$contact->phone}}">
			<label for="fax">Факс</label>
			<input type="text" name="fax" value="{{$contact->fax}}">
			<label for="email">Имейл</label>
			<input type="text" name="email" value="{{$contact->email}}">
			<label for="map">Карта</label>
			<input type="text" name="map" value="{{$contact->map}}">
			<input type="submit" name="updContact" value="Обновить">
		</form>
	</div>
	@endif

	@if(session('updContact'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('updContact')}}</h3>
		</div>
	@endif

	<h3>Добавить информацию страница об отеле</h3>
	<div>
	<form action="{{ url('/addAbout') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="main_img">Большая картинка</label>
			<input type="file" name="main_img" id="main_img" class="form-control w-25" accept="image/jpeg,image/png,image/jpg">
			
		</div>
		<div class="form-group">
			<label for="big_name">Название</label>
			<input type="text" name="big_name" id="big_name" class="form-control w-25">
			
		</div>
		<div class="form-group">
			<label for="type_name">Тип</label>
			<input type="text" name="type_name" id="type_name" class="form-control w-25">
		</div>
		<div class="form-group">
			<label for="short_text">Короткий текст</label>
			<input type="text" name="short_text" id="short_text" class="form-control w-25">
		</div>
		<div class="form-group">
			<label for="description_one">Описание 1</label>
			<!--<input type="text" name="description_one" id="description_one" class="form-control w-25">-->
			<textarea name="description_one" id="description_one" class="form-control w-25"></textarea>
		</div>
		<div class="form-group">
			<label for="description_two">Описание 2</label>
			<!--<input type="text" name="description_two" id="description_two" class="form-control w-25">-->
			<textarea name="description_two" id="description_two" class="form-control w-25"></textarea>
		</div>
		<div class="form-group">
			<label for="description_three">Описание 3</label>
			<!--<input type="text" name="description_three" id="description_three" class="form-control w-25">-->
			<textarea name="description_three" id="description_three" class="form-control w-25"></textarea>
		</div>
		
		<div class="form-group">
			<label for="sml_img1">1</label>
			<input type="file" name="sml_img1" id="sml_img1"  class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img2">2</label>
			<input type="file" name="sml_img2" id="sml_img2" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img3">3</label>
			<input type="file" name="sml_img3" id="sml_img3" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		
		<input type="submit" name="addAbout" value="Добавить" class="btn btn-primary">
		
	</form>
	@if(session('about'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('about')}}</h3>
		</div>
	@endif
    </div>

    <h3>Обновить информацию страницы об отеле</h3>
	<div>
	@if(isset($about))
	<form action="{{ url('/updAbout/'.$about->id) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="main_img">Большая картинка</label>
			<input type="file" name="main_img" id="main_img" class="form-control w-25" accept="image/jpeg,image/png,image/jpg">
			
		</div>
		<div class="form-group">
			<label for="big_name">Название</label>
			<input type="text" name="big_name" id="big_name" class="form-control w-25" value="{{$about->big_name}}">
		</div>
		<div class="form-group">
			<label for="type_name">Тип</label>
			<input type="text" name="type_name" id="type_name" class="form-control w-25" value="{{$about->type_name}}">
		</div>
		<div class="form-group">
			<label for="short_text">Короткий текст</label>
			<input type="text" name="short_text" id="short_text" class="form-control w-25" value="{{$about->short_text}}">
		</div>
		<div class="form-group">
			<label for="description_one">Описание 1</label>
			<!--<input type="text" name="description_one" id="description_one" class="form-control w-25">-->
			<textarea name="description_one" id="description_one" class="form-control w-25">{{$about->description_one}}</textarea>
		</div>
		<div class="form-group">
			<label for="description_two">Описание 2</label>
			<!--<input type="text" name="description_two" id="description_two" class="form-control w-25">-->
			<textarea name="description_two" id="description_two" class="form-control w-25">{{$about->description_two}}</textarea>
		</div>
		<div class="form-group">
			<label for="description_three">Описание 3</label>
			<!--<input type="text" name="description_three" id="description_three" class="form-control w-25">-->
			<textarea name="description_three" id="description_three" class="form-control w-25">{{$about->description_three}}</textarea>
		</div>
		
		<div class="form-group">
			<label for="sml_img1">1</label>
			<input type="file" name="sml_img1" id="sml_img1"  class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img2">2</label>
			<input type="file" name="sml_img2" id="sml_img2" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		<div class="form-group">
			<label for="sml_img3">3</label>
			<input type="file" name="sml_img3" id="sml_img3" class="form-control w-50" accept="image/jpeg,image/png,image/jpg">
		</div>
		
		<input type="submit" name="updAbout" value="Обновить" class="btn btn-primary">
		
	</form>
	@endif
	@if(session('updatedAbout'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('updatedAbout')}}</h3>
		</div>
	@endif
    </div>

	<h2>Добавить расписание</h2>
	<div>
		<form action="{{ url('/addShedule') }}" method="POST">
			{{ csrf_field() }}
			<label for="room_id">id номер комнаты</label>
			<input type="text" name="room_id">
			<label for="date">Дата</label>
			<input type="date" name="date">
			<input type="submit" name="addShedule" value="добавить расписание">
		</form>
		@if(session('message3'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('message3')}}</h3>
		</div>
		@endif
	</div>

	<h3>Расписание</h3>
	@if(isset($shedule))
	@foreach($shedule as $dates)
	<div>{{$dates->date}}</div>
	@endforeach
	@endif

	<div>
		<h2>Добавить расписание для первой комнаты</h2>
		<form action="{{ url('/addShedule2') }}" method="POST">
			{{ csrf_field() }}
			<label for="room_id">id номер комнаты</label>
			<input type="text" name="room_id">
			<label for="date">Дата</label>
			<input type="date" name="date">
			<input type="submit" name="addShedule2" value="добавить расписание">
		</form>
		@if(session('message5'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('message5')}}</h3>
		</div>
		@endif
	</div>

	<h2>Добавить фото в карусель</h2>
	<div>
	  <form action="{{ url('/addCarousel') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="car_img" id="car_img" accept="image/jpeg,image/png,image/jpg">
		<input type="submit" name="addCarImg" value="Загрузить изображение">
	  </form>
	  @if(session('message4'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('message4')}}</h3>
		</div>
	  @endif

	  <h3>Обновить фото карусели</h3>
	  @foreach($carPhotos as $photo)
	  <div style="width: 200px;height: 200px;">
	  	<img src="{{$photo->images_path}}" alt="" style="width: 100%;height: 100%;">
	  </div>
	  <div>
	  	<form action="{{ url('/updCarousel/'.$photo->id) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="car_img" id="car_img" accept="image/jpeg,image/png,image/jpg">
		<input type="submit" name="updCarImg" value="Обновить фото">
	  </form>
	  </div>
	  @endforeach

	  @if(session('updatedCar'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('updatedCar')}}</h3>
		</div>
	  @endif

	  <h3>Фотографии карусели</h3>
	  @foreach($carPhotos as $photo)
	  <div style="width: 400px;height: 400px;">
	  	<img src="{{$photo->images_path}}" alt="" style="width: 100%;height: 100%;">
	  </div>
	  @endforeach


	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>