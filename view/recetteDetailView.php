<?php
ob_start();

if (!empty($recetteDetail)) {
    foreach ($recetteDetail as $recette) {
        echo '<h1>'.$recette['REC_TITRE'].'</h1>';
        echo '<p>date de creation : '.$recette['REC_DATE_CREATION'].'</p>';
        echo '<p>'.$recette['REC_CONTENU'].'</p>';
    }
    echo '<p>Liste ingredients :</p>';
    if(!empty($ingredients)) {
        echo '<ul>';
        foreach ($ingredients as $ingredient)
            echo '<li><p>'.$ingredient['ING_INTITULE'].'</p></li>';
        echo '</ul>';
    } else
        echo "<p>pas d'ingredients (à faire)</p>";
    
    if($_SESSION['connecter'] == 'oui') {
        echo '<form method="post" class="h-screen flex items-center" action="./index.php?action=voir_recettes&rec_id='.$recette['REC_ID'].'">';
?>

    <label
        for="commentaire-input"
        class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Postez votre commentaire
    </label>
    <textarea
        id="commentaire-input"
        rows="4"
        name="texte_commentaire"
        value=""
        class="flex w-56 p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
        placeholder="Ecrivez ce que vous voulez"></textarea>
    <button
        type="submit"
        class="flex w-20 my-4 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        value="Poster">
        Envoyé
    </button>
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
    }
} else
    echo '<p>Aucune recette trouvée</p>';
?>

<?php
$content = ob_get_clean();
$titre = 'Detail Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
