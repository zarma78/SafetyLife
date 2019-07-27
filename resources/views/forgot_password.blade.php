<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/hamburgers.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/util.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-forgotpass100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('safety.png') }}" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Réinitialisation du mot de passe
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entrez une e-mail valide: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
                            <a href="{{ route('login') }}">
                                Réinitialiser votre mot de passe
                            </a>
                        </button>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>