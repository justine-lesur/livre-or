<?php
    session_start();
    
$connexion = mysqli_connect("localhost", "root", "", "livreor");
$requete = "SELECT*FROM commentaires ORDER by id DESC";
$resultat = mysqli_query($connexion, $requete);
if (isset($_SESSION['login']))
			{
			
			} else header('location: connexion.php');

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="livre-or.css">
        <title>Livre d'or</title>
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
    <body class="bodylivreor">
            <article>
            <h1 class="h1livreor"><i><u>Livre d'or</u></i></h1>
                <?php
                             while($data1 = mysqli_fetch_array($resultat))
                            {
                ?>
                        
              
                            
                        <div class="box"> 
                        
                            <span class="l-top"></span>
                            <span class="l-left"></span>
                            <div class="box-inner">
                            <span class="hover-me">Commentaire</span>
                            <span class="hi"></span>
                            <span class="message"></span>
                            </div>
                            <span class="l-right"></span>
                            <span class="l-bottom"></span>
                        </div>
                       
                            <div class="livreor box box-next"> 
                               
                                <?php

                    
                            
                                    $requete = "SELECT login FROM utilisateurs WHERE id = '".$data1['id_utilisateur']."'";
                                    $query = mysqli_query($connexion, $requete);
                                    $data2 = mysqli_fetch_assoc($query);
                                            
                                    echo "Posté le: ", $data1['date'], " par ", $data2['login'], "";
                                ?>
                                <?php echo $data1['commentaire']; ?>
                            </div>
                   
                            
                    
            </article>
                        <?php
                            }
                            
                        ?>
    </body>
</html>