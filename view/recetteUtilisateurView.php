<?php ob_start(); ?>
<?php
    if($_SESSION['connecter'] == 'oui')
        echo '<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">';
        echo '<h1 class="font-titre text-2xl mb-4">Liste de vos recettes</h1>';
        echo '  <button>
                    <a href="/index.php?action=ajout_recette" class="bg-bleu-clair text-white rounded hover:bg-blue-600 mb-4 block px-4 py-2">Ajouter une recette</a>
                </button>';
        //a supp
        echo '</br>';
    if (!empty($recettes)) {
        if(isset($_SESSION['erreurSuppression']))
            echo '<p style=" color: red;">erreur lors de la suppression d\'une recette</p>';
        echo '<ul id="list-recette">';
        for($i = 0; $i < 10; $i++) {
            if($i < count($recettes)) {
                echo '<div class="mb-2 font-texte">';
                echo '<li><h2><a href="./index.php?action=voir_recettes_compte&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
                echo '<p> Intitulé : '.$recettes[$i]['CAT_INTITULE'].'</p>';
                echo '<p> Résumé : '.$recettes[$i]['REC_RESUME'].'</p>';
                echo '</div>';
                if($recettes[$i]['REC_STATUS'] == 2)
                    echo '<p class="text-red-300 italic">En attente de validation</p>';
                    echo '<div class="flex flex-row gap-3">';
                echo '<form method="post" action="/index.php?action=modifier_recette&rec_id='.$recettes[$i]['REC_ID'].'">
                        <button type="submit" class="bg-yellow-500 text-white rounded hover:bg-yellow-600 mb-4 block px-4 py-2">modifier</button>
                        </form>';
                echo '<form method="post" action="/index.php?action=supprimer_recette&rec_id='.$recettes[$i]['REC_ID'].'">
                    <button type="submit" class="bg-red-500 text-blanc px-4 py-2 rounded hover:bg-red-400">supprimer</button>
                    </form>';
                echo '</br></br>';
                echo '</div>';
            }
        }
        echo '</ul>';
        echo '<div class="mt-8">
            <a href="javascript:history.go(-1)" class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
        </div>';
    } else
        echo '<p>Aucune recette trouvée</p>';
    if(count($recettes) > 10)
        echo '<button id="button-plus" onclick="afficherPlus()">Plus</button>';
    echo '</div>';

    
?>

    
<script>
    let listRecettes = document.getElementById('list-recette');
    let nbRecette = 10;
    function afficherPlus() {
        recettes = <?php echo json_encode($recettes) ?>;
        let plusDeRecette = '';
        for(let i = nbRecette; i < nbRecette + 10; i++) {
            if(i < recettes.length)
                plusDeRecette += '<li><h2><a href="./index.php?action=voir_recettes&rec_id='+recettes[i]['REC_ID']+'">'+recettes[i]['REC_TITRE']+'</a></h2>'+'<p>'+recettes[i]['CAT_INTITULE']+'</p><p>'+recettes[i]['REC_RESUME']+'</p>'+'<a href="./index.php?action=supprimer_recette&rec_id='+$recettes[$i]['REC_ID']+'">supprimer recette</a></li>';
            else {
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