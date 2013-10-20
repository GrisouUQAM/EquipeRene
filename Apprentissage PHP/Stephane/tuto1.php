<html>
    <head>
        <title>Ma page d'accueil </title>
    </head>
    <body>
        <h1>Bienvenue sur le site de toto </h1>
        <p> Toto fait de l'anglais :</p>
        <?php
        echo '<p>Hello ! What is the day today ? It is '.date("l").' !</p>';
        ?>
		<?php
$nom='Mickaël';
$age=17;
$gars=false;
$taille=1.75;
?>

<?php
echo'<p>Bonjour à tous.<br/>
Mon vrai nom n\'est pas Toto.<br/>
Mon vrai nom est '.$nom.'<br/>
J\'ai '.$age.' ans et je mesure '.$taille.'m.<br/>
Et comme mon nom l\'indique, je suis ';
if ($gars==true){
    echo 'un garçon.</p>';
}
else{
    echo 'une fille. </p>';
}
?>

    </body>
</html>
