<html>
    <head><title>Mon agenda</title></head>
    <body>
    	
    	<h1>Tuto 4-2</h1>
        <a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=tableaux">lien du tuto suivi source developpez.com</a>
        <br />
        
        <?php
        $adresse0 = array(); 
        //on le remplit
        $adresse0 ['nom']='ZERO';
        $adresse0 ['prenom']='Toto';
        $adresse0 ['num'] = 10; 
        $adresse0 ['rue']  = 'rue des rosiers'; 
        $adresse0 ['cp']  = 94000;
        $adresse0 ['ville'] = 'IVRY-SUR-SEINE';
 
        $adresse1 = array(); 
        //on le remplit
        $adresse1 ['nom']='AIN';
        $adresse1 ['prenom']='Anne';
        $adresse1 ['num'] = 11; 
        $adresse1 ['rue']  = 'rue des moineaux'; 
        $adresse1 ['cp']  = 57000;
        $adresse1 ['ville'] = 'METZ';
 
        $adresse2 = array(); 
        //on le remplit
        $adresse2 ['nom']='DEUX';
        $adresse2 ['prenom']='Al';
        $adresse2 ['num'] = 2; 
        $adresse2 ['rue']  = 'rue des arbres'; 
        $adresse2 ['cp']  = 88000;
        $adresse2 ['ville'] = 'EPINAL';
 
        $adresse3 = array(); 
        //on le remplit
        $adresse3 ['nom']='TROIS';
        $adresse3 ['prenom']='Léa';
        $adresse3 ['num'] = 3; 
        $adresse3 ['rue']  = 'rue des éléphants'; 
        $adresse3 ['cp']  = 69000;
        $adresse3 ['ville'] = 'LYON';
 
        $adresse4 = array(); 
        //on le remplit
        $adresse4 ['nom']='DUPONT';
        $adresse4 ['prenom']='Mick';
        $adresse4 ['num'] = 4; 
        $adresse4 ['rue']  = 'rue des églantines'; 
        $adresse4 ['cp']  = 93000;
        $adresse4 ['ville'] = 'SAINT-DENIS';
 
        //on déclare et remplit l'agenda avec toutes les adresses précédentes :
        $agenda=array($adresse0,$adresse1,$adresse2,$adresse3,$adresse4);
		
		
		
		//pour chaque élément de $agenda crée la variable $adresse
foreach($agenda as $adresse){
    //pour chaque élément de $adresse crée la variable $element
    foreach($adresse as $element){
    //écris le $element sur la même ligne avec un tiret et des espaces
        echo '- '.$element.'  ';
    }
    //A chaque nouveau $adresse, saute une ligne
    echo'<br/>';
}



        ?>
    </body>
</html>
