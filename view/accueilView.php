<?php ob_start(); ?>


<h2>Les dernière recettes</h2>
<?php
	if (!empty($recettes)) {
        echo '<ul id="list-recette">';
        for($i = 0; $i < 10; $i++) {
            if($i < count($recettes)) {
                echo '<li><h2><a href="./index.php?action=voir_recettes&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
                echo '<p>'.$recettes[$i]['CAT_INTITULE'].'</p>';
                echo '<p>'.$recettes[$i]['REC_RESUME'].'</p></li>';
                $j = 0;
                while(count($tags) > $j) {
                    if($recettes[$i]['REC_ID'] == $tags[$j]['REC_ID']) {
                        echo '<form action="./index.php?action=voir_recettes_par_tag" method="post">';
                        echo '<button type="submit" name="tag" value="'.$tags[$j]['TAG_ID'].'">'.$tags[$j]['TAG_LIBELLE'].'</button>';
                        echo '</form>';
                    }
                    $j++;
                }
                echo '</br></br>';
            }
        }
        echo '</ul>';
    } else
        echo '<p>Aucune recette trouvée</p>';
?>

<p><?= $edito[0]['EDI_CONTENU'] ?><p>

<?php
$content = ob_get_clean();
$titre = 'Accueil';
require $GLOBALS['root'] . 'view/template.php';
?>