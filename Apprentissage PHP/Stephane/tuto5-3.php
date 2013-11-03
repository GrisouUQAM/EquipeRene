<html>
    
    <head>
        <title>Page du Tuto 5-3 de developpez.com tuto PHP</title>
    </head>
    
    <body>
		<h1>Tuto 5-3</h1>
        <a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=syntaxe">lien du tuto suivi source developpez.com</a>
        <br />

        <?php
        
        for($i=0;$i<50;$i++){
        echo $i;	
    	echo 'Je ne tricherai plus à un devoir. Limite je meurs de honte là.<br/>';
		}
		
		?>

        <form method="POST" action="tuto5-3.php">
            Entrez votre nombre<input type="text" name="num"/>
            <input type="submit" name="valider" value="OK"/>
        </form>

		<?php
			if(isset($_POST['valider'])){
				$num=$_POST['num'];
				
				switch($num) {
					case '1':
						echo 'vous avez entrer 1';
						break;
					case '2':
						echo 'vous avez entrer 2';
						break;
					case '3':
						echo 'vous avez entrer 3';
						break;
					case '4':
						echo 'vous avez entrer 4';
						break;
					case '5':
						echo 'vous avez entrer 5';
						break;
					default :
						echo 'C\'est un nombre plus grand que 5';
						break;	
					
				}
			}
		?>
		
    </body>
</html>

