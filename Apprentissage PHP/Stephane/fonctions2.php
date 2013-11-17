<?php
function connectMaBase(){
    $base = mysql_connect ('localhost', 'admin', '');  
    mysql_select_db ('test', $base) ;
}

function connectTest(){
	$base = mysql_connect ('localhost', 'admin', '');  
    mysql_select_db ('test', $base) ;
	
}
?>
