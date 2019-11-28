<?php
session_start();
		if($_SESSION['login'])
		 {
			
		 } else header('location: connexion.php');
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
		<form method="post">
			<section class="sectioncommentaire">
				<h1 class="titrecommentaire">Votre commentaire</h1>
					<textarea name="commentaire" class="largeur2" id="description"></textarea><br/><br/>
					<input type="submit" value="valider" class= "validation2" name="submit">
			</section>
		</form>
		<?php
		if(isset($_POST['submit']))
		{
			$id = $_SESSION['id'];
			$commentaire = $_POST['commentaire'];
			$commentaire2 = addslashes($commentaire);
			
			if ($commentaire)
			{
			$connect = mysqli_connect("localhost", "root", "", "livreor");
			$query = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaire2', '$id', NOW())";
			$reg = mysqli_query($connect, $query);
			mysqli_close($connect);
			} else echo "Veuillez saisir un commentaire";
		} 
	
		?>
</body>
</html>