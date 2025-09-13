{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #0d1117;
            color: #e6e6e6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        #particles-js {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: rgba(25, 30, 40, 0.92);
            border-radius: 0px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.6);
            position: relative;
            z-index: 1;
            overflow: hidden;
            animation: fadeInScale 0.6s ease;
            padding: 3px;
            border-radius: 10px;
        }

        .main {
            border-radius: 10px;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* rotating colorful background */
        .container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(#00ff00, hsl(256, 100%, 50%), hsl(312, 100%, 50%));
            animation: rotateBg 6s linear infinite;
            z-index: -1;
        }

        /* rotation animation */
        @keyframes rotateBg {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .tabs {
            display: flex;
            background: rgba(31, 36, 46, 0.9);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tab {
            flex: 1;
            padding: 18px;
            text-align: center;
            cursor: pointer;
            font-weight: 600;
            color: #aaa;
            transition: all 0.3s ease;
            position: relative;
        }

        .tab.active {
            color: #48dbfb;
        }

        .tab.active::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #6c5ce7, #48dbfb);
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        .form-container {
            padding: 30px;
            background: rgb(13, 17, 23);
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .form {
            display: none;
        }

        .form.active {
            display: block;
            animation: fadeUp 0.5s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #fff;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c5ce7;
        }

        .input-group input {
            width: 100%;
            padding: 14px 14px 14px 45px;
            background: rgba(35, 40, 50, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            transition: 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #48dbfb;
            box-shadow: 0 0 8px rgba(72, 219, 251, 0.4);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .remember {
            display: flex;
            align-items: center;
        }

        .remember input {
            margin-right: 6px;
            accent-color: #6c5ce7;
        }

        .forgot {
            color: #48dbfb;
            text-decoration: none;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #6c5ce7, #48dbfb);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-20deg);
            transition: 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(108, 92, 231, 0.4);
        }

        .separator {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #888;
        }

        .separator::before,
        .separator::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .separator span {
            margin: 0 10px;
            font-size: 14px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(35, 40, 50, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-4px) rotate(6deg);
            background: rgba(108, 92, 231, 0.3);
        }

        .social-btn i {
            font-size: 20px;
            color: #fff;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
            }

            .options {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>

    <div class="container">
        <div class="main">
            <div class="tabs">
                <div class="tab active" data-tab="login">Login</div>
                {{-- <div class="tab" data-tab="register">Register</div> --}}
            </div>

            <div class="form-container">
                <!-- Login Form -->
                <form class="form active" id="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Log In</h2>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email" name="email" class="@error('email') is-invalid @enderror" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        /* tabs switch */
        document.querySelectorAll(".tab").forEach((tab) => {
            tab.addEventListener("click", function() {
                document
                    .querySelectorAll(".tab")
                    .forEach((t) => t.classList.remove("active"));
                this.classList.add("active");
                document
                    .querySelectorAll(".form")
                    .forEach((f) => f.classList.remove("active"));
                document.getElementById(this.dataset.tab + "-form").classList.add("active");
            });
        });

        /* particles init */
        particlesJS("particles-js", {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#6c5ce7"
                },
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: 0.5,
                    random: true
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#48dbfb",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 3,
                    direction: "none",
                    random: false,
                    straight: false,
                    out_mode: "out"
                }
            },
            interactivity: {
                events: {
                    onhover: {
                        enable: true,
                        mode: "grab"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    }
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 0.6
                        }
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>

</html>
