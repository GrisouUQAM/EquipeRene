<html>
<head>
<title> Page du Tuto 3 de developpez.com tuto PHP</title> 
</head>

<body>
	<h1>Tuto 3</h1>
	<a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=formulaires">lien du tuto 3 developpez.com</a>
	<br />
	
	<form name="inscription" method="post" action="tuto3.php">
	        Entrez votre age : <input type="text" name="age"/> <br/>
	        Entrez votre ville : <input type="text" name="ville"/><br/>
	        <input type="submit" name="valider" value="OK"/>
	</form>
	
	<?php
	$age=12; 
	if($age<5){
	    $verdict='Ouh le bébé !';
	}
	elseif($age<13){
	    $verdict='Vous êtes un enfant !';
	}
	elseif($age<18){
	    $verdict='Vous êtes un(e) ado !';
	}
	else{
	    $verdict='Ah ! enfin un(e) adulte !';
	}
	echo $verdict;
	?>

	
</body>



</html>

