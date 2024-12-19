<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
		<title>TD1</title>
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
				<img src="img_planet/mercury.png" alt="Info Planète" />
			</div>
			<div class="details-box">
				<h1>Mercure</h1>
				<div id="btn">
					<ion-icon id="btn-icon" name="chevron-down"></ion-icon>
				</div>
			</div>
			<div id="details">
				Mercure est la planète la plus proche du Soleil dans notre système solaire et la plus petite des planètes rocheuses.
				Elle ne possède pas d'atmosphère significative, ce qui signifie que sa surface est exposée aux variations extrêmes de température, allant de très chaud pendant le jour à extrêmement froid la nuit. 
                En raison de son absence d'atmosphère, Mercure ne retient pas la chaleur solaire, ce qui entraîne des écarts thermiques importants.
                La surface de Mercure est caractérisée par des plaines, des cratères, des escarpements et des montagnes. 
				Elle a une rotation très lente sur son axe, avec une journée solaire qui dure environ deux fois plus longtemps que son année orbitale.
			</div>
			<div class="button-container">
				<button id="backButton">Retour</button>
			</div>
		</div>
		<script src="affichage.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>
