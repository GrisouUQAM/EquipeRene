<html>
    
    <head>
        <title>Page du Tuto 5-2 de developpez.com tuto PHP</title>
    </head>
    
    <body>
		<h1>Tuto 5</h1>
        <a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=syntaxe">lien du tuto suivi source developpez.com</a>
        <br />

        <?php
        //fonction qui fait le diagnostic
        function parite($nombre){
            //si le reste de la division est zéro, c'est pair
            if (($nombre%2)==0){
                //on initialise les deux valeurs de verdict
                $verdict='pair';
            }
            else{
                $verdict='impair';
            }
            //on renvoie le verdict, tout à la fin
            return $verdict;
        }
        ?>
        <form method="POST" action="tuto5-2.php">
            Entrez votre nombre<input type="text" name="num"/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        //si user a cliqué OK
        if(isset($_POST['valider'])){
            //récupère la valeur entrée
            $nombre=$_POST['num'];
            //place dans $toto la valeur de retour de ma fonction
            $toto=parite($nombre);
            //affiche le verdict entier
            echo 'Ce nombre est '.$toto.'.';
        }
        ?>

        
        

    </body>
</html>

