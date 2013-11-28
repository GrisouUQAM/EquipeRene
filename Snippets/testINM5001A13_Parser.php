<?php

/*
 * Test unitaires 
 * Pour executer en ligne de commande
 * METHODE 1 avec phpunit.phar dans le PATH d'execution
 * $ phpunit.phar testINM5001A13_Parser.php
 * Le $ est le prompt dans une cosole bash , comme git bash ne pas retapper
 * METHODE 2
 * pour plus de détails lors des tests faire avec --debug
 * $ phpunit.phar --debug testINM5001A13_Parser.php
 * 
 * METHODE 3
 * Si vous n'avez pas phpunit.phar dans votre path vous pouvez le mettre
 * A coté des fichiers a tester et faire
 * $ php phpunit.phar --debug testINM5001A13_Parser.php
 */


/**
 * Description of testINM5001A13_Parser
 * Test unitaire pour la class 
 * 
 * La fonction extractTextArrayFromRootDomNode , devra être privé
 * Les fonction privés ne seront pas tester car il le sont implicitement avec les
 * fonction public.  
 * @author Rene
 */
require_once 'INM5001A13_Parser.php';

class testINM5001A13_Parser extends PHPUnit_Framework_TestCase {

    function testparseHTMLtextToArrayFirstWord() {
        $retour = INM5001A13_Parser::parseTextToArray("The quick brown");

        $this->assertEquals($retour[0], "The");
    }

    function testparseHTMLtextToArrayLastWord() {
        $retour = INM5001A13_Parser::parseTextToArray("The quick yes brown");

        $this->assertEquals($retour[count($retour) - 1], "brown");
    }

    function testparseHTMLtextToArrayPageCompletMotDansBody() {
        $retour = INM5001A13_Parser::parseHTMLtextToArray("pagePourTestUnitaire.html");
        $this->assertEquals($retour[4], "Mot_4_body_3");
    }

    function testparseHTMLtextToArrayPageCompletMotDansTitle() {
        $retour = INM5001A13_Parser::parseHTMLtextToArray("pagePourTestUnitaire.html");
        $this->assertEquals($retour[0], "Mot_0");
    }

    function testparseHTMLtextToArrayWithFiltertMotDansBodyTAG() {
        $vecteurDeTag = array("body");
        $retour = INM5001A13_Parser::parseHTMLtextToArrayWithFilter("pagePourTestUnitaire.html", $vecteurDeTag);
        $this->assertEquals($retour[0], "Mot_1_body_0");
        $this->assertEquals($retour[1], "Mot_2_body_1_div_0");
    }
    
    
    
}

?>
