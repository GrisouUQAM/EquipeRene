
<!DOCTYPE html>
<html>
    <?php include_once './INM5001A13_Parser.php'; ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        You requested :        
        <?php
        echo $_GET['xurl'];
        ?>
        <br/>
        <?php
        if (array_key_exists('tagName', $_GET) && $_GET['tagName'] != '' ) {
            //test  $tagArray = array ('body','div','span');

            $gotTags = $_GET['tagName'];

            $tagArray = INM5001A13_Parser::parseTextToArray($gotTags);
            $textHTML = INM5001A13_Parser::parseHTMLtextToArrayWithFilter($_GET['xurl'], $tagArray);
         //   print_r($textHTML);
        } else {
            $textHTML = INM5001A13_Parser::parseHTMLtextToArray($_GET['xurl']);
        }
        ?>
        <h1>Word List</h1><table border = '1'>  
        <?php foreach ($textHTML as $word) { ?>
                <tr><td> <?php echo $word; ?> </td></tr>
        <?php }
        ?>
        </table>  
    </body>
</html>
