<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="/css/login.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
   
    
    
</head>
<body>
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
        </div>
        
        <select name="" id="">
            <option>RU</option>
            <option value="">ENG</option>
        </select>
        @if(isset($admin))
        <div>"Hello: {{ $admin->name }}"</div>
        @endif
    </header>

    <div class="gold_line"></div>
    
    <div class="container">
         <div class="reg_form">
            
                <div class="image_part">
                  <img src="images/jonathan-borba-nyqJ_LJVc4U-unsplash.jpg" class="form_img">
                  <h2 class="img_title">Добро пожаловать</h2>
                </div>
                <div class="form_part">

                    <div class="form_wrapper">
                    <form  method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <h2 class="title_h2">Вход</h2>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Электронная почта</label>

                            <div >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label for="remember">Запомнить меня
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> 
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="forgot_pass">
                               <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Забыли пароль?
                               </a>
                        </div>
                        <button type="submit" class="btn_log">Войти</button>           
                    </form>
                   </div>
                </div>
            
        
        </div>
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
      
<!-- Scripts -->
<script src="/js/app.js"></script>

</body>
</html>