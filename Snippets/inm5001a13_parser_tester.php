<!--
* Author : René Pellerin  UQAM INM 5001 aut 2013
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './INM5001A13_Parser.php';
        
        echo '</h2>Example use of <b> INM5001A13_Parser::parseTextToArray($testString); </b></h2>';
        $testString = "The quick brown fox jumped over the lazy old dog 1234567890.";
        echo '</b>Test string : <h3>';
        echo  $testString . ' <br/></h3>';
        $parsedArray = array();
        $parsedArray = INM5001A13_Parser::parseTextToArray($testString);
        
        echo '<h3>Vector output with <h2>var_dump</h2> </h3><br/>';
        echo "<table border = '1' <tr><td>";
        var_dump($parsedArray);
        echo "</td></tr></table>";
        echo '<br/> with : <h3>print_r</h3></br>';
        print_r($parsedArray);
        
       
        $url = "http://localhost";
        $url = "http://www.uqam.ca";
        $url = "http://fr.wikipedia.org/wiki/Quebec";
        $url = "http://en.wikipedia.org/wiki/Talk:Mental_disorder";
         echo '<h1>  Test parse of HTML web page : </h1>';
         echo '<a href=' . $url .  '>'.$url.'</a></br>';
         $textHTML = INM5001A13_Parser::parseHTMLtextToArray($url);
         
        var_dump($textHTML);
        echo "<h1>Word List</h1><table border = '1'>";
        foreach ( $textHTML as $word){
            echo '<tr><td>'.$word . '</td></tr>';
        }
        echo '</table>'
        ?>
    </body>
</html>
