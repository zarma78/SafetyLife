<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inscription</title>
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

			<div class="wrap-login100">

				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('safety.png') }}" alt="IMG">
				</div>


				<form class="login100-form validate-form" action="{{ action('API\UserController@register') }}" method="post">
					{{ csrf_field() }}
					<span class="login100-form-title">
						Création de Compte
					</span>



						<select name="role_id">
							<option value="4" id="patient">Patient</option>
							<option value="3" id="pompier">Pompier</option>
							<option value="2" id="hopital">Hopital</option>
						</select>




						<div class="wrap-input100 validate-input" data-validate = "Entrez son nom!">
							<input class="input100" type="text" name="last_name" placeholder="Nom">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Entrez son prenom!">
							<input class="input100" type="text" name="first_name" placeholder="Prénom">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="far fa-user" aria-hidden="true"></i>
							</span>
						</div>

					<div class="wrap-input100 validate-input" data-validate = "Entrez votre pays!">
						<input class="input100" type="text" name="pays" placeholder="pays">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
								<i class="far fa-user" aria-hidden="true"></i>
							</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Entrez votre ville">
						<input class="input100" type="text" name="ville" placeholder="vile">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
								<i class="far fa-user" aria-hidden="true"></i>
							</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Entrez votre code postal">
						<input class="input100" type="text" name="code_postal" placeholder="code postal">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
								<i class="far fa-user" aria-hidden="true"></i>
							</span>
					</div>


						<div class="wrap-input100 validate-input" data-validate = "Entrez son sexe!">
							<input class="input100" type="text" name="sexe" placeholder="Sexe">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-neuter" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Entrez sa date de naissance!">
							<input class="input100" type="date" name="age" placeholder="Age">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="far fa-calendar" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Entrez son adresse!">
							<input class="input100" type="text" name="address" placeholder="Adresse">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fas fa-home" aria-hidden="true"></i>
							</span>
						</div>
                    
						<div class="wrap-input100 validate-input" data-validate = "Entrez son e-mail valide: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="E-mail">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "numéro de télephone">
							<input class="input100" type="tel" name="num_phone" placeholder="Tél portable" pattern="[0-9]{10}"
								   required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-mobile" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Entrez son mot de passe temporel!">
							<input class="input100" type="password" name="password" placeholder="Mot de passe">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Entrez de nouveau son mot de passe temporel!">
							<input class="input100" type="password" name="c_password" placeholder="Confirmation Mot de passe">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>




						<div class="container-login100-form-btn">
							<button class="login100-form-btn" onclick="openForm()">
								Création						</button>
							<a class="txt2" href="{{ route('dashboard') }}">
							<br><br>Retour
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
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


	<script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
	</script>
	<script>

	</script>
	<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>