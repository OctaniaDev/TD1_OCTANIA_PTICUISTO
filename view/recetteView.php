<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
<h1 class="font-titre text-2xl mb-4">Liste des recettes</h1>
    <?php if ($_SESSION['connecter'] == 'oui'): ?>
        <button>
            <a href="/index.php?action=ajout_recette" class="bg-bleu-clair text-white rounded hover:bg-blue-600 mb-4 block px-4 py-2">Ajouter une recette</a>
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
                    <div class="mb-2 font-texte flex flex-col md:flex-row mt-12 rounded p-4 md:h-72 bg-bleu-clair">
                        <img src="<?= $GLOBALS['root'] ?>img/<?= $recettes[$i]['REC_IMAGE'] ?>" alt="image de la recette" class="float-left mr-4 w-64 h-64 md:w-48 md:h-48">
                        <div class="flex flex-col md:mb-20">
                            <h2><a href="./index.php?action=voir_recettes&rec_id=<?= $recettes[$i]['REC_ID'] ?>"><?= $recettes[$i]['REC_TITRE'] ?></a></h2>
                            <p><?= $recettes[$i]['CAT_INTITULE'] ?></p>
                            <p><?= $recettes[$i]['REC_RESUME'] ?></p>
                            <div class="flex flex-wrap gap-2 mt-2 md:mt-36">
                                <?php $j = 0; ?>
                                <?php while (count($tags) > $j): ?>
                                    <?php if ($recettes[$i]['REC_ID'] == $tags[$j]['REC_ID']): ?>
                                        <form action="./index.php?action=voir_recettes_par_tag" method="post">
                                            <button type="submit" name="tag" value="<?= $tags[$j]['TAG_ID'] ?>" class="bg-bleu text-white px-2 py-1 rounded"><?= $tags[$j]['TAG_LIBELLE'] ?></button>
                                        </form>
                                    <?php endif; ?>
                                    <?php $j++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
        <div class="mt-8">
            <a href="javascript:history.go(-1)" class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
        </div>
    <?php else: ?>
        <p>Aucune recette trouvée</p>
    <?php endif; ?>

    <?php if (count($recettes) > 10): ?>
        <button id="button-plus" onclick="afficherPlus()" class="bg-bleu-clair text-white rounded hover:bg-blue-600 px-4 py-2 mt-4">Plus</button>
    <?php endif; ?>
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
                plusDeRecette += '<div class="mb-2 font-texte flex flex-col md:flex-row mb-12 mt-12 rounded p-4 bg-bleu-clair">' +
                    '<img src="/img/' + recettes[i]['REC_IMAGE'] + '" alt="image de la recette" class="float-left mr-4 w-64 h-64 md:w-48 md:h-48">' +
                    '<div class="flex flex-col">' +
                    '<h2><a href="./index.php?action=voir_recettes&rec_id=' + recettes[i]['REC_ID'] + '">' + recettes[i]['REC_TITRE'] + '</a></h2>' +
                    '<p>' + recettes[i]['CAT_INTITULE'] + '</p>' +
                    '<p>' + recettes[i]['REC_RESUME'] + '</p>' +
                    '<div class="flex flex-wrap gap-2 mt-2 md:mt-36">';
                
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
