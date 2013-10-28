<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function parseToArray($xpath, $class) {
            #http://stackoverflow.com/questions/18349130/how-parse-html-in-php
            if ($class == '*tout') {
                $xpathquery = "//*"; //span[@class='".$class."']";
            } else {
                //  $xpathquery = "//div[@class='" . $class . "']";
                $xpathquery = "//dl[@class='" . $class . "']";
            }

            var_dump($xpathquery);
            echo 'parseToArray  $spathquery value ->' . $xpathquery;
            $elements = $xpath->query($xpathquery);
            echo "var dump d'un query *&*&*&*&*&*&*&*&*&*<br\>";
            var_dump($elements);
            $count = 1;
            if (!is_null($elements)) {
                $resultarray = array();
                foreach ($elements as $element) {
                    // echo $element->nodeValue . " )) elm <br/>";
                    $nodes = $element->childNodes;
                    foreach ($nodes as $node) {
                        //   if ($node->nodeType == XML_TEXT_NODE){

                        $numberOfChildren = 0;
                        if ($node->hasChildNodes()) {
                            $numberOfChildren = $node->childNodes->length;
                        }
                        $key = $count++ . ':' . $node->nodeType . ':' . $node->nodeName . ':' . $numberOfChildren;
                        $attribs = $node->attributes;
                        if ($attribs) {
                            foreach ($attribs as $valueAt) {
                                $key .= "[" . $valueAt->nodeName . "=" . $valueAt->nodeValue;
                            }
                        }
                        $resultarray[$key] = $node->nodeValue;
                        //   }
                        //     echo $node->nodeValue . " )) nd <br/>";
                    }
                }
                echo '<br/>End of loading array <br/>';
                return $resultarray;
            }
        }

        function prettyPrintDomNodeList($node) {
            echo "<br/><table border = '1'> ";
            $AllWords = array();
            $AllWords =  subPrettyPrintDomNodeList($node);
            echo "<table/>";
            echo '<h2>Liste complette des mots</h2>';
            var_dump($AllWords);
            //PREG page 112 
        }

        /* XML_Node TYPE
          1 élément XML_ELEMENT_NODE
          2 attribut XML_ATTRIBUTE_NODE
          3 noeud de texte XML_TEXT_NODE
          4 section CDATA XML_CDATA_SECTION_NODE
          5 référence d’entité externe XML_ENTITY_REF_NODE
          6 entité XML_ENTITY_NODE
          7 instruction de traitement XML_PI_NODE
          8 commentaire XML_COMMENT_NODE
          9 document XML_DOCUMENT_NODE
         */

        function subPrettyPrintDomNodeList(DOMNode $root) {
            $AllWordsOfThisNodeAndChildren = array();
            if ($root->hasChildNodes())
                echo '<tr>';
            echo '<td><pre>';
            if ($root->nodeType == XML_ELEMENT_NODE) {
                echo 'tagName:<b>' . $root->tagName . "</b>";
                if ($root->attributes->length > 0)
                    echo '<br/>Attributes: ';
                foreach ($root->attributes as $attrName => $attrNode) {
                    echo $attrName . "=" . $attrNode->nodeValue . " ";
                }
            } else {
                //
                echo 'NodeType:' . $root->nodeType . '<br/>NodeName:' . $root->nodeName;
            }

            if ($root->hasChildNodes()) {
                echo '<br/>numOfChilds(' . $root->childNodes->length . ')';
            }
            echo '</pre></td>';
            if ($root->hasChildNodes()) {
                echo '<tr/>';


                foreach ($root->childNodes as $element) {
                    $lastResult = subPrettyPrintDomNodeList($element);
                    $AllWordsOfThisNodeAndChildren =
                            array_merge($AllWordsOfThisNodeAndChildren
                                                            , $lastResult);

                    //         return $result;
                }
            } else {
                if (trim($root->textContent) <> "") {


                    echo '<td><pre>';
                    echo 'NodeValue: ' . $root->nodeValue;
                    echo '<br/>TextContent: ' . $root->textContent;

                    $thisNodeWords = array();
                    //ATTENTION preg_match_all retourne un arrays de arrays
                    preg_match_all('/(\S+)/', $root->textContent, $thisNodeWords, PREG_PATTERN_ORDER);
                    // this node does not have children so ....
                    reset($thisNodeWords); // mettre pointeur au début
                    // $thisNodeWords[0] qui ne marche pas en copie
                    $AllWordsOfThisNodeAndChildren = current($thisNodeWords);  // $thisNodeWords[0] qui ne marche pas en copie
                    //TODO replace In Preg_Match_all  ThisNodeWords with $allWords...
                    //
                    //
               

                    var_dump($thisNodeWords[0]);  // vecteur des mots du node

                    echo '</pre></td>';
                }
                echo '<tr/>';
                //    return $nodeWords[0];
            }
            
              
               return $AllWordsOfThisNodeAndChildren;
            
        }

        /* xiToXpath($sxi, $key = null, &$tmp = null)
         * input: $sxi est un iterator : SimpleXmlIterator
         */

        function sxiToXpath($sxi, $key = null, &$tmp = null) {
            $testCompte = 0;
            $keys_arr = array();
            //get the keys count array
            for ($sxi->rewind(); $sxi->valid(); $sxi->next()) {
                $testCompte++;


                $sk = $sxi->key();
                if (array_key_exists($sk, $keys_arr)) {
                    $keys_arr[$sk]+=1;
                    $keys_arr[$sk] = $keys_arr[$sk];
                } else {
                    $keys_arr[$sk] = 1;
                }
            }
            //create the xpath 
            for ($sxi->rewind(); $sxi->valid(); $sxi->next()) {
                $sk = $sxi->key();
                if (!isset($$sk)) {
                    $$sk = 1;
                }
                if ($keys_arr[$sk] >= 1) {
                    $spk = $sk . '[' . $$sk . ']';
                    $keys_arr[$sk] = $keys_arr[$sk] - 1;
                    $$sk++;
                } else {
                    $spk = $sk;
                }
                $kp = $key ? $key . '/' . $spk : '/' . $sxi->getName() . '/' . $spk;
                if ($sxi->hasChildren()) {
                    sxiToXpath($sxi->getChildren(), $kp, $tmp);
                } else {
                    $tmp[$kp] = strval($sxi->current());
                }
                $at = $sxi->current()->attributes();
                if ($at) {
                    $tmp_kp = $kp;
                    foreach ($at as $k => $v) {
                        $kp .= '/@' . $k;
                        $tmp[$kp] = $v;
                        $kp = $tmp_kp;
                    }
                }
            }
            return $tmp;
        }

        function xmlToXpath($xml) {
            //http://php.net/manual/en/class.simplexmliterator.php

            $sxi = new SimpleXmlIterator($xml);
            return sxiToXpath($sxi);
        }

