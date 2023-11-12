<?php
ob_start();

if (!empty($recetteDetail)) {
    echo '<h1>'.$recetteDetail[0]['REC_TITRE'].'</h1>';
    echo '<p>date de creation : '.$recetteDetail[0]['REC_DATE_CREATION'].'</p>';
    if(!empty($tags))
        echo '<p>Tags : </p>';
    foreach($tags as $tag) {
        echo '<form action="./index.php?action=voir_recettes_par_tag" method="post">';
        echo '<button type="submit" name="tag" value="'.$tag['TAG_ID'].'">'.$tag['TAG_LIBELLE'].'</button>';
        echo '</form>';
    }
    echo '<p>'.$recetteDetail[0]['REC_CONTENU'].'</p>';
    echo '<p>Liste ingredients :</p>';
    if(!empty($ingredients)) {
        echo '<ul>';
        foreach ($ingredients as $ingredient)
            echo '<li><p>'.$ingredient['ING_INTITULE'].'</p></li>';
        echo '</ul>';
    } else
        echo "<p>pas d'ingredients (à faire)</p>";
    
    if($_SESSION['connecter'] == 'oui' && $recetteDetail[0]['REC_STATUS'] == 1) {
        echo '<form method="post" action="./index.php?action=voir_recettes&rec_id='.$recetteDetail[0]['REC_ID'].'">';
?>
    
        <p><label for="commentaire-input">Postez votre commentaire</label></p>
        <textarea rows="4" cols="50" id="commentaire-input" name="texte_commentaire"></textarea>
        <input type="submit" value="Poster">
        </form>
<?php
    }
    echo '<p>Commentaires : </p>';
    if(!empty($commentaires)) {
        echo '<div>';
        foreach ($commentaires as $commentaire){
            echo '<div><p>'.$commentaire['UTI_PSEUDO'];
            if($commentaire['COM_STATUS'] != 1)
                echo ' | en attente de validité';
            echo '</p><p>'.$commentaire['COM_COMMENTAIRE'].'</p></div>';
        }
        echo '</div>';
    } else {
        echo '<p>pas de commentaires</p>';
    }
} else
    echo '<p>Aucune recette trouvée</p>';
?>

<?php
$content = ob_get_clean();
$titre = 'Detail Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
