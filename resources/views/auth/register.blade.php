<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter font-weight-bolder">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('assets/images/Auth/auth.png') }}" alt="IMG">
            </div>
            <form class="login100-form validate-form" action="{{ route('auth.register') }}" method="POST">
                @csrf
					<span class="login100-form-title">
						Регистрация
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="name" placeholder="Ваше имя...">
                    <span class="focus-input100"></span>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Ваш email...">
                    <span class="focus-input100"></span>
{{--                    <span class="symbol-input100">--}}
{{--							<i class="fa fa-envelope" aria-hidden="true"></i>--}}
{{--						</span>--}}
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Ваш пароль...">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Подтвердите пароль...">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Регистрация
                    </button>
                </div>

{{--                <div class="text-center p-t-12">--}}
{{--						<span class="txt1">--}}
{{--							Забыли--}}
{{--						</span>--}}
{{--                    <a class="txt2" href="#">--}}
{{--                        Логин / Пароль?--}}
{{--                    </a>--}}
{{--                </div>--}}

                                <div class="text-center p-t-12">
                						<span class="txt1">
                							Уже есть аккаунт?
                						</span>
                                    <a class="txt2" href="{{ route('auth.show.login') }}">
                                        Войти
                                    </a>
                                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
