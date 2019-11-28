<?php
session_start();

$connexion = mysqli_connect("localhost","root", "","livreor");
$requete= "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
$query= mysqli_query($connexion, $requete);
$data = mysqli_fetch_assoc($query);

if (isset($_SESSION['login']))
			{
			
			} else header('location: connexion.php');
?>

<html>
    <head>
    <meta charset="utf-8">
        <title>Page de profil</title>
        <link rel="stylesheet" href="livre-or.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
    </head>
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
    <body class="bodyprofillivreor">
        <section>
                <h1 class="h1profil ">Profil</h1>
                <div class="main">
                    <form class="formprofil" method="post" >
                        
                    <div class="alert alert-error"></div>
                    <div class="wrapper">
                    <h2 class="h2profil">Modifier son profil</h2>
                      <div class="marginformprofil">
                        <input class="input" class="inputprofil" type="text" name="login" placeholder="login" value="<?php echo $data['login']; ?>"  required>
                        <span class="underline"></span>
                        
                        <br/>
                        <br/>
                        <br/>
                        
                        <input class="input" class="inputprofil"  type="password" name="password" placeholder="password" value="<?php echo $data['password']; ?>" required>
                        <span class="underline"></span>
                        <br/>
                        <br/>
                        <br/>
                        <input class="button"  id="der" name="submit" type="submit" value="Valider">
                      </div>

                    </div>
                        
                      
                    </form>
                </div>
 
                    <?php
                

                     if (isset($_POST['submit']))
                    {
                        $pass = $_POST['password'];
                        $login = $_POST['login'];
                     //requete update sql
                    $sql = "UPDATE utilisateurs SET  login = '$login', password = '$pass' WHERE login = '".$_SESSION['login']."'";
                     mysqli_query($connexion, $sql);
                     $_SESSION['login'] = $login;
                     header("Refresh:0");
                     
                    }
                    ?>
        
        </section>
    </body>
</html>
     }



   