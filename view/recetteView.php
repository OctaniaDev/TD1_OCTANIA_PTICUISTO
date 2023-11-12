<?php ob_start(); ?>
<?php
    if($_SESSION['connecter'] == 'oui' )
        echo '<a href="/index.php?action=ajout_recette">Ajouter une recette</a>';
    echo '<h1>Liste des recettes</h1>';
        //a supp
    echo '</br>';
    if (!empty($recettes)) {
        echo '<ul id="list-recette">';
        for($i = 0; $i < 10; $i++) {
            if($i < count($recettes)) {
                echo '<li><h2><a href="./index.php?action=voir_recettes&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
                echo '<img src="'. $GLOBALS['root'] .'img/' . $recettes[$i]['REC_IMAGE'] . '" alt="image de la recette">';
                echo '<p>'.$recettes[$i]['CAT_INTITULE'].'</p>';
                echo '<p>'.$recettes[$i]['REC_RESUME'].'</p></li>';
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
        echo '<button id="button-plus" onclick="afficherPlus()">Plus</button>';
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
                plusDeRecette += '<li><h2><a href="./index.php?action=voir_recettes&rec_id='+recettes[i]['REC_ID']+'">'+recettes[i]['REC_TITRE']+'</a></h2>'+'<img src="./img/'+recettes[i]['REC_IMAGE']+'" alt="image de la recette">'
                +'<p>'+recettes[i]['CAT_INTITULE']+'</p><p>'+recettes[i]['REC_RESUME']+'</p></li>';
                let j = 0;
                while(tags.length > j) {
                    if(recettes[i]['REC_ID'] == tags[j]['REC_ID']) {
                        plusDeRecette +='<form action="./index.php?action=voir_recettes_par_tag" method="post">';
                        plusDeRecette += '<button type="submit" name="tag" value="'+tags[j]['TAG_ID']+'">'+tags[j]['TAG_LIBELLE']+'</button>';
                        plusDeRecette += '</form>';
                    }
                    j++;
                }
                plusDeRecette += '</br></br>';
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