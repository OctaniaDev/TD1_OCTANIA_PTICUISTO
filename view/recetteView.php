<?php ob_start(); ?>
<?php
    if($_SESSION['connecter'] == 'oui' )
    echo '<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">';
    echo '<h1 class="font-titre text-2xl mb-4">Liste des recettes</h1>';
    echo '  <button>
                    <a href="/index.php?action=ajout_recette" class="bg-bleu-clair text-white rounded hover:bg-blue-600 mb-4 block px-4 py-2">Ajouter une recette</a>
                </button>';
        //a supp
    echo '</br>';
    if (!empty($recettes)) {
        echo '<ul id="list-recette" class="bg-bleu">';
        for($i = 0; $i < 10; $i++) {
            if($i < count($recettes)) {
                echo '<li class="flex flex-col mb-12 mt-12 rounded p-4 bg-red-500"><h2><a href="./index.php?action=voir_recettes&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
                echo '<p>'.$recettes[$i]['CAT_INTITULE'].'</p>';
                echo '<p>'.$recettes[$i]['REC_RESUME'].'</p></li>';
                echo '<img src="'. $GLOBALS['root'] .'img/' . $recettes[$i]['REC_IMAGE'] . '" alt="image de la recette">';
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
    if(count($recettes) > 10)
        echo '<button id="button-plus" onclick="afficherPlus()" class="bg-bleu-clair text-white rounded hover:bg-blue-600 px-4 py-2 mt-4">Plus</button>';
    

    echo '<div class="mt-8">
            <a href="javascript:history.go(-1)" class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
        </div>';
        echo '</div>';
?>

    
<script>
    let listRecettes = document.getElementById('list-recette');
    let nbRecette = 10;
    function afficherPlus() {
        let recettes = <?php echo json_encode($recettes) ?>;
        let tags = <?php echo json_encode($tags) ?>;
        let plusDeRecette = '';
        for(let i = nbRecette; i < nbRecette + 10; i++) {
            if(i < recettes.length) {
                plusDeRecette += '<li class="flex flex-col mb-12 mt-12 rounded p-4 bg-red-500"><h2><a href="./index.php?action=voir_recettes&rec_id='+recettes[i]['REC_ID']+'">'+recettes[i]['REC_TITRE']+'</a></h2>';
                plusDeRecette += '<p>'+recettes[i]['CAT_INTITULE']+'</p><p>'+recettes[i]['REC_RESUME']+'</p></li>';
		plusDeRecette += '<img src="/img/' + recettes[i]['REC_IMAGE'] + '" alt="image de la recette">';
                let j = 0;
                while(tags.length > j) {
                    if(recettes[i]['REC_ID'] == tags[j]['REC_ID']) {
                        plusDeRecette +='<form action="./index.php?action=voir_recettes_par_tag" method="post">';
                        plusDeRecette += '<button type="submit" name="tag" value="'+tags[j]['TAG_ID']+'" class="bg-bleu text-white px-2 py-1 rounded">'+tags[j]['TAG_LIBELLE']+'</button>';
                        plusDeRecette += '</form>';
                    }
                    j++;
                }
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