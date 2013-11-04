<html>
<head>
<title> Page du TP 5 de developpez.com tuto PHP</title>
</head>

<body>
        <h1>TP 5</h1>
        <a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=formulaires">lien du tuto suivi source developpez.com</a>
        <br />
        
		 <form method="POST" action="tp5.php">
            Entrez votre nombre<input type="text" name="num"/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        
        <?php
        	include('fonctions.php');
        	
			if(isset($_POST['valider'])){
			$num=$_POST['num'];
			nbrPremier($num);
			}
        ?>

        
</body>



</html>