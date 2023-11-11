<?php ob_start(); ?>
<?php
    if($_SESSION['connecter'] == 'oui')
        echo '<a href="/index.php?action=ajout_recette">Ajouter une recette</a>';
        echo '<h1>Liste des recettes</h1>';
    if (!empty($recettes)) {
        echo '<ul id="list-recette">';
        for($i = 0; $i < 10; $i++) {
            if($i < count($recettes)) {
            echo '<li><h2><a href="./index.php?action=voir_recettes_compte&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
            echo '<p>'.$recettes[$i]['CAT_INTITULE'].'</p>';
            echo '<p>'.$recettes[$i]['REC_RESUME'].'</p></li>';
            }
        }
        echo '</ul>';
    } else
        echo '<p>Aucune recette trouvée</p>';
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
                plusDeRecette += '<li><h2><a href="./index.php?action=voir_recettes&rec_id='+recettes[i]['REC_ID']+'">'+recettes[i]['REC_TITRE']+'</a></h2>'+'<p>'+recettes[i]['CAT_INTITULE']+'</p><p>'+recettes[i]['REC_RESUME']+'</p></li>';
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