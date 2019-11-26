<?php
    session_start();
    
$connexion = mysqli_connect("localhost", "root", "", "livreor");
$requete = "SELECT*FROM commentaires ORDER by id DESC";
$resultat = mysqli_query($connexion, $requete);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="livreorJulia.css">
        <title>Livre d'or</title>
    </head>
    <body class="bodylivreor">
            <article>
            <h1 class="h1livreor"><i><u>Livre d'or</u></i></h1>
                <?php
                    while($data1 = mysqli_fetch_array($resultat))
                            {
                ?>
                        
                <table class="tablelivreor">
                            
                        <tr>
                            <td id="tdfont1livreor">
                                <?php
                                    $requete = "SELECT login FROM utilisateurs WHERE id = '".$data1['id_utilisateur']."'";
                                    $query = mysqli_query($connexion, $requete);
                                    $data2 = mysqli_fetch_assoc($query);
                                            
                                    echo "Posté le: ", $data1['date'], " par ", $data2['login'], "";
                                ?>
                                
                            </td>
                        </tr>
                            <td class="tdfontlivreor">
                                <?php echo $data1['commentaire']; ?>
                            </td>
                    </table>
                            
                    
            </article>
                        <?php
                            }
                            
                        ?>
    </body>
</html>