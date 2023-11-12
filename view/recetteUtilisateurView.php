<?php ob_start(); ?>
<?php
    if($_SESSION['connecter'] == 'oui')
        echo '<a href="/index.php?action=ajout_recette">Ajouter une recette</a>';
        echo '<h1>Liste des recettes</h1>';
        //a supp
        echo '</br>';
    if (!empty($recettes)) {
        if(isset($_SESSION['erreurSuppression']))
            echo '<p style=" color: red;">erreur lors de la suppression d\'une recette</p>';
        echo '<ul id="list-recette">';
        for($i = 0; $i < 10; $i++) {
            if($i < count($recettes)) {
                echo '<li><h2><a href="./index.php?action=voir_recettes_compte&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
                echo '<p>'.$recettes[$i]['CAT_INTITULE'].'</p>';
                echo '<p>'.$recettes[$i]['REC_RESUME'].'</p>';
                if($recettes[$i]['REC_STATUS'] == 2)
                    echo '<p>en attente de validation</p>';
                echo '<form method="post" action="/index.php?action=modifier_recette&rec_id='.$recettes[$i]['REC_ID'].'">
                        <button type="submit">modifier</button>
                        </form>';
                echo '<form method="post" action="/index.php?action=supprimer_recette&rec_id='.$recettes[$i]['REC_ID'].'">
                    <button type="submit">supprimer</button>
                    </form>';
                echo '</br></br>';
            }
        }
        echo '</ul>';
    } else
        echo '<p>Aucune recette trouvée</p>';
    if(count($recettes) > 10)
        echo '<button id="button-plus" onclick="afficherPlus()">Plus</button>';
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