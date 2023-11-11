<?php ob_start(); ?>


<h1>Recette <h1>

<div>
    <p>Titre: <?php echo $recette['REC_TITRE']; ?></p>
    <p>Contenu : <?php echo $recette['REC_CONTENU']; ?></p>
    <p>Date création : <?php echo $recette['REC_DATE_CREATION']; ?></p>
    <p>Image : <?php echo $recette['REC_IMAGE']; ?></p>
    <p>Status : <?php echo $recette['REC_STATUS']; ?></p>

    <?php
        if ($recette['REC_STATUS'] != 1) {
            echo '<form method="post" action="/index.php?action=refuser_recette&rec_id=' . $recette['REC_ID'] . '">
                <button type="submit">Refuser recette</button>
            </form>';


            echo '<form method="post" action="/index.php?action=accepter_recette&rec_id=' . $recette['REC_ID'] . '">
                <button type="submit">Accepter recette</button>
            </form>';
        } 
    ?>  

</div>