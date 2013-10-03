<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $test = "dd";
        echo "<h1>Exemple de Query WikiMedi sur en.wikipedia.org </h1>" ;
        echo '<p>auteur : René Pellerin';
        echo '<p> Page interrogé ';
        echo '<a href="http://en.wikipedia.org/wiki/Quebec" > http://en.wikipedia.org/wiki/Quebec </a>';
       
       $urlTest = "http://en.wikipedia.org/w/api.php?format=json&action=query&titles=Quebec&prop=revisions&rvprop=content";
        echo '<p >Query =>  : <pre>' . $urlTest. '</pre>';       
        # $urlTest = "www.google.ca";   
       echo '<pre>';
        $reply = file_get_contents($urlTest);
        echo '================================ Avec <b><big>var_dump ( json_decode (string) )</big></b> ';
        var_dump( json_decode($reply));
        echo '================================ Avec <b><big>print_r  json_decode (string , true)</big></b> ';
        echo '<p>';
        #  var_dump( json_decode($reply,true,200));
        print_r( json_decode($reply,true,200));
        
       echo '</pre>' 
        ?>
    </body> 
</html>
