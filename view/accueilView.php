<?php ob_start(); ?>

<div class="carrousel">

    <input type="radio" name="items" id="radio-1" checked>
    <input type="radio" name="items" id="radio-2">
    <input type="radio" name="items" id="radio-3">
    <input type="radio" name="items" id="radio-4">
    <ul class="items">
        <li>
            <div class="item">
                <img src="./img/img_attente.jpg">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente2.jpg">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente3.jpg">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente4.jpg">
            </div>
        </li>
    </ul>
    <div class="itemsNavigation">
        <label for="radio-1" id="dotForRadio-1"></label>
        <label for="radio-2" id="dotForRadio-2"></label>
        <label for="radio-3" id="dotForRadio-3"></label>
        <label for="radio-4" id="dotForRadio-4"></label>
    </div>
</div>

<style>
    /*Carousel*/
    .carrousel {
        overflow: hidden;
        position: relative;
        text-align: center;
        padding: 1em 0;
        max-width: 750px;
        margin: auto;
    }

    .carrousel .items {
        width: 1000%;
        margin-bottom: 20px;
        list-style: none;
        position: relative;
        -webkit-transition: transform 0.5s;
        -moz-transition: transform 0.5s;
        -o-transition: transform 0.5s;
        transition: transform 0.5s;
    }

    .carrousel .items li {
        width: 25%;
        position: relative;
        float: left;
    }

    .carrousel li div {
        margin: auto;
        color: #666666;
        font-size: 1.3em;
        font-weight: bold;
    }

    .carrousel li img {
        max-width: 50%;
        object-fit: cover;
        vertical-align: middle;
    }

    .carrousel li div.item {
        color: #777777;
        display: block;
        max-width: 100%;
        max-height: 500px;
        text-align: center;
        margin-bottom: 20px;
    }

    .name {
        font-weight: bold;
    }

    .description {
        font-weight: 100;
    }

    .carrousel .itemsNavigation {
        margin-top: 20px;
        display: block;
        list-style: none;
        text-align: center;
        bottom: 1em;
        position: relative;
        width: 104px;
        left: 50%;
        margin-left: -52px;
    }

    .carrousel input {
        display: none;
    }

    .carrousel .itemsNavigation label {
        float: left;
        margin: 6px;
        display: block;
        height: 10px;
        width: 10px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        border: solid 2px #2980b9;
        font-size: 0;
    }

    #radio-1:checked~.items {
        transform: translateX(0%);
    }

    #radio-2:checked~.items {
        transform: translateX(-25%);
    }

    #radio-3:checked~.items {
        transform: translateX(-50%);
    }

    #radio-4:checked~.items {
        transform: translateX(-75%);
    }

    .carrousel .itemsNavigation label:hover {
        cursor: pointer;
    }

    .carrousel #radio-1:checked~.itemsNavigation label#dotForRadio-1,
    .carrousel #radio-2:checked~.itemsNavigation label#dotForRadio-2,
    .carrousel #radio-3:checked~.itemsNavigation label#dotForRadio-3,
    .carrousel #radio-4:checked~.itemsNavigation label#dotForRadio-4 {
        background: #2980b9;
    }

    @media (max-width: 768px) {
    .carrousel li div.item {
        margin-left: 50px;
        width: 60%;
    }
    }

    @media (max-width: 480px) {
        .carrousel li div.item {
            margin-left: 50px;
            width: 60%;
        }
    }
</style>



<div class="flex flex-col md:flex-row container mt-5 justify-center mx-auto mb-20">
    <div class="">
        <div class="md:col-md-6 md:mr-10 mx-auto ml-10">
            <div class="border-4 p-4 mr-10 mt-5 md:mx-auto">
                <h2 class="text-2xl font-titre text-center mb-6 text-bleu">Les dernières recettes</h2>
                <?php
                if (!empty($recettes)) {
                    echo '<ul id="list-recette" class="bg-white">';
                    for ($i = 0; $i < 10; $i++) {
                        if ($i < count($recettes)) {
                            echo '<li class="flex mb-12 rounded p-4 bg-bleu">';

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



    <div class="mt-5 w-full md:w-1/2 bg-bleu p-6 mb-10">
        <div class="col-md-6 flex justify-center">
            <img src="./img/Pticuisto.png" alt="Image pticuisto" class="w-60">
        </div>
        <p class="flex justify-center mt-10 text-white text-2xl font-bold mb-10">Edito</p>
        <div class="col-md-6">
            <p class="text-white text-justify">
                <?= '"' . $edito[0]['EDI_CONTENU'] . '"'; ?>
            </p>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
$titre = 'Accueil';
require $GLOBALS['root'] . 'view/template.php';
?>