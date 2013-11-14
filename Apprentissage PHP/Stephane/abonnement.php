<?php
include("fonctions2.php");
?>
<html>
    <head><title>Formulaire d'abonnement</title></head>
    <body>
        <h1>POUR VOUS ABONNER</h1>
        <h2>Veuillez saisir vos données d'identité :</h2>
        <form name="abonnement" method="post" action="abonnement.php">
            Etat civil : <input type="radio" name="civil" value="Madame"/>Madame<input type="radio" name="civil" value="Monsieur"/>Monsieur<br />
            Nom : <input type="text" name="name"/> <br/>
            Prénom : <input type="text" name="firstName"/> <br/>
            Age : <input type="text" name="age"/><br/>
            Adresse : <input type="text" name="adress"/><br />
            Code postal : <input type="text" name="zip"/> <br />
            Ville : <input type="text" name="city"/> <br />
            Numéro de téléphone : <input type="texte" name="phone" maxlength="10"/><br />
            
            Veuillez cocher le magazine choisi :<br />
            <input type="radio" name="mag" value="mainVerte"/>J'ai la main verte<br />
            <input type="radio" name="mag" value="piedMarin"/>J'ai le pied marin<br />
            <input type="radio" name="mag" value="oeilVif"/>J'ai l'oeil vif<br />
            <input type="radio" name="mag" value="rateDilate"/>J'ai la rate qui se dilate<br />
            
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        if (isset ($_POST['valider'])){
        	
            $civil = $_POST['civil'];
            $name = $_POST['name'];
			$firstName = $_POST['firstName'];
			$age = $_POST['age'];
			$adress = $_POST['adress'];
			$zip = $_POST['zip'];
			$city = $_POST['city'];
            $phone = $_POST['phone'];
            $mag = $_POST['mag'];
			
			if ($mag == "mainVerte") {
				$valeurMag = "J'ai la main verte";
			} else if ($mag == "piedMarin") {
				$valeurMag = "J'ai le pied marin";
			} else if ($mag == "oeilVif") {
				$valeurMag = "J'ai l'oeil vif";
			} else if ($mag == "rateDilate") {
				$valeurMag = "J'ai la rate qui se dilate";
			} else {
				echo "ERREUR MAG";
			}

			echo "Pour rappel, vous avez saisi que : <br />";
			echo "VOUS ETES : $civil $name $firstName <br />";
			echo "VOUS AVEZ CHOISI : $valeurMag";
			
			
			connectTest();
			
			$sql = 'INSERT INTO abonnement VALUES("","'.$name.'","'.$firstName.'","'.$mag.'")'; 
 
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

            mysql_close();
			
        }
        ?>
    </body>
</html>
