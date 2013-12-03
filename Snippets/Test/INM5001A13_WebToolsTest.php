<?php

/*
 * Test unitaires 
 * Pour executer en ligne de commande
 * METHODE 1 avec phpunit.phar dans le PATH d'execution
 * $ phpunit.phar testINM5001A13_WebTools.php
 * Le $ est le prompt dans une cosole bash , comme git bash ne pas retapper
 * 
 * METHODE 2
 * pour plus de détails lors des tests faire avec --debug
 * $ phpunit.phar --debug testINM5001A13_WebTools.php
 * 
 * METHODE 3
 * Si vous n'avez pas phpunit.phar dans votre path vous pouvez le mettre
 * A coté des fichiers a tester et faire
 * $ php phpunit.phar --debug testINM5001A13_WebTools.php
 */


/**
 * Description of testINM5001A13_WebTools
 * Test unitaire pour la class 
 * 
 * 
 * Les fonction privés ne seront pas tester car il le sont implicitement avec les
 * fonction public.  
 * @author Rene
 */
require_once 'INM5001A13_WebTools.php';

class testINM5001A13_WebTools extends PHPUnit_Framework_TestCase {

    //put your code here

    function testgetHyperLinks() {
        //Setup  
        $pageTest = new INM5001A13_WebTools("http://localhost/EquipeRene/Snippets/pagePourTestUnitaireWebTool.html");

        $resultat = $pageTest->getHyperLinks();


        $this->assertEquals($resultat["http://google.ca"], 'Search GGxxGLE');
    }
    // test pour  getImageList
    
      function testgetImageList() {
        //Setup  
        $pageTest = new INM5001A13_WebTools("http://localhost/EquipeRene/Snippets/pagePourTestUnitaireWebTool.html");

        $resultat = $pageTest->getImageList();


        $this->assertEquals($resultat["testImage1.png"], 'TestImage1');
    }  
   
    
//  test pour getListOfList
          function testgetListOfList() {
        //Setup  
        $pageTest = new INM5001A13_WebTools("http://localhost/EquipeRene/Snippets/pagePourTestUnitaireWebTool.html");

        $resultat = $pageTest->getListOfList();


        $this->assertEquals($resultat[1][2], 'ITEM 2');
    } 
  //  test pour getListOfTables
    
            function testgetListOfTables() {
        //Setup  
        $pageTest = new INM5001A13_WebTools("http://localhost/EquipeRene/Snippets/pagePourTestUnitaireWebTool.html");

        $resultat = $pageTest->getListOfTables();


        $this->assertEquals($resultat[2][1], 'CELL5CELL6');
    }   

}

?>
