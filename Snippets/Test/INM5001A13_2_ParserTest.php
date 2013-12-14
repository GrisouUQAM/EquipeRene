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
 * 
 * METHODE 4
 * A partir de NetBeans
 * Inclure le path phpunit.bat pour pouvoir effectuer les tests à partir des classes de votre projet
 */

/**
 * Description of INM5001A13_ParserTest
 * Test unitaire pour la classe INM5001A13_Parser
 * 
 * 
 * Les fonction privés ne seront pas tester car il le sont implicitement avec les
 * fonction public.  
 * @author Adriana
 */

class INM5001A13_ParserTest extends PHPUnit_Framework_TestCase {

    /**
     * On inclut la classe à tester dans cette fonction
     */
    protected function setUp() {
        require_once dirname(__FILE__) . '/../INM5001A13_Parser.php';
    }

    public function testParseTextToArray() {
        $retour = INM5001A13_Parser::parseTextToArray("Ceci est un test");
        $this->assertEquals($retour, array("Ceci", "est", "un", "test"));
        $this->assertEquals($retour[2], "un");
    }

    public function testParseHTMLtextToArray() {
        $retour = INM5001A13_Parser::parseTextToArray("Ceci est un test");
        $this->assertEquals($retour[count($retour) - 1], "test");
    }

    public function testExtractTextArrayFromRootDomNode() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }
    
    function testparseHTMLtextToArrayPageCompletMotDansBody() {
        $retour = INM5001A13_Parser::parseHTMLtextToArray("PageTestUnitaireINM5001A13.html");
        $this->assertEquals($retour[1], "Search_GGxxGLE");
        $this->assertEquals($retour[2], "Mon_1er_contenu_DIV");
        $this->assertEquals($retour[3], "TAB1CELL1_1");
        $this->assertEquals($retour[4], "TAB1CELL1_2");
    }

    function testparseHTMLtextToArrayPageCompletMotDansTitle() {
        $retour = INM5001A13_Parser::parseHTMLtextToArray("PageTestUnitaireINM5001A13.html");
        $this->assertEquals($retour[0], "TestUnitaireINM5001A13");
    }

}