#,,,,,,,,,,,,,,,,,,,,,,,,DEBUT,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
        require 'simple_html_dom.php';

        echo "<h1>Exemple de DOM 2 sur .... </h1>";
        echo '<p>auteur : René Pellerin';
        echo '<p> Page interrogé ';

        $src = "http://www.google.ca/";
        $src = "http://www.uqam.ca";
       $src = "http://localhost";
 //   $src = "http://fr.wikipedia.org/wiki/Quebec";
        echo '<h1><a href=" ' . $src . '" > ' . $src . '</a></h1>';
 #test

        #         $html = file_get_html($src);
#        foreach($html->find ('title') as $i){
#                    echo '-------------------------------<br/>';
##                     echo '<pre>';
#                     echo  $i . '<br/>';
#                     echo '<pre/><br/>';
#                    #echo $src . $i->src . '<br/>';
#                    # echo '<img src='. $src . $i->src. '></img>';
#        }

        $html = file_get_contents($src); #Chercher document du site WEB
        $dom = new DOMDocument();  # créer un obget Document Object Model

        libxml_use_internal_errors(TRUE);   # se parer contre des site web mal formé
        if (!empty($html)) {
            $dom->loadHTML($html);  # charger le html dans DOM
            libxml_clear_errors();  # ne pas conserver les erreurs xml
            echo '<h2>Pretty Print dom  </h2></br>';
            prettyPrintDomNodeList($dom->documentElement);
            echo'</br>';

            $xpath = new DOMXPath($dom); # mettre le DOM en Xpath
# Test avec tout
            echo '<br/>---Test ParseToArray avec *tout     <br/>';

            $class = "*tout"; # modifier class pour *tout donne tout
            $array = parseToArray($xpath, $class);
            //  var_dump($array);
            echo'end var dump --------------------------------------------';
            echo "<table border = '1'>";
            foreach ($array as $k => $elm) {
                echo "<tr><td>";
                echo $k . '</td><td><pre>';
                echo $elm . '</pre></td></tr>';
            }
            echo '</table>';
            echo '<br/>---------------------------end var_dump Array<br/>';
            $xpath = new DOMXPath($dom); # mettre le DOM en Xpath
            $class = "content"; # modifier class pour *tout donne tout
            echo '<br/>-----------Test avec dumpToArray avec ' + $class + '<br/>';
            echo '<br/>---Test ParseToArray avec ' . $class . '     <br/>';
            $array = parseToArray($xpath, $class);
            var_dump($array);

            echo '<br/>---------------------------end var_dump Array<br/>';
            $qu = '/html/body[1]/div[1]/div[1]/div[2]/span[1]';
            echo '<br/>--xQuery >  ' . $qu . '<br/>';
            $q = $xpath->query($qu);
            if (!is_null($q)) {
                var_dump($q);
                foreach ($q as $qq) {
                    var_dump($qq);
                    $n = $qq->childNodes;
                    foreach ($n as $nn) {
                        echo '<br/>-->Value       >' . $nn->nodeValue . '<br/>';
                        echo '<br/>--->name       >' . $nn->nodeName . '<br/>';
                        echo '<br/>--->Type       >' . $nn->nodeType . '<br/>';
                        echo '<br/>---Text conent >' . $nn->textContent . '<br/>';
                    }
                }
            } else {
                echo '<br/>  Xpath ' . $qu . ' non trouver  <br/>';
            }
        }
        echo "<br/ >========XML saveXML=========== <br/>";
        echo " Test avec xmlToXpath  et sxiToXpath <br/>";
        $xml = $dom->saveXML();
        var_dump($xml);

        $rs = xmlToXpath($xml);
        //  print_r($rs);
        var_dump($rs);
        echo "<br/ >=======Element by alement============= <br/>";
        echo " Looping dans le retour de xmlToXpath  <br/>";
        foreach ($rs as $r)
            echo '<br/>';
        print_r($r);
        echo '<br/>';
        ?>


    </body>
</html>
