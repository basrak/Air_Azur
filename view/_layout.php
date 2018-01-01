<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title; ?></title>
	<meta name="description" content="Intranet d'Air Azur" />
	<meta name="keywords" content="Air Azur, vol, réservation, voyage, agence, avion, aéroport" />
	<link rel="apple-touch-icon" sizes="57x57" href=".http://localhost/Eval_PHP_FPS/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/Eval_PHP_FPS/img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="http://localhost/Eval_PHP_FPS/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="http://localhost/Eval_PHP_FPS/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="http://localhost/Eval_PHP_FPS/img/favicons/manifest.json">
	<link rel="shortcut icon" href="http://localhost/Eval_PHP_FPS/img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="http://localhost/Eval_PHP_FPS/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS/css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS/css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS//css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS//css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS//fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS//fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="http://localhost/Eval_PHP_FPS//css/cardio.css">
</head>

<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<?=$nav; ?>
	</nav>
	<header id="intro">
		<?=$header; ?>
	</header>
	<section>
		<?=$content1; ?>
	</section>
	<section id="services" class="section section-padded">
		<?=$content2; ?>
	</section>
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Un problème de connexion ?</h3>
					<a href="#" class="btn btn-blue ripple trial-button">Contactez l'administrateur</a>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Serveur actif <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Lun - Ven</h5>
							<h3 class="regular white">9:00 - 22:00</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Samedi</h5>
							<h3 class="regular white">10:00 - 18:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2017 Air Azur - All Rights Reserved. </p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="http://localhost/Eval_PHP_FPS//js/jquery-1.11.1.min.js"></script>
	<script src="http://localhost/Eval_PHP_FPS//js/owl.carousel.min.js"></script>
	<script src="http://localhost/Eval_PHP_FPS//js/bootstrap.min.js"></script>
	<script src="http://localhost/Eval_PHP_FPS//js/wow.min.js"></script>
	<script src="http://localhost/Eval_PHP_FPS//js/typewriter.js"></script>
	<script src="http://localhost/Eval_PHP_FPS//js/jquery.onepagenav.js"></script>
	<script src="http://localhost/Eval_PHP_FPS//js/main.js"></script>
</body>

</html>

