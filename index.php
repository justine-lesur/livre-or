<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="livre-or.css">
<title>Document sans titre</title>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li ><a href="index.php">Accueil</a></li>
         		<li ><a href="inscription.php">Inscription</a></li>
				<?php
				if(isset($_SESSION['login']))
				{
				echo "<li ><a href='deconnexion.php'>Déconnexion</a></li>";
				
				} else echo "<li ><a href='connexion.php'>Connexion</a></li>";
				?>
         		<li ><a href="profil.php">Profil</a></li>
         		<li ><a href="livre-or.php">Livre d'or</a></li>
				<li ><a href="commentaire.php">Commentaires</a></li>
			</ul>
		</nav>
	</header>
	<section class="textwelcome">
		<h1 class="welcome">Welcome.</h1>
		<p class = "textpresentation"> Bienvenue sur Welcome, un site qui te fera voyager ! <br/>
				Ici, tu pourras venir nous faire partager ton expérience en tant que globe-trotter,<br/>
				entre les lieux que tu recommandes de visiter, tes meilleurs souvenirs de voyage,<br/> ainsi que des conseils pratiques pour ceux qui souhaiteraient te suivre !
				<br/>Alors n'attends-plus, et accède à notre livre d'or !"</p>
	</section>
</body>
</html>