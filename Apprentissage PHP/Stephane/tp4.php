<html>
	<head>
				
	</head>
	<body>
		
		<h1>Formulaire</h1>
		
		<form name="formulaire" method="post">
			Entrer votre nom : <input type="text" name="nom"/> <br />
			Entrer votre prénom : <input type="text" name="prénom"/> <br />
			Entrer votre age : <input type="text" name="age"/> <br />
			Entrer votre ville : <input type="text" name="ville"/> <br />
			Entrer l'activité : <input type="text" name="activité"/> <br />
			<input type="submit" name="valider" value="Valider" />			
		</form>
		
		<?php
    		 if(isset($_POST['valider'])){
            echo '<h3>Vous venez d\'entrer : </h3>';
            foreach($_POST as $index=>$valeur){
                if ($index!='valider'){
                    echo '- '.$valeur.'<br/>';
                }
            }
        }
		?>
		
		
		
	</body>	
</html>





