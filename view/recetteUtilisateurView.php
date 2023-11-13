<?php ob_start(); ?>
<?php if ($_SESSION['connecter'] == 'oui'): ?>
    <div class="container mx-auto p-8 bg-bleu text-blanc rounded shadow-md">
        <h1 class="font-titre text-2xl mb-4">Liste de vos recettes</h1>
        <button>
            <a href="/index.php?action=ajout_recette"
                class="bg-bleu-clair text-white rounded hover:bg-blue-600 mb-4 block px-4 py-2">Ajouter une recette</a>
        </button>
        </br>
    <?php endif; ?>

    <?php if (!empty($recettes)): ?>
        <?php if (isset($_SESSION['erreurSuppression'])): ?>
            <p style="color: red;">Erreur lors de la suppression d'une recette</p>
        <?php endif; ?>
        <ul id="list-recette">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <?php if ($i < count($recettes)): ?>
                    <div class="mb-2 font-texte flex items-center bg-bleu-clair p-4">
                        <img alt="image de la recette" src="<?= $GLOBALS['root'] ?>img/<?= $recettes[$i]['REC_IMAGE'] ?>" alt="image de la recette"
                            class="w-64 h-64 md:w-48 md:h-48 mr-20">
                        <div>
                            <li>
                                <h2><a href="./index.php?action=voir_recettes_compte&rec_id=<?= $recettes[$i]['REC_ID'] ?>">
                                        <?= $recettes[$i]['REC_TITRE'] ?>
                                    </a></h2>
                                <p> Intitulé :
                                    <?= $recettes[$i]['CAT_INTITULE'] ?>
                                </p>
                                <p> Résumé :
                                    <?= $recettes[$i]['REC_RESUME'] ?>
                                </p>
                            </li>
                            <?php if ($recettes[$i]['REC_STATUS'] == 2): ?>
                                <p class="text-red-300 italic">En attente de validation</p>
                            <?php endif; ?>
                            <div class="flex flex-wrap gap-2">
                                <?php $j = 0; ?>
                                <?php while (count($tags) > $j): ?>
                                    <?php if ($recettes[$i]['REC_ID'] == $tags[$j]['REC_ID']): ?>
                                        <form action="./index.php?action=voir_recettes_par_tag" method="post">
                                            <button type="submit" name="tag" value="<?= $tags[$j]['TAG_ID'] ?>"
                                                class="bg-bleu text-white px-2 py-1 rounded">
                                                <?= $tags[$j]['TAG_LIBELLE'] ?>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <?php $j++; ?>
                                <?php endwhile; ?>
                            </div>




                            <div class="flex flex-row gap-3 mt-10">
                                <form method="post"
                                    action="/index.php?action=modifier_recette&rec_id=<?= $recettes[$i]['REC_ID'] ?>">
                                    <button type="submit"
                                        class="bg-yellow-500 text-white rounded hover:bg-yellow-600 mb-4 block px-4 py-2">Modifier</button>
                                </form>
                                <form method="post"
                                    action="/index.php?action=supprimer_recette&rec_id=<?= $recettes[$i]['REC_ID'] ?>">
                                    <button type="submit"
                                        class="bg-red-500 text-blanc px-4 py-2 rounded hover:bg-red-400">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette trouvée</p>
    <?php endif; ?>

    <?php if (count($recettes) > 10): ?>
        <button id="button-plus" onclick="afficherPlus()"
            class="bg-bleu-clair text-white rounded hover:bg-blue-600 px-4 py-2 mt-4">Plus</button>
    <?php endif; ?>

    <div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>

<script>
    let listRecettes = document.getElementById('list-recette');
    let nbRecette = 10;

    function afficherPlus() {
        let recettes = <?php echo json_encode($recettes) ?>;
        let tags = <?php echo json_encode($tags) ?>;
        let plusDeRecette = '';

        for (let i = nbRecette; i < nbRecette + 10; i++) {
            if (i < recettes.length) {
                plusDeRecette += '<div class="mb-2 font-texte flex items-center bg-bleu-clair p-4">' +
                    '<img alt="image de la recette" src="<?= $GLOBALS['root'] ?>img/' + recettes[i]['REC_IMAGE'] + '" alt="image de la recette" class="w-64 h-64 md:w-48 md:h-48 mr-20">' +
                    '<div>' +
                    '<li>' +
                    '<h2><a href="./index.php?action=voir_recettes_compte&rec_id=' + recettes[i]['REC_ID'] + '">' + recettes[i]['REC_TITRE'] + '</a></h2>' +
                    '<p> Intitulé : ' + recettes[i]['CAT_INTITULE'] + '</p>' +
                    '<p> Résumé : ' + recettes[i]['REC_RESUME'] + '</p>' +
                    '</li>';

                if (recettes[i]['REC_STATUS'] == 2) {
                    plusDeRecette += '<p class="text-red-300 italic">En attente de validation</p>';
                }

                plusDeRecette += '<div class="flex flex-wrap gap-2">';
                let j = 0;
                while (tags.length > j) {
                    if (recettes[i]['REC_ID'] == tags[j]['REC_ID']) {
                        plusDeRecette += '<form action="./index.php?action=voir_recettes_par_tag" method="post">' +
                            '<button type="submit" name="tag" value="' + tags[j]['TAG_ID'] + '" class="bg-bleu text-white px-2 py-1 rounded">' + tags[j]['TAG_LIBELLE'] + '</button>' +
                            '</form>';
                    }
                    j++;
                }

                plusDeRecette += '</div>' +
                    '<div class="flex flex-row gap-3 mt-10">' +
                    '<form method="post" action="/index.php?action=modifier_recette&rec_id=' + recettes[i]['REC_ID'] + '">' +
                    '<button type="submit" class="bg-yellow-500 text-white rounded hover:bg-yellow-600 mb-4 block px-4 py-2">Modifier</button>' +
                    '</form>' +
                    '<form method="post" action="/index.php?action=supprimer_recette&rec_id=' + recettes[i]['REC_ID'] + '">' +
                    '<button type="submit" class="bg-red-500 text-blanc px-4 py-2 rounded hover:bg-red-400">Supprimer</button>' +
                    '</form>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            } else {
                document.getElementById('button-plus').style.display = 'none';
            }
        }
        listRecettes.innerHTML += plusDeRecette;
        nbRecette += 10;
    }
</script>


<?php
$content = ob_get_clean();
$titre = 'Recettes';
require $GLOBALS['root'] . 'view/template.php';
?>