@extends('layouts.app')

@section('content')
<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="/">
                            <img style="height: 60px;" src="/logo-semi.png" alt="logo">
                        </a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Iniciar sesión</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Correo Electrónico</label>
                                <input id="signin-email" name="email" type="email" class="form-control signin-email @error('email') is-invalid @enderror" placeholder="Correo Electrónico" value="{{ old('email') }}" required="required" autofocus autocomplete="email">
                                @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Contraseña</label>
                                <div class="input-group">
                                    <input id="signin-password" name="password" type="password" class="form-control signin-password @error('password') is-invalid @enderror" placeholder="Contraseña" required="required" autocomplete="current-password">
                                    @error('password')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button type="button" class="input-group-text" id="btnGroupAddon" style="cursor: pointer;"><i class="fas fa-eye"></i></button>
                                </div>

                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="RememberPassword" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="RememberPassword">
                                            Recuérdame
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        @if (Route::has('password.request'))
                                            <div class="forgot-password text-end">
                                                <a href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
        </div>

    </div>
</body>

<script>
    let btnGroupAddon = document.getElementById('btnGroupAddon');
    let inputpassword = document.getElementById('signin-password');

    btnGroupAddon.addEventListener('click', function(){

        if(inputpassword.getAttribute('type') == 'password'){
            inputpassword.setAttribute('type','text');
        }else{
            inputpassword.setAttribute('type','password');
        }
    });

</script>
@endsection
