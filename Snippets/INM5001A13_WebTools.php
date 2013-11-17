<?php

/**
 * Description of INM001A13_WebTools
 *
 * @author Rene
 */
include_once './INM5001A13_Parser.php';

class INM5001A13_WebTools {

    private $url;
    private $dom;

    function __construct($url) {
        $this->url = $url;
        $this->getHtmlSetDom();
    }

    function getHyperLinks() {
        return $this->getHyperLinksByTag("a", "href", "nodeValue");
    }

    function getImageList() {
        return $this->getHyperLinksByTag("img", "src", "alt");
    }

    private function getHyperLinksByTag($tag, $attrib, $alt) {

        //*** CODE si nous aurions voulues seulement certains liens
        //    $xpathQuery =  '//a' ; //Tout les liens hypertexte
        //    $xpath = new DOMXPath($dom);
        //    $xpathQuery = "//*";  // test avec tout
        //   $domAnchers = $xpath->query($xpathQuery);

        $domSelectedTags = $this->dom->getElementsByTagName($tag);

        $listHyperLinks = array();

        foreach ($domSelectedTags as $dnode) {
            if ($dnode->hasAttribute($attrib)) {
                if ($alt == "nodeValue") {
                    $listHyperLinks[$dnode->getAttribute($attrib)] = $dnode->nodeValue;
                } else {

                    $listHyperLinks[$dnode->getAttribute($attrib)] = $dnode->getAttribute($alt);
                }
            }
        }
        return $listHyperLinks;
    }

    private function getHtmlSetDom() {
        $html = file_get_contents($this->url); #get file from web site
        $this->dom = new DOMDocument();
        libxml_use_internal_errors(TRUE);   # protect against malformed web site
        if (!empty($html)) {
            $this->dom->loadHTML($html);  # charger le html dans DOM
            libxml_clear_errors();  # ne pas conserver les erreurs xml
        }
    }

    function getListOfList() {
        $listUlDom = $this->dom->getElementsByTagName("ul");
        $listCounter = 1;
        $arrayOfLists = array();
        // Find all list  UL tags
        foreach ($listUlDom as $oneUl) {
            $listElements = $oneUl->getElementsByTagName("li");

            // ON supposte que les li ne contienne que du texte mais ce n'est peut-être pas le cas
            // Extract all list elements
            $elementCounter = 1;
            $arrayOfElements = array();
            foreach ($listElements as $nodeLi) {
                $arrayOfElements[$elementCounter++] = $nodeLi->textContent;
            }
            $arrayOfLists[$listCounter++] = $arrayOfElements;
        }
        return $arrayOfLists;
    }

    function getListOfTables() {
        $listTablesDom = $this->dom->getElementsByTagName("table");
        $tableCounter = 1;
        $arrayOfTables = array();
        // Find all list  UL tags
        foreach ($listTablesDom as $oneTable) {
            $listRows = $oneTable->getElementsByTagName("tr");

            // ON supposte que les table Data  ne contienne que du texte mais ce n'est peut-être pas le cas
            // Extract all list elements
            $tableRowCounter = 1;
            $arrayOfRows = array();
            foreach ($listRows as $nodeRow) {
                $arrayOfRows[$tableRowCounter++] = $nodeRow->textContent;
            }
            $arrayOfTables[$tableCounter++] = $arrayOfRows;
        }
        return $arrayOfTables;
    }

}

?>
