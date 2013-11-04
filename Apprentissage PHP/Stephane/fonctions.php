<?php
	function nbrPremier($nombre) {
		$nombreEntier = round ($nombre);
		$compteurDiviseur = 0;
		
		if ($nombreEntier != $nombre) {
			echo 'Le nombre entré n\'est pas entier';
		} else {
			
			switch ($nombre) {
				case 0:
					//echo '0 n\'est pas un nombre premier';
					break;
				case 1:
					//echo '1 n\'est pas un nombre premier';
					break;
				default:
					for( $i = 2 ; $i <= $nombre ; $i++ ) {
						$reste = $nombre % $i;
						if ($reste == 0) {
							$compteurDiviseur++;
						}
					}
					break;	
			}
			if( $compteurDiviseur == 1) {
				echo $nombre.' est un nombre premier';
			} else {
				echo $nombre.' n\'est pas un nombre premier';
			}
			
			
		}
	
	}
?>