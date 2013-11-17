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
        <?php include_once './INM5001A13_WebTools.php'; ?>


        <?php
        $url = ("http://en.wikipedia.org/wiki/Talk:Insect");
        $webtool = new INM5001A13_WebTools($url);
        ?>
 
        <!--                         LIENS DANS LA PAGE                                         -->        
        <h1>Liste des hyperliens pour la page : <?= $url ?>    </h1>

        <?php $resultat = $webtool->getHyperLinks(); ?>
        </br>
        <table border="1">
         <tr>
             <th>Hypertext links href =  </th>
             <th> Text displayed</th>
         </tr>
            <?php foreach ($resultat as $links => $value) { ?>
                <tr>
                    <td> <?= $links ?> </td>
                    <td> <?= $value ?></td>
                </tr>
            <?php } ?>
        </table>    
        <!--                         IMAGES                                         -->
        <br/><br/> <h1>Liste des Images pour la page : <?= $url ?>    </h1>

        <?php $resultat = $webtool->getImageList(); ?>
        </br>
        <table border="1">
          <tr> 
              <th>HyperLink for Image</th>
              <th>Alternate Text</th>
          </tr>
            <?php foreach ($resultat as $links => $value) { ?>

                <tr>
                    <td> <?= $links ?></td>
                    <td> <?= $value ?></td>
                </tr>
            <?php } ?>
        </table>          

        <!--                         LISTS                                         -->
        <br/><br/> <h1>Liste des Listes pour la page : <?= $url ?>    </h1>

        <?php $result = $webtool->getListOfList(); ?>
        </br>
        <table border="1">
            <tr>    <th>List number</th>
                <th>Element number in list</th> 
                 <th> All text in liste element (li) $node->textContent </th>
            </tr>
            <?php foreach ($result as $listNumber => $elements) { ?>
                <?php $flagRowSpan = true; ?> 
                <?php foreach ($elements as $elementNumber => $elementText) { ?>
                    <?php if ($flagRowSpan) { ?> 

                        <tr>
                            <td rowSpan =" <?= count($elements) ?> "> <?= $listNumber ?> </td> 
                             <td> <?= $elementNumber ?> : </td>
                           
                            <td> <?= $elementText ?></td>
                        </tr>

                        <?php
                        $flagRowSpan = false;
                    } else {
                        ?>

                        <tr> 
                            <td> <?= $elementNumber ?> : </td>
                            
                            <td> <?= $elementText ?></td>
                        </tr>

                        <?php
                    }
                }
            }
            ?>
        </table> 


        <!--                         Tables                                         -->
        <br/><br/> <h1>Liste des Tables pour la page : <?= $url ?>    </h1>

        <?php $result = $webtool->getListOfTables(); ?>
        </br><table border="1">
    <tr><th>Table number</th> <th> Row Number</th> <th>All text in row $node->textContent</th> </tr>
            <?php foreach ($result as $tableNumber => $rows) { ?>
                <?php $flagRowSpan = true; ?> 
                <?php foreach ($rows as $rowNumber => $rowText) { ?>
                    <?php if ($flagRowSpan) { ?> 

                        <tr><td rowSpan =" <?= count($rows) ?> ">
                                <?= $tableNumber ?> </td> 
                            <td><?= $rowNumber ?>  </td>
                            <td> <?= $rowText ?></td></tr>

                        <?php
                        $flagRowSpan = false;
                    } else {
                        ?>

                        <tr> <td><?= $rowNumber ?>  </td>
                            <td> <?= $rowText ?></td></tr>

                        <?php
                    }
                }
            }
            ?>
        </table> 

    </body>
</html>
