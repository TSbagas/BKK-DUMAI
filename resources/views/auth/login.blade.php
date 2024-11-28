<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template-no-customizer" data-style="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login Basic - Pages | Vuexy - Bootstrap Admin Template</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
</head>
<body class="bg-dark">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center mb-6">
                            <a href="index.html" class="app-brand-link">
                                <img src="{{asset('assets/img/bkk.png')}}" alt="">
                            </a>
                        </div>
                        <h4 class="mb-1">Welcome! 👋</h4>

                        <form id="formAuthentication" class="mb-4" action="{{route('login')}}" method="POST">
                            @csrf

                            <div class="mb-6">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email or username" value="{{ old('email') }}" autofocus />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <marquee behavior="" direction="">
                                BKK-Dumai @ <?=date('Y');?>
                            </marquee>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/pages-auth.js')}}"></script>

    <script>
        // Memeriksa jika ada error pada password
        @if ($errors->has('password'))
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('password').focus();
            });
        @endif
        </script>
</body>
</html>
