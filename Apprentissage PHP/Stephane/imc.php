<html>
<head>
<title> Page du TP3 de developpez.com tuto PHP</title> 
</head>

<body>
	<h1>Page du TP3 developpez.com</h1>
	
	<form name="imc" method="post" action="imc.php">
		<fieldset>
			<legend>Formulaire de calcul d'IMC</legend>
			Entrer votre prénom : <input type="text" name="firstName"/> <br />
			Entrer votre taille (sous la forme 1.70) : <input type="text" name="height"/> <br />
			Entrer votre poids (en kilos) : <input type="text" name="weight"/> <br />
			<input type="submit" value="OK"/>
		</fieldset>
	</form>
	
	<?php
		$firstName = $_POST['firstName'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$imc = $weight/($height*$height);
		
		if ($imc < 3) {
			$corpulence = 'de maigreur extrème';
		} elseif ($imc < 18.5) {
			$corpulence = 'Sous la normale';
		} elseif ($imc < 24.9) {
			$corpulence = 'Normale';
		} elseif ($imc < 30) {
			$corpulence = 'Surpoid';
		} elseif ($imc < 39.9) {
			$corpulence = 'Obèse';
		} elseif ($imc > 40) {
			$corpulence = 'Obèse morbide';
		} else {
			$corpulence = 'erreur';
		}
		
		
		echo'Bonjour '.$firstName.'</br>
		Votre IMC (indice de masse corporelle) est : '.$imc.'</br>
		Vous avez une corpulence '.$corpulence;
		
	?>
	
</body>



</html>