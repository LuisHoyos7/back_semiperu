@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<body class="app app-reset-password p-0">
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">
				    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="index.html">
                            <img style="height: 60px;" src="/logo-semi.png" alt="logo">
                        </a>
                    </div>
					<h2 class="auth-heading text-center mb-4">Restablecer Contraseña</h2>

					<div class="auth-intro mb-4 text-center">Ingrese su dirección de correo electrónico a continuación. <br>Le enviaremos por correo electrónico un enlace a una página donde puede crear fácilmente una nueva contraseña.</div>

					<div class="auth-form-container text-left">
						@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
						<form class="auth-form resetpass-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Tu Email</label>
								<input id="reg-email" name="email" type="email" class="form-control login-email @error('email') is-invalid @enderror" placeholder="Ingrese su Correo" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Restablecer contraseña</button>
							</div>
						</form>

						<div class="auth-option text-center pt-5">
                            <a class="app-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </div>
					</div><!--//auth-form-container-->


			    </div><!--//auth-body-->
		    </div><!--//flex-column-->
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
	    </div>

    </div>
</body>
@endsection
