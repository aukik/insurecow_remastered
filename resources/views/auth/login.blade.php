<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--==================== BOOTSTRAP ====================-->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />

    <!--==================== FONT AWESOME ====================-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/login_page.css') }}"/>

    <title>InsureCow</title>
</head>

<body class="container">
<!--==================== NAVBAR ====================-->
<header>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light pb-0">
            <div class="container-fluid">
                <!--Navbar Logo-->
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="./images/logo_login.png" alt="Logo"/>
                </a>

                <button
                    type="button"
                    class="navbar-toggler"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--
                <div id="navbarCollapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item navbar-brand">
                      <a href="#" class="nav-link">About Us</a>
                    </li>

                    <li class="nav-item navbar-brand">
                      <a href="#" class="nav-link">Plans</a>
                    </li>

                    <li class="nav-item navbar-brand">
                      <a href="#" class="nav-link">Features </a>
                    </li>

                    <li class="nav-item navbar-brand">
                      <a href="#" class="nav-link">Our Goals</a>
                    </li>

                    <li class="nav-item navbar-brand">
                      <a href="#" class="nav-link">Contact Us </a>
                    </li>
                  </ul>

                  <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item navbar-brand">
                      <a href="#" class="nav-link">English</a>
                    </li>

                    <div class="vr vr-style"></div>

                    <li class="nav-item navbar-brand ms-2">
                      <a href="#" class="nav-link">বাংলা </a>
                    </li>
                  </ul>
                </div> -->
            </div>
        </nav>
        <hr class="hr-style"/>
    </div>
</header>

<!--==================== LOG IN ====================-->

<section>
    <div class="row g-0 mt-5 mb-5">
        <div class="col-lg-6">
            <div class="card card-style h-100">
                <div class="card-body">
                    <img src="{{ asset('images/cow2.png') }}" class="img-fluid" alt="Cow"/>
                </div>
            </div>
        </div>

        <!--Sign In Form-->
        <div class="col-lg-6">
            <div class="card login-card p-5 h-100">
                <div class="card-body">
                    <p class="login-text mb-4">Sign In</p>
                    <p class="p-welcome-text mb-5">Welcome To InsureCow!</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!--User Name-->
                        <div class="mb-4">
                            <label for="username" class="form-label"
                            >Enter Email / Phone number:
                            </label>


                            <input
                                type="text"
                                id="email"
                                class="form-control fontAwesome input-form @error('email') is-invalid @enderror"
                                placeholder=""
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                            />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <!--User Password-->
                        <div class="mb-4">
                            <label for="password" class="form-label"
                            >Enter Password:
                            </label>


                            <input
                                type="password"
                                class="form-control fontAwesome input-form @error('password') is-invalid @enderror"
                                id="password"
                                placeholder=""
                                required="required"
                                name="password"
                                value="{{ old('password') }}"
                                autocomplete="password"
                            />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <!--Terms & Conditions-->
                        <div class="col-12 mb-4">
                            <div class="form-check">


                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="remember"
                                    name="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                />
                                <label class="form-check-label" for="invalidCheck2">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <!--Log In Button-->
                        <button type="submit" class="login-button mb-4">Log In</button>

                        @if (Route::has('password.request'))

                            <div class="d-flex justify-content-between mb-5">
                                <a href="{{ route('password.request') }}" class="form-footer-text"
                                >Forgot password?</a
                                >
                                @endif


                            </div>
                    </form>
                    <hr class="hr-style"/>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==================== FOOTER ====================-->
<hr class="hr-style"/>
<section>
    <footer>
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-4">
                    <div>
                        <img src="{{ asset('images/logo_login.png') }}"/>
                    </div>
                    <p>
                        InsureCow is a cattle wellbeing monitoring and insurance
                        platform that is playing a significant role in protecting and
                        ensuring the asset value of large cattle for livestock farmers.
                    </p>
                </div>

                <!--Grid column-->
{{--                <div class="col-lg-2 col-md-12 mt-lg-4 mb-4 mb-md-4 offset-lg-1">--}}
{{--                    <div>--}}
{{--                        <h5 class="mb-4">Language</h5>--}}
{{--                        <ul class="list-unstyled mb-0">--}}
{{--                            <li class="mb-2">--}}
{{--                                <a href="#" class="language-footer">English</a>--}}
{{--                            </li>--}}
{{--                            <li class="mb-2">--}}
{{--                                <a href="#" class="language-footer">Bangla</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mt-lg-4 mb-4 mb-md-0 offset-lg-4">
                    <div>
                        <h5 class="mb-4">Contact Us</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">Phone : +880 1755 680 807</li>
                            <li class="mb-2">E-mail : inquiry@insurecow.com</li>
                            <li class="mb-2">
                                3rd Floor, YB Hassan Uddin Tower GA-25/4, Shahjadpur, PragaC
                                Sharani, Gulshan Dhaka- 1212.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <p>Insure Cow © 2023 All Right Reserved</p>
        </div>
    </footer>
</section>

<!--==================== JavaScript Bundle with Popper ====================-->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
></script>
</body>
</html>



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Login') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}


{{--                            <div class="row mb-3">--}}
{{--                                <label for="email" class="form-label col-md-4 col-form-label text-md-end">Email /--}}
{{--                                    Phone: </label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" name="email" value="{{ old('email') }}" required--}}
{{--                                           autocomplete="email" autofocus type="text"--}}
{{--                                           class="form-control fontAwesome input-form  @error('email') is-invalid @enderror"--}}
{{--                                           placeholder="Enter Email or Phone" required="required"/>--}}
{{--                                </div>--}}

{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}


{{--                            <div class="row mb-3">--}}
{{--                                <label for="password"--}}
{{--                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password"--}}
{{--                                           class="form-control @error('password') is-invalid @enderror" name="password"--}}
{{--                                           required autocomplete="current-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember"--}}
{{--                                               id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Login') }}--}}
{{--                                    </button>--}}

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
