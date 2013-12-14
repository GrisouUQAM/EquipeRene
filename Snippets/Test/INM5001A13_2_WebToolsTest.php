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
 * Description of INM5001A13_WebTools
 * Test unitaire pour la classe INM5001A13_WebTools
 * 
 * 
 * Les fonction privés ne seront pas tester car il le sont implicitement avec les
 * fonction public.  
 * @author Adriana
 */

class INM5001A13_WebToolsTest extends PHPUnit_Framework_TestCase {

    /**
     * On inclut la classe à tester dans cette fonction
     */
    protected function setUp() {
        require_once dirname(__FILE__) . '/../INM5001A13_WebTools.php';
    }

    public function testGetHyperLinks() {
        $pageTest = new INM5001A13_WebTools("PageTestUnitaireINM5001A13.html");
        $resultat = $pageTest->getHyperLinks();
        $this->assertEquals($resultat["http://www.amazon.ca"], 'Achat_en_ligne');
        $this->assertEquals($resultat["http://fr.wikipedia.org"], "Wikipedia,l'encyclopedie_libre");
    }

    public function testGetImageList() {
        $pageTest = new INM5001A13_WebTools("PageTestUnitaireINM5001A13.html");
        $resultat = $pageTest->getImageList();
        $this->assertEquals($resultat["testImage2.png"], 'TestImage2');
    }

    public function testGetListOfList() {
        $pageTest = new INM5001A13_WebTools("PageTestUnitaireINM5001A13.html");
        $resultat = $pageTest->getListOfList();
        $this->assertEquals($resultat[2][2], 'ITEM 7');
    }

    public function testGetListOfTables() {
        $pageTest = new INM5001A13_WebTools("PageTestUnitaireINM5001A13.html");
        $resultat = $pageTest->getListOfTables();
        $this->assertEquals('CELL5CELL6',$resultat[2][1]);
    }

}
