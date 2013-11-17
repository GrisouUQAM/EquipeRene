<?php
include("fonctions2.php");
?>
<html>
    <head><title>TOUTES LES INFOS SUR LES INSCRITS DU SITE</title></head>
    <body>
        <?php
        //On se connecte
        connectMaBase();
 
        // On prépare la requête 
        $sql = 'SELECT * FROM utilisateurs WHERE sexe="F"';  
 
        // On lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas (or die)  
        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
        //on organise $req en tableau associatif  $data['champ']
        //en scannant chaque enregistrement récupéré
        //on en profite pour gérer l'affichage
 
        //titre de la page avant la boucle
        echo'<h2>TOUTES LES FILLES INSCRITES :</h2>';
 
        //boucle
        while ($data == mysql_fetch_array($req)) { 
            // on affiche les résultats 
            echo 'Pseudo : <strong>'.$data['Pseudo'].'</strong><br />'; 
            echo 'Son âge : '.$data['Age'].'<br />';  
            echo 'Sa date d\'inscription : '.$data['DateInscription'].'<br /><br/>';
        }  
        //On libère la mémoire mobilisée pour cette requête dans sql
        //$data de PHP lui est toujours accessible !
        mysql_free_result ($req);  
 
        //On ferme sql
        mysql_close ();  
        ?>
    </body>
</html>
