<?php
		function DerniereMaj(){
		    echo'Dernière parution mise à jour :<br/>
		    PIF GADGET<br/>
		    le 10/01/2009';
		}

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
