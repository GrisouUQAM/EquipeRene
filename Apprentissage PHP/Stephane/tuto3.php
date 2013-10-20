<html>
<head>
<title> Page du Tuto de developpez.com tuto PHP</title> 
</head>

<body>
	<h1>Tuto 3</h1>
	<a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=formulaires">lien tu tuto 3 developpez.com</a>
	<br />
	
	<form name="inscription" method="post" action="saisie.php">
	        Entrez votre pseudo : <input type="text" name="pseudo"/> <br/>
	        Entrez votre ville : <input type="text" name="ville"/><br/>
	        <input type="submit" name="valider" value="OK"/>
	</form>
	
	<?php
	
		$salaire = 2000;
		$job = 'L\'informatique';
		$option = 'L\'informatique est la branche dans laquelle je travaille';
		$moyenneBac = 11.5;
		
		echo'<p>Le salaire auquel j\'aspire pour bien vivre : <b>'.$salaire.'</b></br>
			La branche dans laquelle je travaille ou souhaiterais travailler : <b>'.$job.'</b></br>
			Pour préciser : <b>'.$option.'</b></br>
			La note moyenne que j\'ai obtenue qu bac : <b>'.$moyenneBac.'</b></p>';
		
	?>
	
</body>



</html>

