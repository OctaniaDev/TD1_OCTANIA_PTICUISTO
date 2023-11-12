<?php ob_start(); ?>



<div class="col-md-6">
    <div class="flex justify-center mt-20">
        <img src="./img/img_attente.jpg" alt="w8">
    </div>
</div>

<div class="flex row container mt-5 justify-center mx-auto">
    <div class="flex row justify-content-center">
        <div class="col-md-6">
            <div class="border-4 p-4 mr-10">
                <h2 class="text-2xl font-titre text-center mb-6 text-bleu">Les dernières recettes</h2>
                <?php
                if (!empty($recettes)) {
                    echo '<ul id="list-recette" class="bg-white">';
                    for ($i = 0; $i < 10; $i++) {
                        if ($i < count($recettes)) {
                            echo '<li class="flex mb-12 rounded p-4 bg-red-500">';
                
                            echo '<div class="flex-shrink-0 mr-4">';
                            echo '<img src="' . $recettes[$i]['REC_IMAGE'] . '" alt="Image recette" class="w-16 h-16 object-cover">';
                            echo '</div>';

                            echo '<div>';
                            echo '<h2 class="text-xl font-bold"><a href="./index.php?action=voir_recettes&rec_id=' . $recettes[$i]['REC_ID'] . '">' . $recettes[$i]['REC_TITRE'] . '</a></h2>';
                            echo '<p class="text-gris">' . $recettes[$i]['REC_RESUME'] . '</p>';

                            $j = 0;
                            while (count($tags) > $j) {
                                if ($recettes[$i]['REC_ID'] == $tags[$j]['REC_ID']) {
                                    echo '<form action="./index.php?action=voir_recettes_par_tag" method="post">';
                                    echo '<button type="submit" name="tag" value="' . $tags[$j]['TAG_ID'] . '" class="text-bleu hover:underline">' . $tags[$j]['TAG_LIBELLE'] . '</button>';
                                    echo '</form>';
                                }
                                $j++;
                            }

                            echo '</div>';
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                } else {
                    echo '<p class="text-center text-red-950">Aucune recette trouvée</p>';
                }
                ?>
            </div>
        </div>
    </div>



    <div class="mt-5 w-1/2 bg-bleu p-6">
        <div class="col-md-6 flex justify-center">
            <img src="./img/Pticuisto.png" alt="Image pticuisto" class="w-60">
        </div>
        <p class="flex justify-center mt-10 text-white text-xl">Edito</p>
        <div class="col-md-6">
            <p class="text-white">
                <?= $edito[0]['EDI_CONTENU'] ?>
            </p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Accueil';
require $GLOBALS['root'] . 'view/template.php';
?>