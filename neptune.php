<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
		<title>TD2</title>
		<link rel="stylesheet" href="info_planetes.css" />
	</head>
	<body>
		<header>
			<nav>
				<div class="nav__content">
					<div class="logo"><a href="index.php">Système Solaire</a></div>
					<ul>
						<li><a href="equipe.php">Equipe</a></li>
						<li><a href="https://fr.wikipedia.org/wiki/Syst%C3%A8me_solaire" class="lien">Wikipédia</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="wrapper">
			<div class="image-box">
				<img src="img_planet/Neptune.png" alt="Info Planète" />
			</div>
			<div class="details-box">
				<h1>Neptune</h1>
				<div id="btn">
					<ion-icon id="btn-icon" name="chevron-down"></ion-icon>
				</div>
			</div>
			<div id="details">
				Neptune est la huitième et dernière planète du système solaire, située au-delà d'Uranus.
				C'est une géante gazeuse composée principalement d'hydrogène, d'hélium et de traces de méthane.
				Neptune est souvent considérée comme une "jumelle glacée" d'Uranus en raison de ses caractéristiques similaires.
				La planète se distingue par sa couleur bleue intense, due à la présence de méthane dans son atmosphère qui absorbe la lumière rouge.
				Neptune possède des vents atmosphériques particulièrement forts, avec des vitesses pouvant atteindre près de 2 000 kilomètres par heure.
				Elle est également connue pour sa Grande Tache sombre, une tempête anticyclonique similaire à la Grande Tache Rouge de Jupiter.
				Neptune a un système d'anneaux, bien que moins spectaculaire que celui de Saturne, et elle a 14 lunes connues.
				La plus grande lune de Neptune est Triton, qui est unique parmi les grandes lunes du système solaire en raison de son mouvement rétrograde, c'est-à-dire qu'il orbite dans le sens opposé à la rotation de la planète.
			</div>
			<div class="button-container">
			<button id="backButton"><a href="planete.php">Retour</a></button>
			</div>
		</div>
		<script src="affichage.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>
