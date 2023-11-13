<?php ob_start(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Gestion de recettes</h1>
    <?php if (!empty($recettes)): ?>
        <?php if (isset($_SESSION['erreurSuppression'])): ?>
            <p style="color: red;">Erreur lors de la suppression d'une recette</p>
        <?php endif; ?>
        <form class="mb-4" action="./index.php?action=gestion_de_recette" method="post">
            <label for="default-search-1"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Rechercher un
            titre</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    </div>
                    <div class="ui-widget">
                        <input type="text" name="motCherche" id="default-search-1"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rechercher un titre de recette" pattern="^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\'\s]{1,240}$" required>
                    </div>
                <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher</button>
            </div>
        </form>
        <ul id="list-recette">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <?php if ($i < count($recettes)): ?>
                    <div class="mb-2 font-texte flex items-center bg-bleu-clair p-4">
                    <a class="mr-2" href="./index.php?action=voir_recettes&rec_id=<?= $recettes[$i]['REC_ID'] ?>"><img src="<?= $GLOBALS['root'] ?>img/<?= $recettes[$i]['REC_IMAGE'] ?>" alt="image de la recette" class="float-left mr-4 w-64 h-64 mr-2 md:w-48 md:h-48"></a>
                        <div>
                            <li>
                                <?php if($recettes[$i]['REC_STATUS'] == 1){
                                    echo '<h2 class="text-2xl underline  underline-offset-1"><a href="./index.php?action=voir_recettes&rec_id='.$recettes[$i]['REC_ID'].'">
                                    '.$recettes[$i]['REC_TITRE'].'</a></h2>';
                                }else {
                                    echo '<h2 class="text-2xl underline  underline-offset-1">'.$recettes[$i]['REC_TITRE'].'</h2>';
                                } ?>
                                
                                <p class="mt-4 mb-4 bg-yellow-500 text-white px-2 py-1 rounded w-16 text-center">
                                    <?= $recettes[$i]['CAT_INTITULE'] ?>
                                </p>
                                <p> Résumé :
                                    <?= $recettes[$i]['REC_RESUME'] ?>
                                </p>
                            </li>
                           
                            <div class="flex flex-wrap gap-2 mt-2">
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
                            <?php if ($recettes[$i]['REC_STATUS'] == 2): ?>
                                <p class="text-red-300 italic">En attente de validation</p>
                            <?php endif; ?>



                            <div class="flex flex-row gap-3 mt-10">
                                <form method="post"
                                    action="/index.php?action=voir_recette_details&rec_id=<?= $recettes[$i]['REC_ID'] ?>">
                                    <button type="submit"
                                        class="bg-bleu text-blanc px-4 py-2 rounded">Voir la recette</button>
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
        <a href="./index.php?action=gestion_de_recette"
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
                plusDeRecette += '<div class="mb-2 font-texte flex flex-col md:flex-row mb-12 mt-12 rounded p-4 bg-bleu-clair">' +
                    '<a class="mr-2" href="./index.php?action=voir_recettes&rec_id='+recettes[i]['REC_ID']+'"><img src="./img/'+recettes[i]['REC_IMAGE']+'" alt="image de la recette" class="float-left mr-4 w-64 h-64 mr-2 md:w-48 md:h-48"></a>' +
                    '<div class="flex flex-col">' +
                    '<h2 class="text-2xl underline  underline-offset-1"><a href="./index.php?action=voir_recettes&rec_id=' + recettes[i]['REC_ID'] + '">' + recettes[i]['REC_TITRE'] + '</a></h2>' +
                    '<p class="mt-4 mb-4 bg-yellow-500 text-white px-2 py-1 rounded w-16 text-center">' + recettes[i]['CAT_INTITULE'] + '</p>' +
                    '<p class="mb-10">' + recettes[i]['REC_RESUME'] + '</p>' +
                    '<div class="flex flex-wrap gap-2 mt-2">';
                
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

<script>
  $( function() {   
    let tab = <?php echo json_encode($_SESSION['recettesGlobal'])?>;
    let rec = [];
    for(let i = 0; i<tab.length; i++){
        rec[i] = tab[i]['REC_TITRE'];
    }
    $( "#default-search-1" ).autocomplete({
      source: rec
    });
  } );
  </script>

<?php
$content = ob_get_clean();
$titre = 'Gestion de recettes';
require $GLOBALS['root'] . 'view/template.php';
?>
