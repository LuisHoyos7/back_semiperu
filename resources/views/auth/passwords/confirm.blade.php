@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
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
					<h2 class="auth-heading text-center mb-4">Confirmar Contraseña</h2>

					<div class="auth-intro mb-4 text-center">Confirme su contraseña antes de continuar.</div>

					<div class="auth-form-container text-left">

						<form class="auth-form resetpass-form" method="POST" action="{{ route('password.confirm') }}">
							@csrf
							<div class="password mb-3">
								<label class="sr-only" for="reg-password">Tu contraseña</label>
								<input id="reg-password" name="password" type="password" class="form-control  signin-password @error('password') is-invalid @enderror" placeholder="Escriba su contraseña" required="required" autocomplete="current-password" autofocus>
								@error('password')
									<div id="validationServer03Feedback" class="invalid-feedback">
										{{ $message }}
									</div>
                                @enderror

								<div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        @if (Route::has('password.request'))
                                            <div class="forgot-password text-end">
                                                <a href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Confirmar contraseña</button>
							</div>
						</form>
					</div><!--//auth-form-container-->


			    </div><!--//auth-body-->
		    </div><!--//flex-column-->
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
	    </div><!--//auth-background-col-->

    </div><!--//row-->

</body>
@endsection
