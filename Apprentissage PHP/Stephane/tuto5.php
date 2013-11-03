<html>
    
    <head>
        <title>Page du Tuto 5 de developpez.com tuto PHP</title>
    </head>
    
    <body>
		<h1>Tuto 5</h1>
        <a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=syntaxe">lien du tuto suivi source developpez.com</a>
        <br />

     <?php
        //Cette fonction colore en rouge les notes<10
        //et en vert les notes >=15
        function colore($nombre){
            if($nombre<10){
                echo'<font color="red">'.$nombre.'</font>';
            }
            elseif($nombre>=15){
                echo'<font color="green">'.$nombre.'</font>';
            }
            //cas par défaut(affiche sans modifier couleur)
            else{
                echo $nombre;
            }
        }
 
        //Construisons notre tableau de notes :
        $notes=array(2,5,7,10,11,13,15,17,18);
 
        //La boucle foreach scanne le tableau
        //en appliquant la fonction colore
        echo 'Vos notes du trimestre :<br/>';
        foreach($notes as $note){
            echo '- ';
            colore($note);
            echo '<br/>';
        }
 		
 		
 		// autre partie du tuto
 		function MoyenneAnnuelle($moyTrim1, $moyTrim2, $moyTrim3) {
 			$moyAnnu = ($moyTrim1 + $moyTrim2 + $moyTrim3)/3;
 			echo 'Votre moyenne annuelle est : '.$moyAnnu;
 		}
 		
 		MoyenneAnnuelle (14,13,15);
 		echo '<br/>';
 		
 		$tabNote = [8,10,15];
 		
 		foreach($tabNote as $num){
 			echo '/';
 			echo $num;
 		}		
        
        include('tuto5-fonctions.php');
        
        echo '<br/>';
        DerniereMaj();
     ?>

        
        

    </body>
</html>

