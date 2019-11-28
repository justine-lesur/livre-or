<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="livre-or.css">
<title>Inscription</title>
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
	<form class="form" method="post" action="inscription.php">
		<h1 class="inscription">Inscription</h1>
		<input type="text" name="login" class="largeur" id= "largeur1" placeholder="Login"><br/>
		<input type="password" name="password" class="largeur" placeholder="Mot de passe"><br/>
		<input type="password" name="repeatpassword" class="largeur" placeholder="Confirmer le mot de passe"><br/><br/>
		<input type="submit" value="Valider" name="submit" class="validation">
	</form>
	
	<?php
	if(isset($_POST['submit']))
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$repeatpassword = $_POST['repeatpassword'];
		
		if ($login && $password && $repeatpassword)
		{
			if ($password==$repeatpassword)
			{
			  /*mysqli_connect permet de se connecter à MYSQL : cette variable s'appelle $connect*/
			  $connect = mysqli_connect('localhost','root','', 'livreor') or die ('Error');
			
			  /*nouveaulogin permet de voir si $login existe déjà dans ma base de donnée*/
			  $nouveaulogin = "SELECT * FROM utilisateurs WHERE login='".$login."'";
			
			 /*la requête $reg permet de lier $connect et $nouveaulogin*/
			  $reg = mysqli_query($connect, $nouveaulogin);
				
			 /*Voir si $reg existe ou pas : si il existe, il est égal à 1. Si il existe pas, il est égal à 0.
			 cette variable s'appelle $row*/
			  $rows = mysqli_num_rows($reg);
				
				/*Si $reg existe pas*/
				if ($rows==0)
				{
					/*On créé une variable pour insérer tous les champs dans la base de données*/
					$query = "INSERT INTO utilisateurs (login , password) VALUES ('$login','$password')";
					/*j'exécute ma requête et je me connecte*/
					mysqli_query($connect, $query);
					/*Je ferme ma connexion SQL*/
					 mysqli_close($connect);
				 	/*Je me redirige sur ma page connexion*/
					header('location: connexion.php');
					
				} else echo "<p class='paspossible'> Ce pseudo n'est pas disponible</p>";
				
			} else echo '<p class="paspossible"> Les deux password doivent être identiques</p>';
			
		} else echo '<p class="paspossible"> Veuillez saisir tous les champs</p>';
	}
	
?>
</body>
</html>
