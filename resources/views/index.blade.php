<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Apex2Express Admin') }}</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup dis-none" id="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">{{ __('Apex2Express admin sign up') }}</h2>
                    <form method="POST" action="{{ route('reg') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group @error('code') is-invalid @enderror">
                            <label for="code"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="code" id="code" placeholder="Admin Pass Code" value="{{ old('code') }}" required/>
                            @error('code')
                            <span class="is-invalid text-center" role="alert" style="color: red">
                                   <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if(session('code'))
                                <span class="is-invalid text-center" role="alert" style="color: red">
                                       <strong>{{ session('code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group @error('username') is-invalid @enderror">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required/>
                        </div>
                        @error('username')
                            <span class="is-invalid text-center" role="alert" style="color: red">
                                   <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group @error('password') is-invalid @enderror">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required/>
                        </div>
                        @error('password')
                        <span class="is-invalid text-center" role="alert" style="color: red">
                                   <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="password-confirm" placeholder="Repeat your password" required/>
                        </div>
                        <!--
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" {{ old('remember') ? 'checked' : '' }} required/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        -->
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('img/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="JavaScript:void(0)" onClick="signinForm()" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->
    <section class="sign-in" id="signin">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('img/signin-image.jpg') }}" alt="sing up image"></figure>
                    <a href="JavaScript:void(0)" onclick="signupForm()" class="signup-image-link">{{ __('Create an account as admin') }}</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">{{ __('Apex2Express Sign In') }}</h2>
                    <form method="post" action="{{ route('index') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group @error('username') is-invalid @enderror">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required/>
                            @error('username')
                            <span class="is-invalid text-center" role="alert" style="color: red">
                                   <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if(session('username'))
                                <span class="is-invalid text-center" role="alert" style="color: red">
                                       <strong>{{ session('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group @error('password') is-invalid @enderror">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password"  placeholder="Password" required/>
                            @error('password')
                            <span class="is-invalid text-center" role="alert" style="color: red">
                                   <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if(session('password'))
                                <span class="is-invalid text-center" role="alert" style="color: red">
                                       <strong>{{ session('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" class="agree-term" {{ old('remember') ? 'checked' : '' }}/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    function signinForm() {
        const elements = document.getElementById("signin");
        if (elements.classList.contains("dis-none")) {
            elements.classList.remove("dis-none");
        }
        elements.classList.add("dis-block");
        const element = document.getElementById("signup");
        if (element.classList.contains("dis-block")) {
            element.classList.remove("dis-block");
        }
        element.classList.add("dis-none");
    }

    function signupForm() {
        const elements = document.getElementById("signup");
        if (elements.classList.contains("dis-none")) {
            elements.classList.remove("dis-none");
        }
        elements.classList.add("dis-block");
        const element = document.getElementById("signin");
        if (element.classList.contains("dis-block")) {
            element.classList.remove("dis-block");
        }
        element.classList.add("dis-none");
    }
</script>
</body>
</html>
