<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Заказы</title>
</head>
<body>
	@if(session('sorry'))
		<div class="alert alert-success" style="color: green;">
			<h3>{{session('sorry')}}</h3>
		</div>
	@endif
</body>
</html>