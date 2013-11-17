<html>
    <head><title>Tous les nombres premiers</title></head>
    <body>
        <form method="POST" action="tp8.php">
            Prêt pour la liste des nombres premiers =>10000 ? <input type="submit" name="ok" value="OK"/>
        </form>
        <?php
        if (isset ($_POST['ok'])){
            $flag=0;
            $compteur=0;
            //Teste chaque nombre de 2 à 10 000
            for($nombre=2;$nombre<=10000;$nombre++){
                //Divise le par 2 puis 3 puis 4 etc...
                for($i=2;$i<$nombre;$i++){
                    //S'il est multiple
                    //Allume le flag
                    if($nombre%$i==0){
                            $flag=1;
                    }
                }
                //Si le nombre est premier
                //Ecris-le, et incrémente le compteur
                if ($flag==0){
                    echo $nombre.'<br/>';
                    $compteur=$compteur+1;
                }
                //Dans tous les cas
                //Remets le flag à zéro pour la suite
                $flag=0;
            }
            //Quand tout est fini
            //Affiche $compteur
            echo'<h4>Il y a '.$compteur.' nombres premiers de 0 à 10 000.</h4>';
        }
        ?>
    </body>
</html>
