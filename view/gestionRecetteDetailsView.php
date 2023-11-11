<?php ob_start(); ?>


<h1>Reccete <h1>

<div>
    <p>Nom: <?php echo $recette['rec_titre']; ?></p>
    <p>Prénom: <?php echo $recette['rec_contenu']; ?></p>
    <p>Adresse mail: <?php echo $recette['rec_resume']; ?></p>
    <p>Status: <?php echo $recette['rec_date_creation']; ?></p>
    <p>Status: <?php echo $recette['rec_modification']; ?></p>
    <p>Status: <?php echo $recette['rec_image']; ?></p>
    <p>Status: <?php echo $recette['rec_status']; ?></p>

    <?php
        if ($utilisateur['REC_STATUS'] == 1) {
            echo '<form method="post" action="/index.php?action=rendre_inactif&user_id=' . $utilisateur['UTI_ID'] . '">
                <button type="submit">Refuser recette</button>
            </form>';
        } else {
            echo '<form method="post" action="/index.php?action=rendre_actif&user_id=' . $utilisateur['UTI_ID'] . '">
                <button type="submit">Accepter recette</button>
            </form>';
        }
    ?>  

</div>