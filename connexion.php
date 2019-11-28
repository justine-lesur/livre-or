<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="livre-or.css">
<title>Connexion</title>
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
	<form class="form" method="post" action="connexion.php">
		<h1 class="inscription">Connexion</h1>
		<input type="text" name="login" class="largeur" id= "largeur1" placeholder="Login">
		<input type="password" name="password" class="largeur" id= "largeur1" placeholder="Mot de passe"><br/><br/>
		<input type="submit" value="valider" name="submit" class="validation">
	</form>
	<?php
if (isset($_POST['submit']))
	{
		$login = $_POST['login'];
		$password = $_POST ['password'];
	
	
		if ($login && $password)
		{
			$connect = mysqli_connect('localhost','root','', 'livreor') or die ('Error');
			$query = "SELECT*FROM utilisateurs WHERE login = '".$login."'";
			$reg = mysqli_query ($connect,$query);
			/*permet de lire/retourner une ligne du tableau, la première par défaut*/
			$rows = mysqli_fetch_assoc($reg);

			if ($login == $rows ['login'])
			{
				if ($password == $rows ['password'])
				{	
					session_start();
					$_SESSION['login']=$login;
					$_SESSION['password']=$password;
					$_SESSION['id']=$rows['id'];
					header('location: index.php');

				} else echo "<p class='paspossible'>mot de passe incorrect</p>";

			} else echo "<p class='paspossible'>Login ou Mot de passe incorrect</p>";

		} else echo "<p class='paspossible'>Veuillez saisir tous les champs</p>";
	}
	?>
</body>
</html>