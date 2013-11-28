<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of INM5001A13_Parser
 *
 * @author Rene
 */
class INM5001A13_Parser {

    /**
     * Function parseTextToArray
     * @param string $textToParse a text string to parse into words. Seperator is any space or newline chracters
     * @return array() a zero base array of seprated words
     */
    public static function parseTextToArray($textToParse) {
        $allPregMatch;
        //ATTENTION preg_match_retruns an array of arrays must clean up
        preg_match_all('/(\S+)/', $textToParse, $allPregMatch, PREG_PATTERN_ORDER);
        reset($allPregMatch); // point to first array
        $cleanStirng = current($allPregMatch);  // $thisNodeWords[0] qui ne marche pas en copie
        return $cleanStirng;
    }

    /**
     * Function parseHTMLtextToArray
     * @param string $url compleat url of web page to parse
     * @return array() A zero base array of seperated words of web page
     * Attention : this version returns all nodeText for now
     * Future developpement is needed to select specific html nodes and tags
     */
    public static function parseHTMLtextToArray($url) {

        $html = file_get_contents($url); #get file from web site
        $dom = new DOMDocument();  
        
        libxml_use_internal_errors(TRUE);   # protect against malformed web site
        if (!empty($html)) {
            $dom->loadHTML($html);  # charger le html dans DOM
            libxml_clear_errors();  # ne pas conserver les erreurs xml
        }
        return INM5001A13_Parser::extractTextArrayFromRootDomNode($dom->documentElement);
    }      
    
    
    public static function parseHTMLtextToArrayWithFilter($url,$tagArray) {
        $xpathQuery =  '//' . $tagArray[0] ;
   
        for ($i = 1 ; $i < sizeof($tagArray); $i++){
            $xpathQuery .= '|//' . $tagArray[$i]   ;
            
        }
       
        echo ' QUERY :' . $xpathQuery . ' </br>';
        
        $html = file_get_contents($url); #get file from web site
        $dom = new DOMDocument();  
        
        libxml_use_internal_errors(TRUE);   # protect against malformed web site
        if (!empty($html)) {
            $dom->loadHTML($html);  # charger le html dans DOM
            libxml_clear_errors();  # ne pas conserver les erreurs xml
        }
        $xpath = new DOMXPath($dom);
       // $xpathQuery = "//*";  // test avec tout
        
        $domPartiel = $xpath->query($xpathQuery);
        $textFromAllNodes = array();
        foreach ($domPartiel as $node){
            
            $textFromAllNodes = array_merge( $textFromAllNodes , INM5001A13_Parser::extractTextArrayFromRootDomNode($node));
            
        }
            
          //test return first  
         return $textFromAllNodes;
    }
    
    
   private static function extractTextArrayFromRootDomNode(DOMNode $node) {
        // Construct array node by node
        $AllWordsOfThisNodeAndHisChildren = array();

        // Only node with no child has text    
        if ($node->hasChildNodes()) {
            foreach ($node->childNodes as $childNode) {
                // Construct text from all children nodes
                $AllWordsOfThisNodeAndHisChildren =
                        array_merge($AllWordsOfThisNodeAndHisChildren
                        , INM5001A13_Parser::extractTextArrayFromRootDomNode($childNode));
            }
        } else {
            // no children get text into array
            if (trim($node->textContent) <> "") {  // not empty
                $text = $node->textContent;
                $AllWordsOfThisNodeAndHisChildren =
                        INM5001A13_Parser::parseTextToArray($text);
            }
        }
        
        return $AllWordsOfThisNodeAndHisChildren;
    }

}

?>
